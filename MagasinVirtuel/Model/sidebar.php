<?php

include_once(dirname(__FILE__).'/connection_bdd.php');


function getAllCategorie(){
    
     global $bdd;
    
    $categories = $bdd->query('SELECT * FROM categorie');
    return $categories;
    
    
}
