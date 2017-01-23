<?php

include_once(dirname(__FILE__).'../../../connection_bdd.php');
include_once(dirname(__FILE__).'/consulter_produit.php');



function supprimerProduit($reference){
    global $bdd;
    
    
    $req = $bdd->prepare('DELETE FROM produit WHERE reference = ? ');
    
    $req->execute(array($reference));
    
    $req->closeCursor();

}
