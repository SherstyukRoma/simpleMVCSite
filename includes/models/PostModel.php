<?php

namespace App {
    class PostModel extends DBEngine
    {
        public function __construct()
        {
            parent::__construct('posts');
        }
        public function getPostData($post_id){
            
        }
    }
    
}