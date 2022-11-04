<?php
 session_start();
 $bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
 if(!$_SESSION['mdp']){
    header('Location: connexion.php');
      
 }
?>
<!doctype html>
<html>
<head>
    <title>Articles</title>
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
	
<?php
    $recupArt = $bdd->query('SELECT * FROM product');
    while($article = $recupArt->fetch()){
        ?>
        <div class="product">
           <h3><?=$article["pname"]; ?></h1>
		   <br><p><?=$article["description"];?></p>
           <br><h4 style="font-weight:normal"><span style="font-size:17px;color:#AF2230">Type: </span> <?=$article["type"];?> </h4>
           <br><h4 style="font-weight:normal"><span style="font-size:17px;color:#AF2230">Path: </span><?=$article["image"]; ?> </h4>
           <h4 style="font-size:17px;color:#AF2230"><br>Price: <span style="color:black;"><?=$article["price"];?> DT </span></h4><br>
           <a href="supprimerArt.php?id=<?=$article['id'];?>"><button style="text-align:center;border:3px solid #c5a555;border-radius:10px;color:white;background-color:#c5a555;padding:3px 20px 3px 20px; font-size:14px;cursor: pointer;">Delete Article</button></a>
           <a href="modifier_article.php?id=<?=$article['id'];?>"><button style="text-align:center;border:3px solid #c5a555;border-radius:10px;color:white;background-color:#c5a555;padding:3px 20px 3px 20px; font-size:14px;cursor: pointer;">Modify article</button></a>
           
        </div>

        <?php
    }
?>
</body>
</html>