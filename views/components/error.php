<?php if(isset($state) && $state->error){ ?>
    <div class="message error">
        <?php echo $state->error; ?>
    </div>
<?php } ?>