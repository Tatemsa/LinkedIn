
<ul>
    <?php foreach($db->query('SELECT * FROM posts', 'App\Table\Article') as $post):?>

       <h2><a href="<?= $post->url; ?>"> <?= $post->title; ?></a></h2>
       
       <p><?= $post->extrait; ?></p>

    <?php endforeach?>
</ul>