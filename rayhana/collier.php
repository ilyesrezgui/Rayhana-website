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
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NECKLACES</title>
   
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <link href="cartt.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/b42ff78973.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link href="footer.css" rel="stylesheet">
</head>
<body>
<div class="header">
<nav id="nav-bar">
		<img src="img/Plan de travail 9.png" class="logo">
		<ul class="nav-links">
		<li><a href="indexberasmi.php" >Home</a></li>
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
		<a href="Signin.html" class="Register-btn" style="text-decoration:none;">Sign Out</a>
	</nav>
	</div>
    <div class="container" style="width: 80%">
        <br>
		<br>
		<br>
		<br>
        <?php
            $query = "SELECT * FROM product where type='collier' ORDER BY id ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="Cart.php?action=add&id=<?php echo $row["id"]; ?>">
                         
                            <div class="product">
                                <img  style="border-radius:10px; border: 1px solid white;" src="<?php echo $row["image"]; ?>" class="img-responsive">
								
                                <h3 class="text-info"><?php echo $row["pname"]; ?></h3>
								<h5 class="text-info"><?php echo $row["description"]; ?></h5>
                                <h5 class="text-danger">Price: <?php echo $row["price"]; ?> DT</h5>
								<label for="quantity">Quantity </label>
                                <input type="text" name="quantity" id="quantity" style="padding:7px 25px 7px 25px;outline-color:#c5a555;border:1px solid black;border-radius:10px;" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["pname"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
								
                                <input type="submit" class="add" name="add" value="Add to Cart">
									   
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>
	</div>	
	<br><br><br><br>
    <footer>
	</footer>
        
	</div><!-- hethi el taskira div mta3 el container sachant que le contnu lkol feha -->
    <script src="home.js"></script>
  <!-- link to js-->
	<script src="main.js"></script>
	
	<script src="js/footer.js"></script>

</body>
</html>