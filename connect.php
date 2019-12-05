<?php

$conn = mysqli_connect('localhost', 'root', '') or die ('Ошибка соединения с БД');

if(!$conn) die (mysqli_connect_error());

$sql = 'CREATE DATABASE IF NOT EXISTS `gb`';
mysqli_query( $conn,$sql );
mysqli_close($conn);

$conn = mysqli_connect('localhost', 'root', '', 'gb');
$command= "CREATE TABLE `gb` ( 
    `id` INT(11) NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(255) NOT NULL , 
    `text` TEXT NOT NULL , 
    `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB;";

mysqli_query($conn, $command);

mysqli_set_charset($conn, 'ut8');

