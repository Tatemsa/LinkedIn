<?php
    $postTable = App::getInstanceDb()->getTable('Post');
    if(!empty($_POST)){
        $result=$postTable->update($_GET['id'], ['title'=>$_POST['title'], 'content'=>$_POST['content'], 'category_id'=>$_POST['category_id']]);
        if(!$result){
            ?>
            <div class="alert alert-success">Article has modified /div>
            <?php
        }
    }
    
    $post = $postTable->find($_GET['id']);
    $categories = App::getInstanceDb()->getTable('Category')->extractRecord('id', 'title');
    $form = new Core\HTML\BootstrapForm($post);
?>

<form method = "post">
    <?= $form->input('title', 'Title of post')?>
    <?= $form->input('content', 'Content', ['type' => 'textarea'])?>
    <?= $form->select('category_id', 'Category', $categories)?>
    <button class="btn btn-primary">Save</button>
</form> 