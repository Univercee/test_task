<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Telegram ID</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            /**
             * @var UserModel $user
             */
            foreach($state->data as $user){
            ?>
                <tr>
                    <td><?php echo $user->getName()?></td>
                    <td><?php echo $user->getEmail()?></td>
                    <td><?php echo $user->getTelegramId()?></td>
                    <td>
                        <form action="user-delete-action" method="POST">
                            <input type="text" name="id" value="<?php echo $user->getId(); ?>" hidden>
                            <button>Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="/user-update?id=<?php echo $user->getId();?>">Update</a>
                    </td>
                </tr>
            <?php
            }
        ?>
    </tbody>
</table>