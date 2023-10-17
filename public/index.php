<?php
    define('ROOT', dirname(__DIR__));
    require ROOT . '/app/App.php';
    App::load();

    if(isset($_GET['page']))
    {
        if(is_null($_GET['page'])){
            $page = 'home';
        } else {
            $page = $_GET['page'];
        }
        
    } else {
        $page = 'home';
    }


    ob_start();
    if($page === 'home'){
        require ROOT . '/pages/posts/home.php';
    } elseif ($page === 'posts.show') {
        require ROOT . '/pages/posts/show.php';
    } elseif ($page === 'posts.category') {
        require ROOT . '/pages/posts/category.php';
    } elseif ($page === 'login') {
        require ROOT . '/pages/users/login.php';
    }

    $content = ob_get_clean();
    
    require ROOT . '/pages/template/default.php';

