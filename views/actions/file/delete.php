<?php
    $fileController = new FileController();
    $filename = empty($_POST['filename'])?null:$_POST['filename'];
    $state = $fileController->delete($filename);
    $path = $state->data;
?>

<?php
    include __DIR__.'/../__answer.php';
?>