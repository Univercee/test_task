<?php $userController = new UserController(); ?>
<?php
    $state = $userController->getAll();

    if($state->data && count($state->data)){
        include __DIR__.'/components/User/table.php';
    }
    else {
        include __DIR__.'/components/User/not-found.php';
    }
?>