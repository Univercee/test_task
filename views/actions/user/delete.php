<?php


    $userController = new UserController();
    $id = intval($_POST['id'])??-1;
    $state = $userController->delete($id);
    
    include __DIR__.'/../__answer.php';

?>