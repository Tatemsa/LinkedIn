<?php
    require '../app/Autoloader.php';
    App\Autoloader::register();

    if(isset($_GET['p']))
    {
        $p = $_GET['p'];
    }else{
        $p = 'home';
    }

    //INITIALISATION DES OBJETS
    $db = new App\Database('linkedindb');

    ob_start();
    if($p === 'home'){
        require '../pages/home.php';
    }elseif ($p === 'posts') {
        require '../pages/single.php';
    }

    $content = ob_get_clean();
    
    require '../pages/template/default.php';

