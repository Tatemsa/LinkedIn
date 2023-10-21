<?php
    $postTable = App::getInstanceDb()->getTable('Post');
    if(!empty($_POST)){
        $result=$postTable->create(['title'=>$_POST['title'], 'content'=>$_POST['content'], 'category_id'=>$_POST['category_id']]);
        if(!$result){
          header("Location: admin.php?p=posts.edith&id=".App::getInstanceDb()->getDb()->lastInsertId());
        }
    }
    
    $categories = App::getInstanceDb()->getTable('Category')->extractRecord('id', 'title');
    $form = new Core\HTML\BootstrapForm($_POST);
?>

<form method = "post">
    <?= $form->input('title', 'Title of post')?>
    <?= $form->input('content', 'Content', ['type' => 'textarea'])?>
    <?= $form->select('category_id', 'Category', $categories)?>
    <button class="btn btn-primary">Add</button>
</form> 