<?php

require_once('../../../Model/administration/administration_produit/consulter_produit.php');

$reference= htmlspecialchars($_POST['reference']);


if(empty($reference)){
    echo("Veuillez remplir le champ");
    echo("<p><a href='../../../View/administration/administration_produit/consulter_produit.php'> Cliquez ici pour retourner au formulaire</a></p>" );
}else if(empty(getProduitReference($reference))){
    echo("Ce produit est inexistant ");
    echo("<p><a href='../../../View/administration/administration_produit/consulter_produit.php'> Cliquez ici pour retourner au formulaire</a></p>" );
}else{
    afficherProduit($reference);
    echo("<p><a href='../../../View/administration/administration_produit/ajouter_produit.php'> Cliquez ici pour retourner au menu</a></p>" );
}