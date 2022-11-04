<?php
#pour sécuriser l'accès au dashboard
 session_start();
 if(!$_SESSION['mdp']){
    header('Location: connexion.php');#rediriger vers la page de connexion
      
 }
?>
<!doctype html>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
	<link href="product.css" rel="stylesheet">
	<link href="productt.css" rel="stylesheet">
</head>
<body class="dashboard">

<center>
<br><br><br><br><br><br><br><br><br><br>
    <a class="btt" href="client.php">Show all members</a>
	<br><br><br><br><br><br><br><br><br><br>
    <a class="btt" href="publier_article.php">Publish articles</a>
	<br><br><br><br><br><br><br><br><br><br>
    <a class="btt" href="produit.php">Show all articles</a>
</center>

</body>
</html>