<?php

    use App\App;
    use App\Table\Article;
    use App\Table\Category;

    $post = Article::find($_GET['id']);
    if($post === false) {
        App::notFound();
    }
?>

<h1> <?= $post->title;?> </h2>

<p><em><?= $post->category; ?></em></p>

<p> <?= $post->content;?> </p>