<!DOCTYPE HTML>
<?php
    session_start()
?>

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
	
              <img class = "bottom" src="../image/<?php echo($produit['image']);?>" alt="pc_asus"/>
              
              <p class="descriptionProduit">
                
                  <b>Description :</b> <br/> 
                    <?php echo($produit['description']); ?> <br/> <br/>
                  <b>Caractéristique :</b> <br/> 
                    <?php echo($produit['descriptif']);?> <br/>
                   

              </p>
              
              <div class ="classFiche" > <b>Prix conseillé</b> : <?php echo($produit['prix_public']); ?> €</div>
              
              <div class ="classFiche" > <b>Prix</b> : <?php echo($produit['prix_achat']);?>€ </div>
              
              <div class="classFiche" > <b>Quantité en stock</b>: <?php echo($produit['quantite']);?> </div>
              
              <div class="classFiche"> <b> Quantité </b> 
                  <form action="../Controller/actionPanier.php?produit=<?php echo($produit['titre']);?>" method="post">
                     <input type='number' value='1' min='1' max='<?php echo($produit['quantite']);?>' name="quantite" id="quantite"/>
                  </form>
              </div>
              
   
              <?php if (isset($_SESSION['userConnected']) && $produit['quantite']!= 0) { ?> 
                    <button onclick="document.forms[0].submit();" class="ajouterPanier" >Ajouter au panier </button>

              <?php }?>
              
              
        

</body>


</html>

