<?php
    $categoryTable = App::getInstanceDb()->getTable('Category');
    if(!empty($_POST)){
        $result=$categoryTable->update($_GET['id'], ['title'=>$_POST['title']]);
        if(!$result){
            ?>
            <div class="alert alert-success">The category has modified</div>
            <?php
        }
    }
    
    $category = $categoryTable->find($_GET['id']);
    $form = new Core\HTML\BootstrapForm($category);
?>

<form method = "post">
    <?= $form->input('title', 'Title of categoriy')?>
    <button class="btn btn-primary">Save</button>
</form> 