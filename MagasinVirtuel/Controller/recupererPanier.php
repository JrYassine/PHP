<?php

include_once('../Model/panier.php');

$nameClient = $_SESSION['userConnected'];

$panierClient = recupererPanier($nameClient);
$descriptions = array();
foreach($panierClient as $cle => $panier)
{
    $panierClient[$cle]['reference'] = htmlspecialchars($panier['reference']);
    $panierClient[$cle]['prix'] =(double) htmlspecialchars($panier['prix']);
    $panierClient[$cle]['quantite'] =(int) htmlspecialchars($panier['quantite']);
}


include_once('../View/panier.php');
