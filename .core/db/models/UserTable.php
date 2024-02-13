<?php

class UserTable {

    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    //
    public function getById(int $id): UserModel{
        try {
            $query = $this->pdo->prepare("SELECT * FROM `users` WHERE id = :id");
            $query->execute([':id' => $id]);
            $data = $query->fetch();
            $user = new UserModel($data['id'], $data['name'], $data['email'], $data['telegram_id']);
            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //
    public function getAll(): array{
        try {
            $query = $this->pdo->prepare("SELECT * FROM `users`");
            $query->execute();
            $data = $query->fetchAll();
            $users = array_map(fn($user)=> new UserModel($user['id'], $user['name'], $user['email'], $user['telegram_id']), $data);
            return $users;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //
    public function create(UserCreateModel $user): string{
        if($this->isLoginExist($user)){
            throw new Error(ErrorMessage::$userAlreadyExists);
        }
        $query = $this->pdo->prepare("INSERT INTO `users`(name, email, telegram_id) VALUES(:name, :email, :telegram_id)");
        $executed = $query->execute([
            ':name' => $user->getName(),
            ':email' => $user->getEmail(),
            ':telegram_id' => $user->getTelegramId()
        ]);
        if(!$executed){
            throw new Error(ErrorMessage::$defaultError);
        }
        return Message::$userCreateSuccessfully;
    }

    //
    public function update(UserModel $user): string{
        $id = $this->isLoginExist($user);
        if($id && $user->getId() != $id){
            throw new Error(ErrorMessage::$userAlreadyExists);
        }
        $query = $this->pdo->prepare("UPDATE `users`
            SET name = :name,
                email = :email,
                telegram_id = :telegram_id
            WHERE id = :id
        ");
        $executed = $query->execute([
            ':name' => $user->getName(),
            ':email' => $user->getEmail(),
            ':telegram_id' => $user->getTelegramId(),
            ':id' => $user->getId()
        ]);
        return Message::$userUpdateSuccessfully;
        if(!$executed){
            throw new Error(ErrorMessage::$defaultError);
        }
    }

    //
    public function delete(int $id): string{
        $user = $this->getById($id);
        if(!$user){
            throw new Error(ErrorMessage::$userNotFound);
        }

        $query = $this->pdo->prepare("DELETE FROM `users`WHERE id = :id");
        $executed = $query->execute([':id' => $id]);

        return Message::$userDeleteSuccessfully;
        if(!$executed){
            throw new Error(ErrorMessage::$defaultError);
        }
    }

    //
    public function getTelegramIds(){
        $query = $this->pdo->prepare("SELECT telegram_id FROM `users` WHERE telegram_id IS NOT NULL");
        $query->execute();
        $ids = $query->fetchAll();
        return $ids;
    }


    //
    private function isLoginExist(UserModel|UserCreateModel $user){
        $query = $this->pdo->prepare("SELECT id FROM `users` WHERE email = :email OR telegram_id = :telegram_id");
        $query->execute([
            ':email' => $user->getEmail(),
            ':telegram_id' => $user->getTelegramId()
        ]);
        $user = $query->fetch();
        $id = isset($user['id']) ? $user['id'] : false;
        return $id;
    }
}
?>