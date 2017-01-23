<?php

include_once(dirname(__FILE__).'/connection_bdd.php');
include_once('panier.php');


function recupererDateMouvement($reference){
    
    global $bdd;
    $panierClient = getIdClientPanier();
    
    $req= $bdd->prepare('SELECT date_creation FROM facturation F INNER JOIN panier_produit P ON(F.id_panier=P.id_panier) WHERE P.reference= ? AND P.id_panier= ?');
    $req->execute(array($reference,$panierClient));
    
    $date = $req->fetch();
    $req->closeCursor();
    
    return $date['date_creation'];
    
    
}

function ajouterProduitStock(){
    global $bdd;
    $id_produit=  getIdProduit();
    $paniers= recupererPanier();
    $quantite=0;
    $reference="";
    $date_mouvement=array();
    $i=0;
   
    
    foreach($paniers as $cle => $panier){
        
        $quantite = $paniers[$cle]['quantite'];
        $reference = $paniers[$cle]['reference'];
        $date_mouvement = recupererDateMouvement($reference);
        
         $req= $bdd->prepare('INSERT INTO gestion_stock(id_produit,quantite,reference,date_mouvement) VALUES(:id_produit,:quantite,:reference,:date_mouvement);');
    
        $req->execute(array(
        'id_produit' => $id_produit[$i][0],
        'quantite' => $quantite,
        'reference' => $reference,
        'date_mouvement' => $date_mouvement
        ));
        
        $i++;
        
    }
       
    $req->closeCursor();
    
    
}


function modifier_stock(){
    
    global $bdd;
    
    $req = $bdd->prepare('SELECT G.reference,G.quantite FROM gestion_stock G INNER JOIN produit P ON (G.id_produit=P.id_produit)');
    
    $req->execute();
    $stocks = $req->fetchAll();
    
    $req->closeCursor();
    
 
    foreach($stocks as $cle => $stock){
        $req3 = $bdd->prepare('update produit SET quantite = ? WHERE reference = ?');
        $req2 = $bdd->prepare('SELECT quantite FROM produit WHERE reference = ?');
         
        $req2->execute(array($stock['reference']));
        $quantiteInitial = $req2->fetch();
        
        $req3->execute(array(($quantiteInitial[0]-$stock['quantite']),$stock['reference']) );
      
    }
    
      $req2->closeCursor();
      $req3->closeCursor();
 
}


 ?>
