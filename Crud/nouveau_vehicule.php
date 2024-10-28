<?php

require_once"connexion.php";

$message = "";

if(isset($_POST["create"])){

    
    $model = htmlspecialchars($_POST['model']);
    $nom = htmlspecialchars($_POST['nom']);
  

    if(empty($model) || empty($nom)){
      
        $message= "Veuilez remplir tout les champs";
    }
    else{
    $sql="INSERT INTO vehicule(model,nom) VALUE(:model,:nom)";
    $query=$cnx->prepare($sql);
    $query->execute(compact('model','nom'));

    $message="voiture inserer avec succes!";
    }

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Ajouter une voiture</h2>
            <form action="" method="POST">

            <?=$message?> <br><br>
                <label for="Model">Model</label>
                <input type="text" id="model" name="model">
                <label for="">Nom</label>
                <input type="text" id="nom" name="nom">
                <input type="submit"name= "create"value="Valider">
                <a href="index.php">Retour</a>
            </form>
        </div>
    </div>

</body>
</html>