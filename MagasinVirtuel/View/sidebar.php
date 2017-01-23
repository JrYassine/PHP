<div class="ul2">
    <center><span class="Rayon"> Rayon</span></center>
  
        <ul>
             <?php 
                foreach($categories as $categorie){
             ?>
                <li><a href="../Controller/categorie.php?categorie=<?php echo($categorie)?>" > <?php echo($categorie)?> </a></li>	
             <?php } ?>
        </ul>
   
</div>