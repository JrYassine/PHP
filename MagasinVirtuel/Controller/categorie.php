<?php

include_once('../Model/categorie.php');

$nomCategorie = htmlspecialchars($_GET['categorie']);
$categorieExist = getCategorie($nomCategorie);
if(empty($categorieExist)){
    
    header('Location: ../View/index.php');
}else{
    $produits = getProduitCategorie($nomCategorie);
    
    foreach($produits as $cle => $produit) {
        $produits[$cle]['titre'] = htmlspecialchars($produit['titre']);
        $produits[$cle]['image'] = htmlspecialchars($produit['image']);
    }
    
    include_once('../View/categorie.php');
}