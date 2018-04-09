<?php 
define("DNS", "localhost");
define("DB_NAME", "project_php");
define("USER_NAME", "root");
define("USER_PASSWORD", "root");

try
{
    $db = new PDO("mysql:host=". DNS .";dbname=". DB_NAME, USER_NAME, USER_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(PDOEXCEPTION $e) {
    exit("Une erreur est survenue lors de la connexion á la base de donnée, ". $e->getMessage() );
}
