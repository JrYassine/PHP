<?php
class Produit
{
  private $_reference;
  private $_description;
  private $_prix_public;
  private $_prix_achat;
  private $_image;
  private $_titre;
  private $_descriptif;
  private $_quantite;
  private $_categorie;

  
  public function __construct($reference,$description,$prix_public,$prix_achat,$image,$titre,$descriptif,$quantite,$categorie) {
	  
	  $this->setReference($reference);
	  $this->setDescription($description);
	  $this->setPrixPublic($prix_public);
          $this->setPrixAchat($prix_achat);
          $this->setImage($image);
          $this->setTitre($titre);
          $this->setDescriptif($descriptif);
          $this->setQuantite($quantite);
          $this->setCategorie($categorie);
    
  }
  
  
  public function setReference($reference){
		if(is_string($reference)){
			$this->_reference=$reference;
		}else{
			echo("La valeur doit être une chaine de caractère");
		}
  }
  
   public function setCategorie($categorie){
		if(is_string($categorie)){
			$this->_categorie=$categorie;
		}else{
			echo("La valeur doit être une chaine de caractère");
		}
  }
  
  public function setDescription($description){
		if(is_string($description)){
			$this->_description=$description;
		}else{
			echo("La valeur doit être une chaine de caractère");
		}
  }
  
  public function setPrixPublic($prix_public){
		if(is_double($prix_public)){
                    $this->_prix_public=$prix_public;
		}else{
			echo("La valeur doit être un entier");
		}
  }
  
  public function setPrixAchat($prix_achat){
		if(is_double($prix_achat) ){
                    $this->_prix_achat=$prix_achat;
		}else{
			echo("La valeur doit être un entier");
		}
  }
  
  public function setImage($image){
		if(is_string($image)){
                    $this->_image=$image;
		}else{
			echo("La valeur doit être une chaine de charactère");
		}
  }
  
  public function setTitre($titre){
		if(is_string($titre)){
                    $this->_titre=$titre;
		}else{
			echo("La valeur doit être une chaine de charactère");
		}
  }
  
  public function setDescriptif($descriptif){
		if(is_string($descriptif)){
                    $this->_descriptif=$descriptif;
		}else{
			echo("La valeur doit être une chaine de charactère");
		}
  }
  
  public function setQuantite($quantite){
		if(is_int($quantite)){
                    $this->_quantite=$quantite;
		}else{
			echo("La valeur doit être un entier");
		}
  }
  
  public function getReference(){
      return $this->_reference;
  }
  
  public function getDescription(){
      return $this->_description;
  }
  
  
  public function getPrixPublic(){
      return $this->_prix_public;
  }
  
  
  public function getPrixAchat(){
      return $this->_prix_achat;
  }
  
  public function getImage(){
      return $this->_image;
  }
  
   public function getTitre(){
      return $this->_titre;
  }
  
   public function getDescriptif(){
      return $this->_descriptif;
  }
  
   public function getQuantite(){
      return $this->_quantite;
  }
  
  public function getCategorie(){
      return $this->_categorie;
  }
  
  
  
 
  
  

  
}
