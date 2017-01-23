<?php
include_once(dirname(__FILE__).'/connection_bdd.php');
include_once('panier.php');
function getEmailClient($nom){
    
    global $bdd;
    
   
    $req = $bdd->prepare('SELECT email FROM client WHERE nom= ? ');
    $req->execute(array($nom));
    
    $emailClient = $req->fetch();
    $req->closeCursor();
    return $emailClient[0];
    
}

function getPrenomClient($nom){
    
    global $bdd;
    
    $req = $bdd->prepare('SELECT prenom FROM client WHERE nom= ? ');
    $req->execute(array($nom));
    
    $prenomClient = $req->fetch();
    $req->closeCursor();
    return $prenomClient[0];
}

function recupTotalPanier(){
    $nomClient = $_SESSION['userConnected'];
    global $bdd;
    
    $req = $bdd->prepare('SELECT prix FROM panier_produit P1 INNER JOIN panier P2 ON (P1.id_panier=P2.id_panier) INNER JOIN client C ON (P2.id_client=C.id_client) WHERE C.nom= ? ');
    
    $req->execute(array($nomClient));
    
    $totalPanier = $req->fetchAll();
    $req->closeCursor();
    
    return $totalPanier;
}

function calculerPrixHT(){
    global $bdd;
    $totals = recupTotalPanier();
    $prixHT=0;
    $id_panier= getIdClientPanier();
    $i=0;
    
    $req = $bdd->prepare('SELECT quantite FROM panier_produit WHERE id_panier = ?  ');
    
    $req->execute((array($id_panier)));
    
    $quantites = $req->fetchAll();
    $req->closeCursor();


    foreach($totals as $cle => $total ){
        $prixHT += $total['prix']*$quantites[$i][0];
        $i++;
    }
    
    return $prixHT;
    
}

function creerFacture(){
    global $bdd;
    
    $id_panier = getIdClientPanier();
    $id_client= getIdClient();
    $prixHT= calculerPrixHT();
    $prixTTC = round(($prixHT * 1.2),2);
    
  
    $req = $bdd->prepare('INSERT INTO facturation(id_client,id_panier,date_creation,prix_total_ht,prix_total_ttc) VALUES(:id_client,:id_panier,CURDATE(),:prix_total_ht,:prix_total_ttc); ');
    
    $req->execute(array(
        'id_client' => $id_client,
        'id_panier' => $id_panier,
        'prix_total_ht' => $prixHT,
        'prix_total_ttc' => $prixTTC      
    ));
    $req->closeCursor();
    
}
