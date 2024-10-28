<?php

require_once"connexion.php";


$message="";

if(isset($_GET["id"])){

    // $model = htmlspecialchars($_POST['model']) ??"";
    // $nom = htmlspecialchars($_POST['nom']) ?? "";
    $id = $_GET['id'];
    $sql = "SELECT * FROM vehicule WHERE id=?";

    $requet= $cnx->prepare($sql);

     
    $requet->execute([$id]);
    

    $donnees = $requet->fetchAll();
}
    
if(isset($_POST['update'])){


    $model = htmlspecialchars($_POST['model']) ??"";
    $nom = htmlspecialchars($_POST['nom']) ?? "";
    
    $sql= "UPDATE vehicule SET model=?,nom=? WHERE id=?";
    $requet = $cnx->prepare($sql);
    $requet->execute([$model,$nom,$id]);

    $message = "voiture modifier avec succes";
}




?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de vente</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form method="POST">
<?= $message ?>
   <?php  foreach($donnees as $donnee): ?>

  <label for="model">Model :</label>
  <input type="text" id="model" name="model" value="<?=$donnee['model'] ;?>"><br><br>
  
  <label for="nom">Nom:</label>
  <input type="text" id="nom" name="nom" value="<?=$donnee['nom'] ;?>"><br><br>
  <input type="submit" name="update" value="Modifier">
  <a href="index.php">Retour</a>
  <?php endforeach; ?>

  
</form>
</body>
</html>