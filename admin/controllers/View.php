<?php

namespace App {
    class View
    {
        public static function render($templateView, $contentView, $data = null) {
            require $templateView;
        }
    }
}
