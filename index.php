<?php
    if(session_id() == '') {
        session_start();
    }
    require_once __DIR__ .'/.core/controllers/index.php';
    require_once __DIR__ .'/.core/db/index.php';
    require_once __DIR__ .'/.core/lib/index.php';
    require_once  __DIR__ ."/vendor/autoload.php";
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
            require __DIR__.'/views/components/navbar.php';
            require __DIR__.'/views/__router.php';
            require __DIR__.'/views/components/error.php';
            require __DIR__.'/views/components/message.php';
        ?>
        
    </main>
</body>
</html>

<style>
    <?php include __dir__.'/.inc/styles.css'; ?>
</style>