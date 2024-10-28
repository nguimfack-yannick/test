<?php

require_once("connexion.php");


$message="";


if(isset($_GET["id"])){ 
   
  $id=$_GET["id"];

  $sql ="DELETE FROM vehicule WHERE id =?";

  $query=$cnx->prepare($sql);

  $query->execute([$id]);

  if($query->rowCount()>0){
   
     $message = "Auteur supprimer avec sucess.";
  }else{
    $message ="aucun auteur trouver avec cette id";
  }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>site de vente</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form>
 
  <input type="submit"name="delete" value="Supprimer">

  <a class="btn-delete" href="index.php">Retour</a>
</form>
</body>
</html>