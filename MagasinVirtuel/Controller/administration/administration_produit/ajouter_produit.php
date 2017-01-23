<?php

require_once('../../../Model/administration/administration_produit/ajouter_produit.php');


$reference= htmlspecialchars($_POST['reference']);
$description= htmlspecialchars($_POST['description']);
$prixPublic= (double) htmlspecialchars($_POST['prix_public']);
$prixAchat= (double) htmlspecialchars($_POST['prix_achat']);
$image= htmlspecialchars($_POST['image']);
$titre= htmlspecialchars($_POST['titre']);
$descriptif= htmlspecialchars($_POST['descriptif']);
$quantite= (int) htmlspecialchars($_POST['quantite']);
$categorie= htmlspecialchars($_POST['categorie']);


if(empty($reference) || empty($description) || empty($prixAchat) || empty($prixPublic) || empty($image) || empty($titre) ||  empty($descriptif) || empty($categorie) ||empty($quantite)){
    echo("Un ou plusieurs champs ne sont pas remplis");
    echo("<p><a href='../../../View/administration/administration_produit/ajouter_produit.php'> Cliquez ici pour retourner au formulaire</a></p>" );
    
}else{
    $produit= new Produit($reference, $description, $prixPublic, $prixAchat, $image, $titre, $descriptif, $quantite,$categorie);
    ajouterProduit($produit);
    echo("Le produit ayant pour référence ". $reference." a bien été ajouté");
    echo("<p> Vous allez être redirigé dans quelques instants...</p>");
    header("Refresh: 2; url='../../../View/administration/administration_produit/ajouter_produit.php'");
      
}