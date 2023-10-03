<?php
    $post = $db->prepare('SELECT * FROM posts WHERE id=?', [$_GET['id']], 'App\Table\Article',true);
?>

<h1> <?= $post->title;?> </h2>
<p> <?= $post->content;?> </p>