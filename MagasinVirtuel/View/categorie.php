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
	
	<div id="sidebar">
		<?php include('sidebar.php');?>
	</div>
    
      
       
	<div id="contenu">
            
            <table>
               <tr>
                   <?php
                        foreach($produits as $produit){
                   ?>
                   <td><img class = "bottom" src="../image/<?php echo($produit['image']); ?>" alt=<?php echo($produit['titre']); ?> /></td>
              </tr>
              <tr>
                  <td><center><a href="../Controller/ficheProduit.php?produit=<?php echo($produit['titre']); ?>" class="ficheProduit" > <?php echo($produit['titre']); ?> </a></center></td>
              </tr>
           </table>
        <?php  
        }
        ?>
            
        </div>

</body>


</html>

