<?php
    $fileController = new FileController();
    $file = $_FILES['pdf'];
    $state = $fileController->upload($file);
    $filename = $state->data;
?>

<?php
    if(empty($state->error)) header('Location: /file?filename='.$filename);
?>