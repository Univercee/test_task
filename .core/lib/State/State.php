<?php

class State {
    public string|null $error;
    public string|null $message;
    public $data;
    public function __construct(string $message = null, string $error = null, $data = null) {
        $this->error = $error;
        $this->message = $message;
        $this->data = $data;
    }

}

?>