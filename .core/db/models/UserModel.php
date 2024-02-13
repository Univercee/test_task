<?php

class UserModel extends UserCreateModel{
    private int $id;
    public function __construct(int $id, string $name = null, string $email = null, string $telegram_id = null) {
        parent::__construct($name, $email, $telegram_id);
        $this->setId($id);
    }

    //getters
    public function getId(): int{
        return $this->id;
    }

    
    //setters
    private function setId($id){
        return $this->id = $id;
    }
}

?>