<?php
    require_once __DIR__ .'/src/.core/controllers/index.php';
    require_once __DIR__ .'/src/.core/db/index.php';
    require_once __DIR__ .'/src/.core/lib/index.php';
    require_once __DIR__ ."/vendor/autoload.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main class="wrapper">
        <?php
            require __DIR__.'/src/views/components/navbar.php';
            require __DIR__.'/router.php';
            require __DIR__.'/src/views/components/error.php';
            require __DIR__.'/src/views/components/message.php';
        ?>
        
    </main>
</body>
</html>

<style>
    <?php include __DIR__.'/src/.inc/styles.css'; ?>
</style>