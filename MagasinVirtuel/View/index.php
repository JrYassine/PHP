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
		<?php include('../Controller/sidebar.php');?>
	</div>
	
	<div id="contenu">
            
           
            
            
        </div>

	

</body>


</html>

