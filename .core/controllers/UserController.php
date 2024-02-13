<?php
class UserController {
    private $handler;
    public function __construct() {
        $this->handler = new UserTable();
    }

    public function get(int $id): State{
        try {
            $user = $this->handler->getById($id);
            return new State(Message::$defaultMessage, null, $user);
        } catch (\Throwable $th) {
            return new State(null, $th->getMessage());
        }
    }

    public function getAll(): State{
        try {
            $users = $this->handler->getAll();
            return new State(Message::$defaultMessage, null, $users);
        } catch (\Throwable $th) {
            return new State(null, $th->getMessage());
        }
    }
    
    public function create(string $name, string|null $email = null, string|null $telegram_id = null): State{
        try {
            $user = new UserCreateModel($name, $email, $telegram_id);
            $message = $this->handler->create($user);
            return new State($message, null);
        } catch (\Throwable $th) {
            return new State(null, $th->getMessage());
        }
    }

    public function update(int $id, string $name, string|null $email = null, string|null $telegram_id = null): State{
        try {
            $user = new UserModel($id, $name, $email, $telegram_id);
            $message = $this->handler->update($user);
            return new State($message, null);
        } catch (\Throwable $th) {
            return new State(null, $th->getMessage());
        }
    }

    public function delete(int $id): State{
        try {
            $message = $this->handler->delete($id);
            return new State($message, null);
        } catch (\Throwable $th) {
            return new State(null, $th->getMessage());
        }
    }
}

?>