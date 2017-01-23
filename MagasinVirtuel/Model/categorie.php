<?php

include_once(dirname(__FILE__).'/connection_bdd.php');


function getCategorie($nomCategorie){
    
    global $bdd;
    
    $req = $bdd->prepare('SELECT libelle FROM categorie WHERE libelle = ? ');
    
    $req->execute(array($nomCategorie));
    
    $categorie = $req->fetch();
    $req->closeCursor();
    
    return $categorie['libelle'];
    
}


function getProduitCategorie($libelle){
    
    global $bdd;
    
    
    $req = $bdd->prepare('SELECT * FROM produit P INNER JOIN categorie C ON (C.libelle=P.libelleCategorie) WHERE libelle= ? ');
    
    $req->execute(array($libelle));
    
    $produit = $req->fetchAll();
    $req->closeCursor();
    
    return $produit;
    
    
}