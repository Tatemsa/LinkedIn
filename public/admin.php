<?php

    use \Core\Auth\DBAuth;

    define('ROOT', dirname(__DIR__));
    require ROOT . '/app/App.php';
    App::load();

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }else{
        $page = 'home';
    }


    //Auth

    $app = App::getInstanceDb();
    $auth = new DBAuth($app->getDb());
    if(!$auth->logged()){
        $app->forbidden();
    }

    ob_start();
    if($page === 'home'){
        require ROOT . '/pages/admin/posts/index.php';
    } elseif ($page === 'posts.show') {
        require ROOT . '/pages/admin/posts/show.php';
    } elseif ($page === 'posts.category') {
        require ROOT . '/pages/admin/posts/category.php';
    }

    $content = ob_get_clean();
    
    require ROOT . '/pages/template/default.php';

