<?php

include_once(dirname(__FILE__).'/connection_bdd.php');

function getProduit($titre){
    
    global $bdd;
    
    
    $req = $bdd->prepare('SELECT * FROM produit WHERE titre= ?');
     

    $req->execute(array($titre));
    
    $produit = $req->fetchAll();
    $req->closeCursor();
    
    return $produit;
    
    
}

?>