<?php
    include_once(dirname(__FILE__).'/connection_bdd.php');
    
    

    function verifNom($nom){
        if(is_string($nom)){
            if((preg_match("#^[A-Z]{1}[a-z]*$#", $nom))) return true; 
           
        }
    return false;     
    }
    
    function verifPrenom($prenom){
        if(is_string($prenom)){
            if((preg_match("#^[a-zA-Z]*$#", $prenom))) return true; 
            
        }
    return false;     
    } 
    
   
    function verifMail($mail)
    {
        if(is_string($mail)){
            if((preg_match("#^[a-zA-Z0-9._-]+[a-zA-Z0-9]{1,}\@{1}[a-z]{2,}\.[a-z]{2,3}$#", $mail))) return true;
            
        }
    return false; 
    }
    
  
    function verifSecurityPassword($password)
    {
        if(is_string($password)){
            if((preg_match("#([a-z0-9\_-]*)([A-Z]{2,})([0-9]{1,})#", $password)) || (preg_match("#([a-z0-9\_-]*)([0-9]{1,})([A-Z]{2,})#", $password))) {
                 if(strlen($password) >= 6 ){
                        return true;
                      
                 }
            }
                   
        }
    return false; 
    }
    
    
    
    function creerClient($nom,$prenom,$email,$password){
        
        global $bdd;
        
     
        $req = $bdd->prepare('INSERT INTO client(nom,prenom,email,password) VALUES (:nom,:prenom,:email,:password)' );
        $req->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'password' => $password
        ));
        
        $req->closeCursor();

    }
    


