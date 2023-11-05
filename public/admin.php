<?php

    use \Core\Auth\DBAuth;

    define('ROOT', dirname(__DIR__));
    require ROOT . '/app/App.php';
    App::load();

    if(isset($_GET['p']))
    {
        $page = $_GET['p'];
    }else{
        $page = 'home';
    }

    ob_start();
    if($page === 'home'){
        require ROOT . '/pages/admin/posts/index.php';
    } elseif ($page === 'posts.edith') {
        require ROOT . '/pages/admin/posts/edith.php';
    } elseif ($page === 'posts.add') {
        require ROOT . '/pages/admin/posts/add.php';
    } elseif ($page === 'posts.delete') {
        require ROOT . '/pages/admin/posts/delete.php';
    } elseif ($page === 'categories.index') {
        require ROOT . '/pages/admin/categories/index.php';
    } elseif ($page === 'categories.edith') {
        require ROOT . '/pages/admin/categories/edith.php';
    } elseif ($page === 'categories.add') {
        require ROOT . '/pages/admin/categories/add.php';
    } elseif ($page === 'categories.delete') {
        require ROOT . '/pages/admin/categories/delete.php';
    }

    $content = ob_get_clean();
    
    require ROOT . '/pages/template/default.php';

