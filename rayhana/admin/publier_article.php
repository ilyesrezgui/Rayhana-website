<?php
#pour sécuriser l'accès au dashboard
 session_start();
 $bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
 if(!$_SESSION['mdp']){
    header('Location: connexion.php');#rediriger vers la page de connexion
 }

 if(isset($_POST['envoi'])){
     if(!empty($_POST['pname']) and !empty($_POST['price']) and !empty($_POST['type']) and !empty($_POST['description'])){
         $pname = htmlspecialchars($_POST['pname']);
         $image = htmlspecialchars($_POST['image']);
         $price = htmlspecialchars($_POST['price']);
         $type = htmlspecialchars($_POST['type']);
         $description= nl2br(htmlspecialchars($_POST['description']));

         $insererArt= $bdd->prepare('INSERT INTO product(pname, image, price, type, description) VALUES (?,?,?,?,?) ');
         $insererArt->execute(array($pname,$image,$price,$type, $description));

         echo "l article a bien été envoyé";
     }else{
         echo "Veuillez remplir tout les champs";
     }
 }
 ?>
 <!Doctype html>
 <html>
<head>
    <title>Publier un article</title>
    <meta charset="utf-8">
    <link href="product.css" rel="stylesheet">
</head>
<body>
<div class="header">
<nav id="nav-bar">
		<img src="img/Plan de travail 9.png" class="logo">
		<ul class="nav-links">
			<li><a href="client.php">Show all members</a></li>
			<li><a href="publier_article.php">Publish article</a></li>
			<li><a href="produit.php">Show all articles</a></li>
		</ul>
</nav>
</div>
<br><br><br>
    <form method="POST" action="">
    <center> <table class="formulaire" border="3px bold black" cellspacing=7>
    <tr>
		<td><label>Product name</td>
        <td><input type="text" name="pname" required></td>
		</tr>
        <tr>
        <td><label>Describe product</td>
        <td><textarea name="description" required></textarea></td>
		</tr>
        <tr>
        <td><label>Download image</td>
        <td><input type="varchar" name="image"required></td>
		</tr>
		<tr>
        <td><label>Product price</td>
        <td><input type="number" name="price"required></td>
        </tr>
		<tr>
        <td><label >Choose the type of product</td>
        <td><input type="radio" id="bague" name="type" value="bague"> Ring
        <br>
        <input type="radio" id="boucles" name="type" value="boucles"> Earings
        <br>
        <input type="radio" id="bracelet" name="type" value="bracelet"> Bangles
        <br>
        <input type="radio" id="collier" name="type" value="collier"> Necklaces
        </td>
		</tr>
		<tr>
        <td class="btn"><center><input type="submit" name="envoi" value="Submit"></center></td>
        <td class="btn"><input type="reset" value="annuler"></td>
		</tr>
		</table></center>
    </form>

</body>
</html>