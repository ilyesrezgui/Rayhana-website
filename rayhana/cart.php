<?php
    session_start();
    $database_name = "test";
    $con = mysqli_connect("localhost","root","",$database_name);
if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="Cart.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="Cart.php"</script>';
                }
            }
        }
    }
?>
<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--afficher la page b akwa qualit? mawjouda-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- bech el page tethal ala telifoun f kobr el ecran w el pc kif kif -->
	<title> SHOPPING CART </title> <!-- donner un titre pour la page-->
	<link href="cart.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/b42ff78973.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="footer.css" rel="stylesheet">
	
	</head>
	<body>
	<div class="header">
	<nav id="nav-bar">
		<img src="img/Plan de travail 9.png" class="logo">
		<ul class="nav-links">
			<li><a href="indexberasmi.php" class="active">Our Products</a></li>
			<li><a href="aboutus.html">About Us</a></li>
			<li><a href="contactuus.html">Contact Us</a></li>
		</ul>
        <div class="search-box">
			<form method="POST">
				<input type="text" class="input-txt" name="search" placeholder="Type to search"></input>
				<input type="submit" name="submit" value="Search" class="btn-submit"></button>
			</form>	
			<?php 
			if(isset($_POST['submit'])){
				require "php/search2.php";
				if (count($results)>0){
					foreach ($results as $r){
						echo "<div>" . $r['title'] . " - " .$r['description'] . "</div>";
					}
				} else {echo "<div> No results found.</div>"; }
			}
			?>
		</div>
		<a href="Signin.html" class="Register-btn">Sign Out</a>
	</nav>
	<div class="table-responsive">
        <h3 class="title2">Shopping Cart Details</h3>
        
           <center> <table class="table-bordered" cellspacing="15">
				<tr>
					<th width="30%" >Product Name</th>
					<th width="10%">Quantity</th>
					<th width="13%">Price Details</th>
					<th width="10%">Total Price</th>
					<th width="17%">Remove Item</th>
				</tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><center><?php echo $value["item_name"]; ?></center></td>
                            <td><center><?php echo $value["item_quantity"]; ?></center></td>
                            <td><center>$ <?php echo $value["product_price"]; ?></center></td>
                            <td><center>
                                $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></center></td>
                            <td><a  style="text-decoration:none;"  href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        style="border:3px solid #AF2230;border-radius:10px;color:white;background-color:#AF2230;padding:3px 20px 3px 20px;margin-left:53px; font-size:14px;">Remove</span></a></td>
                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
            </table></center>
    	
	<br><br><br><br><br>
	<footer>
	<a href="https://facebook.com"><i class="fa-brands fa-facebook-f"></i></a>
	<a href="https://instagram.com"><i class="fa-brands fa-instagram"></i></a>
	<a href="https://linkedin.com"><i class="fa-brands fa-linkedin-in"></i></a>
	<a href="https://twitter.com"><i class="fa-brands fa-twitter"></i></a>
	<a href="https://gmail.com"><i class="fa-solid fa-envelope"></i></a>
	<hr>
	<p>copyright © 2022 all rights reserved</p>
	</footer>
	</div>
	
	</div><!-- hethi el taskira div mta3 el container sachant que le contnu lkol feha -->
    <script src="home.js"></script>
  <!-- link to js-->
	<script src="main.js"></script>
	
	<script src="js/footer.js"></script>
    </div>
	</body>
	</html>