<?php
require "config.php";
$dsn = "mysql:host=$host;dbname=$dbname;charset=UTF8";

try {
     $pdo = new PDO($dsn, $user, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //error catch
} catch (PDOException $e) {
     die($e->getMessage());
}
