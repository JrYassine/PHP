<?php

include_once('../Model/ficheProduit.php');

$nomProduit = htmlspecialchars($_GET['produit']);

$nomProduitExist = getProduit($nomProduit);
if(empty($nomProduitExist)){
    
    header('Location: ../View/index.php');
}else{
   
   $produits = getProduit($nomProduit);
    foreach($produits as $cle => $produit) {
        $produits[$cle]['description'] = htmlspecialchars($produit['description']);
        $produits[$cle]['descriptif'] = nl2br(htmlspecialchars($produit['descriptif']));
        $produits[$cle]['prix_achat'] = htmlspecialchars($produit['prix_achat']);
        $produits[$cle]['prix_public'] = htmlspecialchars($produit['prix_public']);
        $produits[$cle]['image'] = htmlspecialchars($produit['image']);
        $produits[$cle]['quantite'] = htmlspecialchars($produit['quantite']);
        $produits[$cle]['titre'] = htmlspecialchars($produit['titre']);
    }   
    
    include_once('../View/ficheProduit.php');
    
}
