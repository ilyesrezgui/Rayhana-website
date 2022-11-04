<?php
   session_start();
   $bdd = new PDO('mysql:host=localhost;dbname=test;', 'root', '');
   /*verifier si l'identifiant est récupérer */
   if(isset($_GET['id']) AND !empty($_GET['id'])){
       $getId = $_GET['id'];
       $recupUser = $bdd->prepare('SELECT *FROM register WHERE id= ?');
       $recupUser->execute(array($getId));
       if($recupUser->rowcount() > 0){
           $bannirUser= $bdd->prepare('DELETE FROM register WHERE ID = ?');
           $bannirUser->execute(array($getId));

           header('Location: client.php');
       }
       else{
           echo "aucun client n'a été trouvé";
       }
   }
   else{
       echo "L'identifiant n'a pas été récupérer";
   }
?>