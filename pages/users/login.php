<?php

    if(!empty($_POST)){
        $auth = new \Core\Auth\DBAuth(App::getInstanceDb()->getDb());
        if($auth->login($_POST['username'], $_POST['password'])){
            header('Location: admin.php');
        } else {
            ?>
            <div class = "alert alert-danger">
                Identification is not correct
            </div>
            <?php
        }
    }
    $form = new Core\HTML\BootstrapForm($_POST);
?>

<form method = "post">
    <?= $form->input('username', 'pseudo')?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password'])?>
    <?= $form->submit()?>
</form>