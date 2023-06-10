<?php

switch($_SERVER['REQUEST_URI']){
    case '/':
        require 'views/index.php';
        break;
    case '/about':
        require 'views/about.php';
        break;
    default:
        echo '404';
        break;
}