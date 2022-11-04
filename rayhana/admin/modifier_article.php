<?php
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];

    $recupArt = $bdd->prepare('SELECT * FROM product WHERE id= ? ');
    $recupArt->execute(array($getid));
    if($recupArt->rowCount() > 0){
        $articleInfos = $recupArt->fetch();
        $pname = $articleInfos['pname'];
        $image = $articleInfos['image'];
        $price = $articleInfos['price'];
        $type = $articleInfos['type'];
        $description = $articleInfos['description'];


        //modification 
        if(isset($_POST['valider'])){
            $nv_pname = htmlspecialchars($_POST['pname']);
            $nv_image = htmlspecialchars($_POST['image']);
            $nv_price = htmlspecialchars($_POST['price']);
            $nv_type = htmlspecialchars($_POST['type']);
            $nv_description= nl2br(htmlspecialchars($_POST['description']));

        $updateArt= $bdd->prepare('UPDATE product SET image = ? and pname = ? and price = ? and type = ? and description = ? WHERE id = ? ');
        $updateArt->execute(array($nv_image,$nv_pname,$nv_price,$nv_type,$nv_description,$getid));

        header('Location: produit.php');

        }
        
        
    }else{
        echo "No article found";
    }

}else{
    echo "Aucun id trouvé";
}
?>

<!Doctype html>
 <html>
<head>
    <title>Update an article</title>
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
        <td><input type="text" name="pname" value="<?=$pname; ?>"></td>
        </tr>
		<tr>
        <td><label>Describe the product</td>
        <td><textarea name="description" > <?= $description; ?></textarea></td>
        </tr>
		<tr>
        <td><label>Download image</td>
   
        <td><input type="varchar" name="image" value="<?= $image; ?>"><br></td>
        </tr>
		<tr>
        <td><label>Product price</td>
        <td><input type="number" name="price" value="<?=$price ; ?>"></td>
        </tr>
		<tr>
        <td><label >Choose the type of the article</td>
        <td>
        <input type="radio" id="bague" name="type" value="bague"> Ring
		<br>
        <input type="radio" id="boucles" name="type" value="boucles"> Earings
        <br>
        <input type="radio" id="bracelet" name="type" value="bracelet">Bangles
        <br>
        <input type="radio" id="collier" name="type" value="collier">Necklace
        <td>
		</tr>
		<tr>
        <td class="btn"><input type="submit" name="valider" value="Submit"><center></td>
        <td class="btn"><input type="reset" value="reset"></td>
		</tr>
  </table></center>
  
    </form>

</body>
</html>