
<div>
    <?php foreach(App\Table\Article::getLast() as $post):?>


       <h2><a href="<?= $post->url; ?>"> <?= $post->title; ?></a></h2>
       <p>
        <em><?= $post->category; ?></em>
       </p>
       
       <p><?= $post->extrait; ?></p>

    <?php endforeach?>
    </div>

    <div>
        <?php foreach(App\Table\Category::all() as $category): ?>
            <li><a href="<?= $category->url; ?>"> <?= $category->title; ?> </a></li>
        <?php endforeach?>
    </div>