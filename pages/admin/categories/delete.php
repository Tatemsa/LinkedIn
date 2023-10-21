<?php
    $postTable = App::getInstanceDb()->getTable('Category');
    if(!empty($_POST)){
        $result=$postTable->delete($_POST['id']);
        if($result){
           header("Location: admin.php?p=categories.index");
        }
    }