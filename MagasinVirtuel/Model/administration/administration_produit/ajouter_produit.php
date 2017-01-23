<?php

include_once(dirname(__FILE__).'../../../connection_bdd.php');
require(dirname(__FILE__).'../../../Produit.php');

function ajouterProduit(Produit $produit){
    global $bdd;
 
    $reference= $produit->getReference();
    $description= $produit->getDescription();
    $prix_public= $produit->getPrixPublic();
    $prix_achat= $produit->getPrixAchat();
    $image=$produit->getImage();
    $titre=$produit->getTitre();
    $descriptif = $produit->getDescriptif();
    $quantite = $produit->getQuantite();
    $libelleCategorie= $produit->getCategorie();
    
    
    $req = $bdd->prepare('INSERT INTO produit(reference,description,prix_public,prix_achat,image,titre,descriptif,quantite,libelleCategorie) VALUES(:reference,:description,:prix_public,:prix_achat,:image,:titre,:descriptif,:quantite,:libelleCategorie)');

    $req->execute(array(
        'reference' => $reference,
        'description' => $description,
        'prix_public' => $prix_public,
        'prix_achat' => $prix_achat,
        'image' => $image,
        'titre' => $titre,
        'descriptif' => $descriptif,
        'quantite' => $quantite,
        'libelleCategorie' => $libelleCategorie
        ));  
    
    $req->closeCursor();
    
    $req2 = $bdd->prepare('SELECT id_produit FROM produit WHERE reference = ?'); // recuperer l'id du produit concerné
    $req2->execute(array($reference)); 
    
    $prod = $req2->fetch();
    
    $id_produit = $prod['id_produit'];
    
    $req2->closeCursor();
    
    $req3 = $bdd->prepare('SELECT id_categorie from categorie C INNER JOIN produit P on (C.libelle=P.libelleCategorie) WHERE libelleCategorie= ?'); // recuperer l'id de la categorie du produit concerné
    $req3->execute(array($libelleCategorie));
    
    $cat = $req3->fetch();
    
    $id_categorie = $cat['id_categorie'];
    
    $req3->closeCursor();

    $req4 = $bdd->prepare('INSERT INTO categorie_produit(id_categorie,id_produit) VALUES(:id_categorie,:id_produit)');

    $req4->execute(array(
        'id_categorie' => $id_categorie,
        'id_produit' => $id_produit
     ));  
    
    $req4->closeCursor();
        
}




?>