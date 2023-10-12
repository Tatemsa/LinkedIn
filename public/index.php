<?php
    require '../app/Autoloader.php';
    App\Autoloader::register();

    $post= App\App::getInstanceDb();
    
    var_dump($post->getTable("Posts"));
    // if(isset($_GET['p']))
    // {
    //     $p = $_GET['p'];
    // }else{
    //     $p = 'home';
    // }


    // ob_start();
    // if($p === 'home'){
    //     require '../pages/home.php';
    // }elseif ($p === 'posts') {
    //     require '../pages/single.php';
    // }elseif ($p === 'category') {
    //     require '../pages/category.php';
    // }

    // $content = ob_get_clean();
    
    // require '../pages/template/default.php';

