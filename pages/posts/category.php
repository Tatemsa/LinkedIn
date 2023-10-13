<?php

    $app = App::getInstanceDb();
    $category = $app->getTable('Category')->find($_GET['id']);
    if($category===null){
        $app->notFound();
    }
    $posts = $app->getTable('Post')->getLastByCategory($_GET['id']);
    $categories = $app->getTable('Category')->all();
    
?>

<h1><?= $category->title; ?></h1>

<div>
    <?php foreach($posts as $post):?>


       <h2><a href="<?= $post->url; ?>"> <?= $post->title; ?></a></h2>
       <p>
        <em><?= $post->category; ?></em>
       </p>
       
       <p><?= $post->extrait; ?></p>

    <?php endforeach?>
</div>

<div>
    <?php foreach($categories as $category): ?>
        <li><a href="<?= $category->url; ?>"> <?= $category->title; ?> </a></li>
    <?php endforeach?>
</div>