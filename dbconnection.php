<?php
    try {
        $dsn = 'mysql:dbname=todo_app;host=localhost;charset=utf8mb4';
        $username = 'root';
        $password = '';
        $driver_options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $con = new PDO($dsn, $username, $password, $driver_options);

} catch (PDOException $e) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    var_dump($e->getMessage());
    exit();
}