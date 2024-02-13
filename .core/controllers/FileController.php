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

            $ext = explode('.', $file["name"])[1];
            if($ext != 'pdf'){
                return new State(null, ErrorMessage::$incorrectFileExtension);
            }
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

    public function send(string $filename){
        try {
            $this->sendTelegram($filename);
            $this->sendEmail($filename);
            FileManager::delete($filename);
            return new State(Message::$fileSendSuccessfully);
        } catch (\Throwable $th) {
            return new State(null, $th->getMessage());
        }
    }

    private function sendTelegram(string $filename){
        if(empty($filename)){
            return new State(null, ErrorMessage::$emptyFilename);
        }
        try {
            $rows = (new UserTable())->getTelegramIds();
            foreach($rows as $row){
                TelegramManager::getInstance()->sendMessage($row["telegram_id"], $filename);
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    private function sendEmail(string $filename){
        if(empty($filename)){
            return new State(null, ErrorMessage::$emptyFilename);
        }
        try {
            $rows = (new UserTable())->getEmails();
            foreach($rows as $row){
                EmailManager::sendMail($row["email"], $filename);
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}

?>