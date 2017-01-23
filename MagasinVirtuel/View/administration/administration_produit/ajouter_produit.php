<html>
	<head>
		<meta charset="utf-8" />
                <link rel="stylesheet" href="../../../css/style2.css"/>
	</head>
<body>
    <header>
       <?php include_once('../../../View/menu/menuAdministrationProduit.php'); ?>
    </header>

    <h1> Ajouter un produit </h1>
    <form method="post" action="../../../Controller/administration/administration_produit/ajouter_produit.php">
        <p>
            <label>Reference du produit</label> : <input type="text" name="reference" size ="27"  placeholder="" />
        </p>
        <p>
           <label for="description">Description du produit :</label><br/>
           <textarea name="description" id="description" rows="5" cols="27" placeholder="taille,couleur,spécification techniques,..."></textarea>
        </p>
        <p>
            <label>Prix public</label> : <input type="text" name="prix_public" size ="27" />
        </p>
        <p>
             <label>Prix achat</label> : <input type="text" name="prix_achat" size ="27" placeholder="" />
        </p>
        <p>
             <label>Image du produit</label> : <input type="file" name="image" size ="27" placeholder="facultatif" />
        </p>
        <p>
             <label>Titre du produit</label> : <input type="text" name="titre" size ="27" placeholder="" />
        </p>
        <p>
           <label for="descriptif">Descriptif du produit :</label><br/>
           <textarea name="descriptif" id="descriptif" rows="5" cols="27" placeholder=""></textarea>
        </p>
        <p>
             <label>Quantité du produit</label> : <input type="text" name="quantite" size ="27" placeholder="" />
        </p>
        <p>
             <label>Catégorie</label> : <input type="text" name="categorie" size ="27" placeholder="" />
        </p>
        <p>
            <input type="submit"  name="Valider" />
        </p>
    </form>
   
    
<body>
    
    
</html>