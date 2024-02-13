<?php
    $fileController = new FileController();
    $filename = isset($_GET['filename']) ? $_GET['filename'] : null;
    if(empty($filename)){
        $file_exists = false;
    }
    else {
        $file_exists = $fileController->isFileExists($filename);
    }
?>

<?php if($file_exists){ ?>
    <iframe src="<?php echo FileManager::getRelativePath().$filename; ?>" frameborder="0" style="width: 90vw; height:70vh"></iframe>

    <nav class="navbar">
        <ul>
            <li><a href="/">На главную</a></li>
            <li><a href="/send">Отправить файл</a></li>
            <li>
                <form action="file-delete-action" method="POST">
                    <input type="text" name="filename" value="<?php echo $filename;?>" hidden>
                    <input type="submit" value="Удалить">
                </form>
            </li>
        </ul>
    </nav>
<?php }
    else { 
        ?>
            <p>Файл не найдены!</p>
        <?php
    }
?>
    