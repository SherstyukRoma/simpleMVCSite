<?php

namespace App {
    class Post extends MethodCall
    {
        private $postCountPage = 6;
        public function __construct()
        {
            $this->format_options();
            $this->format_navigate();
            $this->getCategoryList();
        }
        public function getCategoryList()
        {
            $cat = new Category();
            $this->data['categories'] = $cat->getManyRows([]);
        }

        public function getPosts($category = null, $currentPage = 1)
        {
            $pos = new PostModel();
            $this->data['posts'] = $pos->getManyRows(
                [
                    'category_id' => $category,
                ],
                'ASC',
                'date',
                ($currentPage - 1) * $this->postCountPage,
                $this->postCountPage
            );
        }
        public function index() // route  - /
        {
            $currentPage = empty($_GET['cpage']) ? 1 : $currentPage = intval($_GET['cpage']);
            $this->getPosts(2, $currentPage);
            View::render (
                VIEWS_PATH . 'templateView' . EXT,
                PAGES_PATH . 'posts' . EXT,
                $this->data
            );
        }
        public function getpost()
        {
            $post_id = empty($_GET['post']) ? null : intval($_GET['post']);
            $post = new PostModel();
            if($post_id != null){
                $this->data['postdata'] = $post->getPostData($post_id);
                $comView = new CommentView();
                $this->data['comments'] = $comView->getCommentsOnePost($post_id);
            } else {
                $this->data['error'] = 'Неудача, запрошенного Вами рецепта не обнаружено';
            }
            View::render(
                VIEWS_PATH . 'templateView' . EXT,
                PAGES_PATH . 'getpost' . EXT,
                $this->data
            );
        }
    }
}
