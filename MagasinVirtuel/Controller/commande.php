<?php
include_once('../Model/commande.php');
include_once('../Model/panier.php');
 

$panierClient = recupererPanier(htmlspecialchars($_SESSION['userConnected']));

if(empty($panierClient)){
    echo("Il n'y a aucun produit dans votre panier !");
    header("Refresh: 1;url=./recupererPanier.php");
    
}else{

    
    $emailClient = getEmailClient(htmlspecialchars($_SESSION['userConnected']));
    $prenomClient= getPrenomClient(htmlspecialchars($_SESSION['userConnected']));
    $nomClient = htmlspecialchars($_SESSION['userConnected']);
    $descriptions= array();
    $prixHT=  calculerPrixHT();
    $prixTTC = round(($prixHT * 1.2),2);
   
    $i=0;

    foreach($panierClient as $cle => $panier)
    {
        $panierClient[$cle]['reference'] = htmlspecialchars($panier['reference']);
        $panierClient[$cle]['prix'] =(double) htmlspecialchars($panier['prix']);
        $panierClient[$cle]['quantite'] =(int) htmlspecialchars($panier['quantite']);
        $descriptions[] = getDescription($panierClient[$cle]['reference']); 
        $i++;
    
    }
    

    include_once("../View/commande.php");

    
}

?>