<?php

$uploaddir = "C:/Users/wohlersl/Desktop/EasyPHP-DevServer-14.1VC9/data/localweb/FacebookUpload/temporaire/";
$_FILES['pictures']['name'][0] = time() . $_FILES['pictures']['name'][0];
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

echo 'Voici quelques informations de débogage :';
print_r($_FILES);

echo '</pre>';

?>