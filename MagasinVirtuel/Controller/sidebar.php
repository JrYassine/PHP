<?php

include_once('../Model/sidebar.php');

$req = getAllCategorie();

$categories =array();

while($categorie = $req->fetch()) {
        array_push($categories, htmlspecialchars($categorie['libelle']));
 }
 
include_once('../View/sidebar.php');