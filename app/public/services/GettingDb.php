<?php

$db = include($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');

try {
    return new PDO(
      "mysql:host={$db['host']};dbname={$db['name']}",
      $db['username'],
      $db['password']
    );
} catch (PDOException $e) {
    die("Неможливо підключитися до бази даних {$db['name']} :" . $e->getMessage());
}
