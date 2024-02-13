<?php
class FileManager {    
    private static $relative_path = "/.inc/files/";

    static function isFileExists(string $filename){
        try {
            $file_exists = file_exists(self::getPath().$filename);
            return $file_exists;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    static function getAll(){
        try {
            $files = array_diff(scandir(self::getPath()), array('.', '..'));
            return $files;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    static function upload(string $tmp_path, string $filename){
        try {
            move_uploaded_file($tmp_path, self::getPath().$filename);
            return self::$relative_path.$filename;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    static function delete(string $filename){
        try {
            unlink(self::getPath().$filename);
            return self::$relative_path.$filename;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    static function getPath(){
        return $_SERVER['DOCUMENT_ROOT'].self::$relative_path;
    }
    static function getRelativePath(){
        return self::$relative_path;
    }
}

?>