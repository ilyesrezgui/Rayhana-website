
<?php 
session_start();
if(isset($_POST['valider']))   /*obliger le serveur une fois on clique submit d'executer ce code   */
{
    if(!empty($_POST['pseudo']) and !empty($_POST['mdp'])){
        $pseudo_par_defaut = "admin";
        $mdp_par_defaut= "admin1234";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']); /*pour sécuriser le transfert des données*/
        $mdp_saisi =  htmlspecialchars($_POST['mdp']) ;  

        /*verifier correspondance entre données saisies et celle de l'admin'*/
        if(($pseudo_saisi == $pseudo_par_defaut) and ($mdp_saisi == $mdp_par_defaut )){
            #declarer une session pour pouvoir échanger des informations pour toute les pages
            $_SESSION['mdp'] = $mdp_saisi ;
            #rediriger vers l'espace d'administration
            header('Location: dashboard.php');
        }
        else{
            
            echo "Impossible access ! Please try again";

        }
    } 
    else{
        echo "Please fill all the inputs";
    }
}
?>
<!doctype html>
<html>
<head>
    <title>Admin connexion space</title>
    <meta charset="utf-8">
	<link href="productt.css" rel="stylesheet">
	
</head>
<body >
	<div class="header">
<nav id="nav-bar">
		<img src="img/Plan de travail 9.png" class="logo">
		<ul class="nav-links">
			<li><a href="client.php">Show all members</a></li>
			<li><a href="publierArt.php">Publish article</a></li>
			<li><a href="produit.php">Show all articles</a></li>
		</ul>
</nav>
</div>
<br>

    <div class="creercompte-box">	
		<h1>Connect As Admin</h1>
		<br><br>
		<form action="" method="post">
						<div class="textbox">
							<label><b>Name</b></label>
							<input type="text" id="nom" name="pseudo" placeholder="Name" required ></input>
						</div>
						<div class="textbox">
							<label><b>Password</b></label>
							<input type="password"  id="mdp" name="mdp" placeholder="Password" required></input>
						</div>
						
						
							<input type="submit" name="valider" value="Connect" class="btn"></input>
							
                    </form>

    </div>
	
</body>
</html>
