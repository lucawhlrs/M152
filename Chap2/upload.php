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
$commentaire = $_POST['commentaire'];
var_dump($commentaire);
if (empty($commentaire)) {
    header('Location:Post.php');
    exit();
}
//echo '<pre>';
//var_dump($_FILES['pictures']);
//var_dump($_POST["commentaire"]);
//echo '</pre>';

$t = time();
$ymd = date("Y-m-d-H-i-s_", $t);
$commentaire = $_POST['commentaire'];
$dateCreation = $ymd;
$dateModification = $ymd;

$typeMedia = "";
$creationDateMedia = $ymd;
$modificationDateMedia = $ymd;
$nomMedia;

$uploaddir = "./ImagesPosts/";



//Verification de la taille total des fichiers fourni
$fileSizeTotal = 0;
for ($index = 0; $index < count($_FILES['pictures']['name']); $index++) {
    $fileSizeTotal += $_FILES['pictures']['size'][$index];
}
if ($fileSizeTotal > 73400320) {
    header('Location:Post.php');
    exit();
}

//Ajout du commentaire
addPost($commentaire, $dateCreation, $dateModification);
$lastId = connexionDB()->lastInsertId();

//Ajout d'image par image
for ($index = 0; $index < count($_FILES['pictures']['name']); $index++) {
    $_FILES['pictures']['name'][$index] = $ymd . $t . $_FILES['pictures']['name'][$index];
    $nomMedia = $_FILES['pictures']['name'][$index];
    $typeMedia = $_FILES['pictures']['type'][$index];
    
    $uploadfile = $uploaddir . basename($_FILES['pictures']['name'][$index]);
    if ($_FILES['pictures']['size'][$index] <= 3145728) {
        if (move_uploaded_file($_FILES['pictures']['tmp_name'][$index], $uploadfile)) {
            echo "Le fichier est valide, et a été téléchargé avec succès.";
            addMedia($typeMedia, $nomMedia, $creationDateMedia, $modificationDateMedia, $lastId);
            header('Location:Home.php');
        } else {
            echo "Attaque potentielle par téléchargement de fichiers.";
        }
    }else{
        header('Location:Post.php');
    }
    
    
}