<!DOCTYPE html>
<!--  Il n'y a pas de formulaire pour choisir son mode de paiement (carte bancaire,carte visa,...) et pour gérer le paiement car 
ceci est virtuel sinon il aurait fallu créer un formulaire en vérifiant que les coordonnées bancaire du client sois exacte,... -->
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Magasin</title>
    <link rel="stylesheet" href="../css/style_facture.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <h1>FACTURE</h1>
      <div id="company" class="clearfix">
        <div>Magasin Virtuel</div>
        <div>41 Boulevard Napoléon III,<br /> 06206, Nice</div>
        <div>06.97.28.36.61</div>
        <div><a href="mailto:admin@gmail.com">admin@gmail.com</a></div>
      </div>
      <div id="project">
        <div><span>NOM</span> <?php echo($nomClient) ;?></div>
        <div><span>PRENOM</span> <?php echo($prenomClient) ;?></div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com"><?php echo($emailClient) ;?></a></div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Reference</th>
            <th class="desc">Description</th>
            <th>PRIX</th>
            <th>QUANTITE</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
         <?php $i=0; foreach($panierClient as $panier){?>
          <tr> 
            <td class="service"><?php echo($panier['reference']);?></td>
            <td class="desc"><?php echo($descriptions[$i][0][0])?></td>
            <td class="unit"><?php echo($panier['prix']."€");?></td>
            <td class="qty"><?php echo($panier['quantite']);?></td>
            <td class="total"><?php echo($panier['prix']*$panier['quantite']."€");?></td>
          </tr>
         <?php $i++;}?>
          <tr>
            <td colspan="4">PRIX HT</td>
            <td class="total"><?php echo($prixHT."€")?></td>
            
          </tr>.
          <tr>
            <td colspan="4">PRIX TTC</td>
            <td class="total"><?php echo($prixTTC."€");?></td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">Prix net à payer</td>
            <td class="grand total"><?php echo($prixTTC."€");?></td>
          </tr>
        </tbody>
      </table>
    </main>
         <a href="../Controller/actionCommande.php?action=annuler"> Annuler la commande </a>
         <a href="../Controller/actionCommande.php?action=valider" class="validerCommande"> Valider la commande </a>
  </body>
  
  
</html>