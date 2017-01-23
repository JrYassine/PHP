<?php

include_once('connection_bdd.php');
function getEmailClient($email){
    global $bdd;
    
 
    $req = $bdd->prepare('SELECT email FROM client WHERE email= ? ');
    $req->execute(array($email));
    
    $emailClient = $req->fetch();
    $req->closeCursor();
    return $emailClient['email'];
   
    
}

function getPasswordClient($password){
    
   global $bdd;
    
    
    $req = $bdd->prepare('SELECT password FROM client WHERE password= ? ');
    $req->execute(array($password));
    
    $passwordClient = $req->fetch();
    $req->closeCursor();
    return $passwordClient['password'];
    
    
}

function getNameClient($nom){
    
    global $bdd;
    
  
    $req = $bdd->prepare('SELECT nom FROM client WHERE nom= ? ');
    $req->execute(array($nom));
    
    $nomClient = $req->fetch();
    $req->closeCursor();
    return htmlspecialchars($nomClient['nom']);
    
}


?>
