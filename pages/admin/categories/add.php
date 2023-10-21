<?php
    $categoryTable = App::getInstanceDb()->getTable('Category');
    if(!empty($_POST)){
        $result=$categoryTable->create(['title'=>$_POST['title']]);
        if(!$result){
          header("Location: admin.php?p=categories.index");
        }
    }
    
    $categories = App::getInstanceDb()->getTable('Category')->extractRecord('id', 'title');
    $form = new Core\HTML\BootstrapForm($_POST);
?>

<form method = "post">
    <?= $form->input('title', 'Titre of category')?>
    <button class="btn btn-primary">Ajouter</button>
</form> 