<?php
class FileController {

    public function isFileExists(string $filname): State{
        try {
           $file_exists = FileManager::isFileExists($filname);
           return new State(Message::$defaultMessage, null, $file_exists);
        } catch (\Throwable $th) {
            return new State(null, $th->getMessage());
        }
    }

    public function getAll(): State{
        try {
           $files = FileManager::getAll();
           return new State(Message::$defaultMessage, null, $files);
        } catch (\Throwable $th) {
            return new State(null, $th->getMessage());
        }
    }

    public function upload(array $file): State{
        try {
            FileManager::upload($file["tmp_name"], $file["name"]);
           return new State(Message::$fileUploadSuccessfully, null, $file["name"]);
        } catch (\Throwable $th) {
            return new State(null, $th->getMessage());
        }
    }

    public function delete(string $filename): State{
        try {
            FileManager::delete($filename);
           return new State(Message::$fileDeleteSuccessfully);
        } catch (\Throwable $th) {
            return new State(null, $th->getMessage());
        }
    }

    public function sendTelegram(string $filename): State{
        if(empty($filename)){
            return new State(null, ErrorMessage::$emptyFilename);
        }
        try {
            $rows = (new UserTable())->getTelegramIds();
            foreach($rows as $row){
                TelegramManager::getInstance()->sendMessage($row["telegram_id"], $filename);
            }
            return new State(Message::$defaultMessage, null);
        } catch (\Throwable $th) {
            return new State(null, $th->getMessage());
        }
    }
}

?>