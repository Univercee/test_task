<?php $fileController = new FileController(); ?>
<?php
    $state = $fileController->getAll();
    $files = $state->data;
    if($files && count($files)){
        ?>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    /**
                     * @var string $filename
                     */
                    foreach($state->data as $filename){
                    ?>
                        <tr>
                            <td><?php echo $filename?></td>
                            <td>
                                <a href="/file?filename=<?php echo $filename?>"> Просмотр</a>
                            </td>
                            <td>
                                <a href="/file-send-action?filename=<?php echo $filename;?>">Отправить</a>
                            </td>
                            <td>
                                <form action="file-delete-action" method="POST">
                                    <input type="text" name="filename" value="<?php echo $filename;?>" hidden>
                                    <input type="submit" value="Удалить">
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
        <?php
    }
    else {
        include __DIR__.'/not-found.php';
    }
?>
