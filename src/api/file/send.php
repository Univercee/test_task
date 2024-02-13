<?php
    $fileController = new FileController();
    $filename = isset($_GET["filename"]) ? $_GET["filename"] : "";
    $state = $fileController->send($filename);
    include __DIR__.'/../redirect.php';
?>
