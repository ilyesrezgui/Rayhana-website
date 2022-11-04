<?php 


$_SERVER['REQUEST_METHOD']="POST";/* khater php kaad dima yatini f request method get donc forsitou post pour connecter */
 if ($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
}


$delete="delete from reservation where id=(select max(id) from reservation) ";
$resulatat=mysqli_query($con,$delete);
$message='Your Reservation is Successfuly Deleted';
 
echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
$url="../indexberasmi.html";
//eli louta bech tamel redirection lel page indexberami 
echo "<script type='text/javascript'> 
    window.location = '".$url."';
    </script>";


?>