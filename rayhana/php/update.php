<?php 


$_SERVER['REQUEST_METHOD']="POST";/* khater php kaad dima yatini f request method get donc forsitou post pour connecter */
 if ($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
}
$nameh = (isset($_POST['nameh']))? $_POST['nameh']: "";
$datein = (isset($_POST['datein']))? $_POST['datein']: "";
$dateout = (isset($_POST['dateout']))? $_POST['dateout']: "";
$email = (isset($_POST['email']))? $_POST['email']: "";

$update="update reservation set email='$email' ,datein='$datein', dateout='$dateout' ,nameh='$nameh' where id=(select max(id) from reservation) ";
$resulatat=mysqli_query($con,$update);
$message='Your Reservation is Successfuly Updated';
 
echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
$url="../registerdone.html";
//eli louta bech tamel redirection lel page indexberami 
echo "<script type='text/javascript'> 
    window.location = '".$url."';
    </script>";

?>