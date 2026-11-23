<?php
// Текущая временная метка
$dt = time();

// Запрошенная страница
$page = $_SERVER['REQUEST_URI'];

// Откуда пришёл пользователь (может отсутствовать)
$ref = $_SERVER['HTTP_REFERER'] ?? '';

// Строка журнала с разделителем | и переводом строки в конце
$path = "$dt|$page|$ref\n";

// Записываем строку в конец файла log/path.log
file_put_contents('log/' . PATH_LOG, $path, FILE_APPEND | LOCK_EX);
