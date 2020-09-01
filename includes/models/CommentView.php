<?php
namespace App {
    class CommentView extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('commentsview');
        }
        public function getCommentsOnePost($post_id){
            return $this->getManyRows([
                'post_id'=>$post_id
            ]);
        }
    }
}