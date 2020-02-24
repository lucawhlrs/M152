<?php
echo '<pre>';
var_dump($_FILES['pictures']);
echo '</pre>';
$t = time();
$uploaddir = "C:/Users/wohlersl/Desktop/EasyPHP-DevServer-14.1VC9/data/localweb/FacebookUpload/temporaire/";

for ($index = 0; $index < count($_FILES['pictures']['name']); $index++) {
    $_FILES['pictures']['name'][$index] = date("Y-m-d_", $t) . $t . $_FILES['pictures']['name'][$index];
    $uploadfile = $uploaddir . basename($_FILES['pictures']['name'][$index]);
    echo '<pre>';
    if (move_uploaded_file($_FILES['pictures']['tmp_name'][$index], $uploadfile)) {
        echo "Le fichier est valide, et a été téléchargé
           avec succès. Voici plus d'informations :\n";
    } else {
        echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
    }
    echo '</pre>';
}
 /*
$_FILES['pictures']['name'][0] = date("Y-m-d_",$t) . $t . $_FILES['pictures']['name'][0];
$uploadfile = $uploaddir . basename($_FILES['pictures']['name'][0]);

echo 'Voici uploadfile:';
var_dump($uploadfile);
echo "***";

echo '<pre>';
if (move_uploaded_file($_FILES['pictures']['tmp_name'][0], $uploadfile)) {
    echo "Le fichier est valide, et a été téléchargé
           avec succès. Voici plus d'informations :\n";
} else {
    echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
}
*/
echo '<pre>';
echo 'Voici quelques informations de débogage :';
print_r($_FILES);

echo '</pre>';
?>