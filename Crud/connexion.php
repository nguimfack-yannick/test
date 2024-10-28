<?php

$dsn = "mysql:host=localhost;dbname=voiture;charset=utf8";
$user= "root";
$pass="";

try{
    $cnx= new PDO($dsn,$user,$pass);
    $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT);
}catch(PDOException $error){

echo'connection reussi: '.$error->getMessage();

}
