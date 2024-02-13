<?php

    $userController = new UserController();
    $id = intval($_POST['id'])??-1;
    $name = $_POST['name'];
    $email = empty($_POST['email']) ? null : $_POST['email'];
    $telegram_id = empty($_POST['telegram_id']) ? null : $_POST['telegram_id'];
    $state = $userController->update($id, $name, $email, $telegram_id);

    include __DIR__.'/__answer.php';

?>