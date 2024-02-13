<?php if(isset($state) && $state->error){ ?>
    <div class="message error">
        <?php echo $state->error; ?>
    </div>
<?php } elseif(isset($_GET["error"])){ ?>
    <div class="message error">
        <?php echo $_GET["error"]; ?>
    </div>
<?php } ?>