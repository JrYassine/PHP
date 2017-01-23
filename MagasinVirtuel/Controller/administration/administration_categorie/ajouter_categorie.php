<?php

require_once('../../../Model/administration/administration_categorie/administration_categorie.php');


$nomCategorie = htmlspecialchars($_POST['nomCategorie']);

if(empty($nomCategorie)){
    echo("Un ou plusieurs champs ne sont pas remplis");
    echo("<p><a href='../../../View/administration/administration_categorie/ajouter_categorie.php'> Cliquez ici pour retourner au formulaire</a></p>" );
    
}else{
    ajouterCategorie($nomCategorie);
    echo("La catégorie a bien été ajouté");
    echo("<p> Vous allez être redirigé dans quelques instants...</p>");
    header("Refresh: 2; url='../../../View/administration/administration_categorie/ajouter_categorie.php'");
      
}