
<?php if(isset($state) && $state->message){ ?>
    <div class="message success">
        <?php echo $state->message; ?>
    </div>
<?php } elseif(isset($_GET["message"])){ ?>
    <div class="message success">
        <?php echo $_GET["message"]; ?>
    </div>
<?php } ?>