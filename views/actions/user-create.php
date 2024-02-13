<?php

    $userController = new UserController();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telegram_id = $_POST['telegram_id'];
    $state = $userController->create($name, $email, $telegram_id);

    include __DIR__.'/__answer.php';

?>