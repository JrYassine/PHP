<!DOCTYPE HTML>
<html>

	<head>
		<title> Magasin </title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../css/style.css" />
	</head>


<body>

<div id="body">

	<header>
	<?php
            if(!isset($_SESSION['userConnected'])){
                include('menu/menuPrincipale.php');
            }else if($_SESSION['userConnected'] != 'admin') {
                include('menu/menuClient.php');
            }else{
                include('menu/menuAdmin.php');
            }
        ?>

	</header>
    
	
        <table class="tablePanier">
                <tr>
                  <th>Reference </th>
                  <th>Prix</th>
                  <th>Quantite</th>
                </tr>
          <?php $tableauQuantite = array(); if(!empty($panierClient)){
                foreach($panierClient as $panier){  ?>
                <tr>
                  <td><?php echo($panier['reference']) ?> <br/> <a href="../Controller/actionPanier.php?supprimer=<?php echo($panier['reference']) ?>" class="supprimer">Supprimer ce produit</a></td>
                  <td><?php echo($panier['prix']."€") ?></td>
                   <td><?php echo($panier['quantite']) ?></td>
                  </tr>
         <?php }} else{
                   echo("Votre panier est actuellement vide... ;-(");
               }
         ?>
        </table>

         <input type="button" onclick="document.location.href='../Controller/commande.php'" value ="Commander" name="commander" > 

</body>


</html>

