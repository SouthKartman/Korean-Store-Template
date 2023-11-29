<?php
    $server = ""; // имя хоста (уточняется у провайдера), если работаем на локальном сервере, то указываем localhost
    $username = "NonPhix_NonPhix"; // Имя пользователя БД
    $password = "telefon12345"; // Пароль пользователя. Если у пользователя нету пароля то, оставляем пустое значение ""
    $database = "NonPhix_korean"; // Имя базы данных, которую создали
     
   
    // Подключение к базе данных через MySQLi
    $db = new mysqli($server, $username, $password, $database);
?>