
<h1> Creer un Compte</h1>
<form method="post" action="../Controller/creerCompte.php">
    <p>
        <label>Votre nom</label> : <input type="text" name="nom" size ="27"  placeholder="doit commencer par une majuscule" />
    </p>
     <p>
        <label>Votre prenom</label> : <input type="text" name="prenom" size ="27" />
    </p>
    <p>
        <label>Votre e-mail</label> : <input type="mail" name="email" size ="27" />
    </p>
     <p>
        <label>Mot de passe</label> : <input type="password" name="pass" size ="27" placeholder="au moins 6 caracteres" />
        <i> doit contenir au moins deux majuscules et un chiffre</i>
    </p>
    <p>
        <input type="submit"  name="Valider" />
    </p>
    <p> Vous possédez déjà un compte ? <a href="../View/connection.php"> Cliquez ici ! </a>
</form> 
      
      
      
</form>
