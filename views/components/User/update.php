<?php
    $id = intval($_GET['id'])??-1;
    $userController = new UserController();
    $state = $userController->get($id);
    $user = $state->data;
?>

<?php
/**
* @var UserModel $user
*/
if($user) { ?>
    <form action="user-update-action" method="POST" class="form">
        <div>
            <input type="" name="id" value="<?php echo $id?>" hidden>
        </div>
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required value="<?php echo $user->getName(); ?>">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $user->getEmail(); ?>">
        </div>
        <div>
            <label for="telegram_id">Telegram ID</label>
            <input type="text" name="telegram_id" id="telegram_id" value="<?php echo $user->getTelegramId(); ?>">
        </div>
        <input type="submit" value="Сохранить">
    </form>
    <a href="/">To main page</a>
<?php } 
    else { 
        header('Location: /not-found');
    }  
?>