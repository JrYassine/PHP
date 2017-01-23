<?php

include_once('../../../Model/administration/administration_produit/supprimer_produit.php');
$reference= htmlspecialchars($_POST['reference']);

if(empty($reference)){
    echo("Veuillez remplir le champ");
    echo("<p><a href='../../../View/administration/administration_produit/supprimer_produit.php'> Cliquez ici pour retourner au formulaire</a></p>" );
}else if(empty(getProduitReference($reference))){
    echo("Ce produit est inexistant ");
    echo("<p><a href='../../../View/administration/administration_produit/supprimer_produit.php'> Cliquez ici pour retourner au formulaire</a></p>" );
}else{
    supprimerProduit($reference);
    echo("Le produit ayant pour référence ". $reference." a bien été supprimé");
    echo("<p> Vous allez être redirigé dans quelques instants...</p>");
    header("Refresh: 2; url='../../../View/administration/administration_produit/supprimer_produit.php'");
}