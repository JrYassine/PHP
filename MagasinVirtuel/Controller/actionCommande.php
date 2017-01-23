<?php

include_once('../Model/commande.php');
include_once('../Model/stock.php');

$urlCourant = htmlspecialchars($_SERVER['REQUEST_URI']);
$urlCourantTableau = explode("=",$urlCourant);
$action = $urlCourantTableau[1];

if ($action == "annuler"){
 
    echo("La commande a bien été annulé.");
    header("Refresh: 1;url=./recupererPanier.php");
    
}else if($action=="valider"){
    creerFacture();
    ajouterProduitStock();
    deletePanierClient();
    modifier_stock();
    
    echo("La commande a bien été effectué !<br/>");
    echo("Vous allez être redirigé dans quelque instants...");
    header("Refresh: 3;url=../View/index.php");

}else{
    header("Location = commande.php");
}