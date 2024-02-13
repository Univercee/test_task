<?php
    $fileController = new FileController();
    $filename = empty($_POST['filename'])?null:$_POST['filename'];
    $state = $fileController->delete($filename);
    include __DIR__.'/../redirect.php';
?>
