<?php

    use \App\Table\Category;
    use \App\Table\Article;
    use \App\App;

    $category = Category::find($_GET['id']);
    if($category === false){
        App::notFound();
    }
    $posts = Article::lastByCategory($_GET['id']);
    $categories = Category::all();
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
    <?php foreach(Category::all() as $category): ?>
        <li><a href="<?= $category->url; ?>"> <?= $category->title; ?> </a></li>
    <?php endforeach?>
</div>