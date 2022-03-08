<?php

    //Aqui está a conecção com o banco de dados

    $conn = new mysqli("localhost", "root", "123456", "php_mysql_iniciando");

    if ($conn->connect_errno) {
        die('Falhou em conectar: (' . $conn->connect_errno . ') ' . $conn->connect_error);
    }
    
    return $conn;