<?php
include_once('../Model/panier.php');

$urlCourant = htmlspecialchars($_SERVER['REQUEST_URI']);
$urlCourantTableau = explode("=",$urlCourant);
$action = $urlCourantTableau[1];


 if ($urlCourant == "/MagasinVirtuel/Controller/actionPanier.php?supprimer=$action"){
    $produit = htmlspecialchars($_GET['supprimer']);
    supprimerProduitPanier($produit);
    echo("<p> Le produit a bien été supprimé de votre panier ! </p>");
    header("Refresh: 1;url=./recupererPanier.php");
    
}else{
    $titreProduit = htmlspecialchars($_GET['produit']);
    $reference = getReference($titreProduit);
    $prix = (double) getPrix($titreProduit);
    $produits = getProduit($titreProduit);
    $panier = getIdClientPanier();
    $verificationDoublon = verifRefProduit($reference);
    $quantite=htmlspecialchars($_POST['quantite']);
    
    if(empty($titreProduit)){
         header("Location= ../View/index.php");
    }
  
    if(!isset($panier) && empty($panier)){
         ajouterPanier();
    }
    
    foreach($produits as $cle => $produit) {
        $id_produit = htmlspecialchars($produit['id_produit']);
    }   
    
    
    if(!isset($verificationDoublon)){
       ajouterProduitPanier($id_produit,$quantite,$prix,$reference);
       echo("<p> Le produit a bien été ajouté à votre panier ! </p>");
       header("Refresh: 1.2;url=../View/index.php");
       
    }else{
       echo("<p> Le produit est déjà dans votre panier ! </p>");
       header("Refresh: 1.2;url=../View/index.php");
         
  
    }
 
    
  
  

}
 
    
   

