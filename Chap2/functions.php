<?php
function connexionDB() {
    $dbServer = "localhost";
    $dbName = "m152post";
    $dbUser = "root";
    $dbPwd = "";

    static $bdd = null;

    if ($bdd === null) {
        $bdd = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPwd);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $bdd;
}

function createNewUser($firstName, $lastName, $email, $passwordHash) {
	$conn = myPdo();
	$query = $conn->prepare('INSERT INTO tbl_user (Nm_First, Nm_Last, Txt_Email, Txt_Password_Hash) VALUES (:firstName, :lastName, :email, :passwordHash)');
	$query->bindParam(':firstName', $firstName, PDO::PARAM_STR);
	$query->bindParam(':lastName', $lastName, PDO::PARAM_STR);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':passwordHash', $passwordHash, PDO::PARAM_STR);
	$query->execute();
}

function addPost($commentaire, $dateCreation, $dateModification) {
    $bdd = connexionDB();
    $sql = "INSERT INTO post(commentaire, creationDate, modificationDate) values(:commentaire, :dateCreation, :dateModification)";
    $request = $bdd->prepare($sql);
    $request->execute(array(":commentaire" => $commentaire,
                            ":dateCreation" => $dateCreation,
                            ":dateModification" => $dateModification));
    return $bdd->LastInsertID();
 }
 
 function addMedia($typeMedia, $nomMedia, $creationDateMedia, $modificationDateMedia, $idPost) {
    $bdd = connexionDB();
    $sql = "INSERT INTO media(typeMedia, nomMedia, creationDate, modificationDate, idPost) values(:typeMedia, :nomMedia, :creationDateMedia, :modificationDateMedia, :idPost)";
    $request = $bdd->prepare($sql);
    $request->execute(array(":typeMedia" => $typeMedia,
                            ":nomMedia" => $nomMedia,
                            ":creationDateMedia" => $creationDateMedia,
                            ":modificationDateMedia" => $modificationDateMedia,
                            ":idPost" => $idPost));
    return $bdd->LastInsertID();
 }
 
function getAllUsers() {
    $bdd = connexionDB();
    $request = $bdd->query('SELECT * FROM Users ORDER BY idUser ASC');
    $info = $request->fetchAll(PDO::FETCH_ASSOC);
    
    return $info;
}

function getFirstNameById($idUser) {
    $bdd = connexionDB();
    $sql = "SELECT FirstName FROM Users WHERE idUser = :idUser";
    $request = $bdd->prepare($sql);
    $request->execute(array(":idUser" => $idUser));
    $info = $request->fetch(PDO::FETCH_ASSOC);
    return $info;
}




 
 function userExists($firstName, $lastName, $idHobbie) {
    $bdd = connexionDB();
        $sql = "SELECT FirstName, LastName, idHobbie FROM Users WHERE FirstName = :firstName AND LastName = :lastName AND idHobbie = :idHobbie";
        $request = $bdd->prepare($sql);
        $request->execute(array(":firstName" => $firstName, ":lastName" => $lastName, ":idHobbie" => $idHobbie));
        $infos = $request->fetch(PDO::FETCH_ASSOC);
        if (count($infos) <= 1){
            return false;
        } else {
            return true;
        }
}


function delUser($idUser){
    $bdd = connexionDB();
    $sql = "DELETE FROM Users WHERE idUser = :idUser";
    $request = $bdd->prepare($sql);
    $request->execute(array(":idUser" => $idUser));
}

function getUserById($idUser){
    $bdd = connexionDB();
    $sql = "SELECT * FROM Users WHERE idUser = :idUser";
    $request = $bdd->prepare($sql);
    $request->execute(array(":idUser" => $idUser));
    $event = $request->fetch(PDO::FETCH_ASSOC);
    return $event;
}


function mettreAJourUser($idUser, $firstName, $lastName, $idHobbie){
    $bdd = connexionDB();
    $sql = "UPDATE Users SET FirstName = :firstName, LastName = :lastName, idHobbie = :idHobbie WHERE idUser = :idUser";
    $request = $bdd->prepare($sql);
    $request->execute(array(
       ":firstName" => $firstName,
       ":lastName" => $lastName,
        ":idUser" => $idUser,
        ":idHobbie" => $idHobbie
   ));
}


function getHobbieById($idUser){
    $bdd = connexionDB();
    $sql = "SELECT Hobbies.Name FROM Hobbies, Users WHERE Users.idHobbie = Hobbies.idHobbie AND Users.idUser = :idUser";
    $request = $bdd->prepare($sql);
    $request->execute(array(":idUser" => $idUser));
    $event = $request->fetch(PDO::FETCH_ASSOC);
    return $event;
}


function getAllHobbies(){
    $bdd = connexionDB();
    $request = $bdd->query('SELECT * FROM Hobbies ORDER BY Name ASC');
    $info = $request->fetchAll(PDO::FETCH_ASSOC);
    
    return $info;
}


function sportExists($sport){
    $bdd = connexionDB();
    $sql = "SELECT Hobbies.Name FROM Hobbies WHERE Hobbies.Name = :sport";
    $request = $bdd->prepare($sql);
    $request->execute(array(":sport" => $sport));
    $infos = $request->fetch(PDO::FETCH_ASSOC);
    if (count($infos) >= 1){
        return true;
    } else {
        return false;
    }
}


function addSport($sport){
    $bdd = connexionDB();
    $sql = "INSERT INTO Hobbies(Name) values(:sport)";
    $request = $bdd->prepare($sql);
    $request->execute(array(":sport" => $sport));
    return $bdd->LastInsertID();
}