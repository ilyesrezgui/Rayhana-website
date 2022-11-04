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
    <title>Registration</title>
    <meta charset="utf-8">
    <link href="productt.css" rel="stylesheet">
    <link href="product.css" rel="stylesheet">
    <style>
table{
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #AF2230;
  color: white;
}
</style>
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
    <!--afficher tout les membres-->
    <table style="border-radius:10px;padding:10px;color">
            <tr>
                <th>username </th>
                <th>password</th>
                <th>Email </th>
            </tr>
         
            <?php
             $recupUsers = $bdd->query('SELECT * FROM registration');
             while($user = $recupUsers->fetch()){
            ?>
        
            <tr>
                <td><?=$user['user'] ?></td>
                <td><?=$user['pwd'] ?></td>
                <td><?=$user['email'] ?></td>
                <td><a href="supprimer.php?id=<?= $user['id']; ?>" style="color:red;text-decoration:none">Delete the client</a></td>
            </tr>
        
            <?php } ?>

</table>
</body>
</html>