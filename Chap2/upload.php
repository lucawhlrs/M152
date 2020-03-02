<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Upload</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/facebook.css" rel="stylesheet">
    </head>
        
</html>

<?php
require_once 'functions.php';
//echo '<pre>';
//var_dump($_FILES['pictures']);
//var_dump($_POST["commentaire"]);
//echo '</pre>';


$t = time();
$ymd = date("Y-m-d_", $t);

$commentaire = $_POST['commentaire'];
$dateCreation = $ymd;
$dateModification = $ymd;

$typeMedia = "photo";
$creationDateMedia = $ymd;
$modificationDateMedia = $ymd;
$nomMedia;

$uploaddir = "C:/Users/wohlersl/Desktop/EasyPHP-DevServer-14.1VC9/data/localweb/FacebookUpload/ImagesPost/";

addPost($commentaire, $dateCreation, $dateModification);
$lastId = connexionDB()->lastInsertId();

for ($index = 0; $index < count($_FILES['pictures']['name']); $index++) {
    $_FILES['pictures']['name'][$index] = $ymd . $t . $_FILES['pictures']['name'][$index];
    $nomMedia = $_FILES['pictures']['name'][$index];
      
    
    $uploadfile = $uploaddir . basename($_FILES['pictures']['name'][$index]);
    
    if (move_uploaded_file($_FILES['pictures']['tmp_name'][$index], $uploadfile)) {
        echo "Le fichier est valide, et a été téléchargé avec succès.";
        addMedia($typeMedia, $nomMedia, $creationDateMedia, $modificationDateMedia, $lastId);
    } else {
        echo "Attaque potentielle par téléchargement de fichiers.";
    }
    
}