<?php


    $app = App::getInstanceDb();
    $post = $app->getTable('Post')->find($_GET['id']);
    if($post === false) {
        $app->notFound();
    }
    $app->setTitle($post->title);
?>

<h1> <?= $post->title;?> </h2>

<p><em><?= $post->category; ?></em></p>

<p> <?= $post->content;?> </p>