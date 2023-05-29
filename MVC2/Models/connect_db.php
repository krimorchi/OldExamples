<?php

try {
    $pdo = new PDO('pgsql:host=localhost;dbname=myproject', 'postgres', '9999');
} catch (PDOException $e) {
    echo 'Невозможно установить соединение с базой данных';
}