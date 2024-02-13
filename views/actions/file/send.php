<?php
    $fileController = new FileController();
    $filename = isset($_GET["filename"]) ? $_GET["filename"] : "";
    $state = $fileController->sendTelegram($filename);
?>