<?php

include_once(dirname(__FILE__).'../../../connection_bdd.php');


function afficherProduit($reference){
    global $bdd;
    
    
    $req = $bdd->prepare('SELECT * FROM produit WHERE reference = ? ');
    
    $req->execute(array($reference));
    
    while ($produit =  $req->fetch()){
        echo 'Reference : '.$produit['reference'] . '<br/>';
        echo 'Description : '.$produit['description'] . '<br/>';
        echo 'Prix public : '.$produit['prix_public'] . '<br/>';
        echo 'Prix achat : ' .$produit['prix_achat'] . '<br/>';
        echo 'Titre : '.$produit['titre'] . '<br/>';
        echo 'Image : '. '<img src="../../../image/'.$produit['image'].'" alt="Texte Alternatif"/>' . '<br/>';  
        echo 'Descriptif :' .$produit['descriptif'] . '<br/>';
        echo 'Produit : '.$produit['quantite'] . '<br/>';
        echo 'Categorie : '.$produit['libelleCategorie'] . '<br/>';

    }
    $req->closeCursor();
           
}

function getProduitReference($reference){
    global $bdd;
    
    $req = $bdd->prepare('SELECT reference FROM produit WHERE reference = ? ');
    $req->execute(array($reference));
    
    $produit = $req->fetch();
    $req->closeCursor();
    return $produit['reference'];
    

        
            
}

