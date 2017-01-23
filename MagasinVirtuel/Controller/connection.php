<?php
session_start();
$_SESSION['userConnected'] = '';
include_once('../Model/connection.php');

$nom =  htmlspecialchars($_POST['nom']);
$email = htmlspecialchars($_POST['email']);
$password= htmlspecialchars($_POST['pass']);
$emailClient = getEmailClient($email);
$nameClient = getNameClient($nom);
$passwordClient = getPasswordClient($password);

if(!empty($_SESSION['userConnected'])){
    header("Location: ../Controller/deconnexion.php"); // empêcher le retour en arrière après connexion 
}

if(empty($emailClient) || empty($nameClient)){
    echo("Vous n'avez aucun compte à cette adresse");
    echo("<p>Pour revenir à l'écran de connection <a href='../View/connection.php'> Cliquez ici</a></p>");
}else if($password != $passwordClient || $email != $emailClient || $nom != $nameClient){
    echo("Identifiant invalide");
    echo("<p>Pour revenir à l'écran de connection <a href='../View/connection.php'> Cliquez ici</a></p>");
}else{
    
    $_SESSION['userConnected'] = $nameClient;
    header("Location: ../View/index.php");
    exit();
    
}



?>