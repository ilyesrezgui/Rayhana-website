<?php
 $bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
 if(isset($_GET['id']) and !empty($_GET['id'])){
      $getId= $_GET['id'];
      $recupArt = $bdd->prepare('SELECT * FROM product WHERE id= ?');
      $recupArt->execute(array($getId));
      if ($recupArt->rowCount()>0){
          $deleteArt = $bdd->prepare('DELETE FROM product WHERE id = ?');
          $deleteArt->execute(array($getId));
          header('Location: produit.php');
      }
      else{
          echo "Article not found";
      }
 }
 else{
     echo "Indentifier not transmitted";
 }
?>