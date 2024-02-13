<?php

class ErrorMessage {
    public static $defaultError = "Что-то пошло не так";
    public static $identifierNotExist = "У пользователя должен быть указан email или telegram_id";
    public static $userAlreadyExists = "Пользователь с такой почтой или telegram ID уже существует";
    public static $userNotFound = "Пользователь не найден";
    public static $emptyName = "Заполните имя пользователя";
    public static $emptyFilename = "Файл не указан";
    public static $fileNotFound = "Файл не найден";
    public static $incorrectFileExtension = "Разрешены только .pdf файлы";
}

?>