<html>
	<head>
		<meta charset="utf-8" />
                <link rel="stylesheet" href="../../../css/style2.css" />
	</head>
<body>
    <header>
      <?php include_once('../../../View/menu/menuAdministrationProduit.php'); ?>
    </header>

    <h1> Consulter un produit </h1>
    <form method="post" action="../../../Controller/administration/administration_produit/consulter_produit.php">
        <p>
            <label>Reference du produit</label> : <input type="text" name="reference" size ="27"  placeholder="" />
        <p>
            <input type="submit"  name="Valider" />
        </p>
    </form>
   
    
<body>
    
    
</html>