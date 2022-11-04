<?php 
$_SERVER['REQUEST_METHOD']="POST";/* khater php kaad dima yatini f request method get donc forsitou post pour connecter */
 if ($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
}
$user = (isset($_POST['user']))? $_POST['user']: "";
$pwd = (isset($_POST['pwd']))? $_POST['pwd']: "";


$sql="select * from registration where user='$user' && pwd='$pwd'";
$resultat= mysqli_query($con, $sql);
$num=mysqli_num_rows($resultat);
if ($num>0){     
    header('location: ../indexberasmi.php');
}else 
    {header('location: ../signin.html');    
    }
    





?>