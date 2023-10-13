
<div>
    <?php foreach(App::getInstanceDb()->getTable('Post')->last() as $post):?>


       <h2><a href="<?= $post->url; ?>"> <?= $post->title; ?></a></h2>
       <p>
        <em><?= $post->category; ?></em>
       </p>
       
       <p><?= $post->extrait; ?></p>

    <?php endforeach?>
    </div>

    <div>
        <?php foreach(App::getInstanceDb()->getTable('Category')->all() as $category): ?>
            <li><a href="<?= $category->url; ?>"> <?= $category->title; ?> </a></li>
        <?php endforeach?>
    </div>