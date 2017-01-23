<?php
session_start();
include_once(dirname(__FILE__).'/connection_bdd.php');



function getProduit($titreProduit){
    
    global $bdd;
    
    
    $req = $bdd->prepare('SELECT * FROM produit WHERE titre= ?');
    
    $req->execute(array($titreProduit));
    
    $produit = $req->fetchAll();
    $req->closeCursor();
    
    return $produit;
    
    
}


function getIdClient(){
    
    global $bdd;
    
    $nameClient = $_SESSION['userConnected'];
    

    $req = $bdd->prepare('SELECT id_client FROM client WHERE nom= ? ');
    $req->execute(array($nameClient));
    
    $client = $req->fetch();
    $req->closeCursor();
    return $client['id_client'];
    
}

function getIdClientPanier(){
    
    global $bdd;
    
    $id_client= getIdClient();
    
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $req = $bdd->prepare('SELECT id_panier FROM panier WHERE id_client= ? ');
    $req->execute(array($id_client));
    
    $panier = $req->fetch();
    $req->closeCursor();
    return $panier['id_panier'];
    
}

function getIdProduit(){
     global $bdd;
    
    $id_client= getIdClient();

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $req = $bdd->prepare('SELECT id_produit FROM panier_produit P INNER JOIN panier P1 ON(P.id_panier=P1.id_panier) WHERE id_client= ? ');
    $req->execute(array($id_client));

    $id_produit = $req->fetchAll();
    $req->closeCursor();
    return $id_produit;
    
}
 
function getPrix($titreProduit){
    
    global $bdd;

    $req = $bdd->prepare('SELECT prix_achat FROM produit WHERE titre= ? ');
  
    $req->execute(array($titreProduit));
    
    $produit = $req->fetch();
    $req->closeCursor();
    return $produit['prix_achat'];
    
    
}



function getReference($titreProduit){
    
    global $bdd;

    $req = $bdd->prepare('SELECT reference FROM produit WHERE titre= ? ');
  
    $req->execute(array($titreProduit));
    
    $produit = $req->fetch();
    $req->closeCursor();
    return $produit['reference'];
    
}


function getQuantite($reference){
    
    global $bdd;
    $id_client = getIdClientPanier();
   
    $req = $bdd->prepare('SELECT quantite FROM panier_produit P INNER JOIN panier P1 ON(P.id_panier=P1.id_panier) WHERE reference = ? AND P1.id_client= ?');
    $req->execute(array($reference,$id_client));
    
    $quantite = $req->fetch();
    $req->closeCursor();
    return $quantite;
    
    
}


function verifRefProduit($titreProduit){
    global $bdd;
     
    $reference = getReference($titreProduit);
    
    
    $req = $bdd->prepare('SELECT reference FROM panier_produit WHERE reference= ? ');
    $req->execute(array($reference));
    
    $panier = $req->fetch();
    $req->closeCursor();
    return $panier;
}


function ajouterPanier(){
    
    global $bdd;
    
    $id_client = getIdClient();
    
  
    $req = $bdd->prepare('INSERT INTO panier(id_client) VALUES(:id_client)');
    
    $req->execute(array(
        'id_client' => $id_client
    ));
    
    $req->closeCursor();
}


function supprimerProduitPanier($reference){
    global $bdd;
   

    $req = $bdd->prepare('DELETE FROM panier_produit WHERE reference= ? ');
    
    $req->execute(array($reference));
    $req->closeCursor();
    
}

function ajouterProduitPanier($id_produit,$quantite,$prix,$reference){
    
    global $bdd;
    
    $id_panier= getIdClientPanier();
  
    $req = $bdd->prepare('INSERT INTO panier_produit(id_panier,id_produit,quantite,prix,reference) VALUES (:id_panier,:id_produit,:quantite,:prix,:reference)' );
    $req->execute(array(
        'id_panier' => $id_panier,
        'id_produit' => $id_produit,
        'quantite' => $quantite,
        'prix' => $prix,
        'reference' => $reference
     ));

}

function recupererPanier(){
    
    $nomClient = $_SESSION['userConnected'];
    global $bdd;
    $req = $bdd->prepare('SELECT P1.reference,P1.prix,P1.quantite FROM panier_produit P1 INNER JOIN panier P2 ON(P1.id_panier=P2.id_panier) INNER JOIN client C ON(P2.id_client=C.id_client) WHERE C.nom = ? ');
    
    $req->execute(array($nomClient));
    $panier = $req->fetchAll();
    $req->closeCursor();
    
    return $panier;
    
    
}

function getDescription($reference){
    
    global $bdd;
    
    $req = $bdd->prepare('SELECT description from produit P1 INNER JOIN panier_produit P2 ON(P1.id_produit=P2.id_produit) WHERE P1.reference= ? ');
    
    $req->execute(array($reference));
    $description = $req->fetchAll();
    $req->closeCursor();
    
    return $description;
    
}

function modifierQuantite($reference,$quantite){
    
    global $bdd;
    
    $req = $bdd->prepare('UPDATE panier_produit SET quantite = ? WHERE reference = ? ');
    
    $req->execute(array($quantite,$reference));
    $req->closeCursor();
   
    
}


function deletePanierClient(){
    global $bdd;
    $id_client=  getIdClient();
    
    $req = $bdd->prepare('DELETE P.* FROM panier_produit P INNER JOIN panier P1 ON(P.id_panier=P1.id_panier) WHERE P1.id_client = ? ');
    
    $req->execute(array($id_client));
    
    $req->closeCursor();
    
    
}