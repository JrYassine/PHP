<?php

include_once(dirname(__FILE__).'../../../connection_bdd.php');


function ajouterCategorie($nomCategorie){
    
    global $bdd;
    
    $req= $bdd->prepare('INSERT INTO categorie(libelle) VALUES(:libelle);');
    $req->execute(array('libelle' => $nomCategorie));
    
    $req->closeCursor();
}


function supprimerCategorie($nomCategorie){
    
    global $bdd;
    
    $req= $bdd->prepare('DELETE FROM categorie WHERE libelle = ?');
    $req->execute(array($nomCategorie));
    $req->closeCursor();
}