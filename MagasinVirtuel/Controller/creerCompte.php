<?php
include_once('../Model/creerCompte.php');

$nom=  htmlspecialchars($_POST['nom']);
$prenom= htmlspecialchars($_POST['prenom']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['pass']);


if(empty($nom) || empty($email) || empty($password) || empty($prenom)){
    echo("Vous avez un ou plusieurs champs non remplies");
    echo("<p><a href='../View/creerCompte.php'> Cliquez ici pour retourner au formulaire</a></p>" );
    
  
}else if(!verifNom($nom) || !verifMail($email) || !verifSecurityPassword($password) || !verifPrenom($prenom)){
    echo("Champ invalide, vous devez respecter le format indiqué ");
    echo("<p><a href='../View/creerCompte.php'> Cliquez ici pour retourner au formulaire</a></p>" );
}else{
  
   creerClient($nom, $prenom, $email,$password);
   echo("Votre compte a été créé avec succès");
   echo("<p> Vous allez être redirigé dans quelques instants vers la page de connexion...</p>");
   header("Refresh: 3; url=../View/connection.php");
  
}


?>

