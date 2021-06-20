<?php
/**
 * Micro framework MVC desenvolvido por Renan Salustiano
 * data: 19/06/2021 - 20/06/2021
 */

/**
 * Iniciando sessão para todo o projeto
 */
session_start();
/* 
    Instanciando autoload de classes
*/
require __DIR__."/vendor/autoload.php";

/*
 * Instanciando classe Route -> Responsável pelo roteamento das requisições
 * */
$route = new \Src\Core\Route();

/*
$dbuser = $_ENV['MYSQL_USER'];
$dbpass = $_ENV['MYSQL_PASS'];

try {
    $pdo = new PDO("mysql:host=mysql;dbname=ist", $dbuser, $dbpass);
    $statement = $pdo->prepare("SELECT * FROM pessoas");
    $statement->execute();
    $pessoas = $statement->fetchAll(PDO::FETCH_OBJ);

    echo "<h1>Hello World!</h1>";

    echo "<h2>Pessoas</h2>";
    echo "<ul>";
    foreach ($pessoas as $pessoa ) {
        echo "<li>".$pessoa->nome."</li>";
    }
    echo "</ul>";

} catch(PDOException $e) {
    echo $e->getMessage();
}
*/
