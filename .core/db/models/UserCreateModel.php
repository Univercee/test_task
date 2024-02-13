<?php

class UserCreateModel{
    protected string $name;
    protected string|null $email;
    protected string|null $telegram_id;
    public function __construct(string $name, string|null $email = null, string|null $telegram_id = null) {
        if(!$email && !$telegram_id){
            throw new Error(ErrorMessage::$identifierNotExist);
        }
        $this->setName($name);
        $this->email = $email;
        $this->telegram_id = $telegram_id;
    }

    //getters
    public function getName(): string{
        return $this->name;
    }
    public function getEmail(): string|null{
        return $this->email;
    }
    public function getTelegramId(): string|null{
        return $this->telegram_id;
    }


    //setters
    public function setName(string|null $name){
        $this->name = $name;
    }
    public function setEmail(string|null $email){
        if(empty($email) && empty($this->getTelegramId())){
            throw new Error(ErrorMessage::$identifierNotExist);
        }
        $this->email = $email;
    }
    public function setTelegramId(string|null $telegram_id){
        if(empty($telegram_id) && empty($this->getEmail())){
            throw new Error(ErrorMessage::$identifierNotExist);
        }
        $this->telegram_id = $telegram_id;
    }

    public function checkIdentifierExist(){
        return $this->email || $this->telegram_id;
    }
}

?>