<?php 
$_SERVER['REQUEST_METHOD']="POST";/* khater php kaad dima yatini f request method get donc forsitou post pour connecter */
if ($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php' ;
}
$user = (isset($_POST['user']))? $_POST['user']: "";
$pwd = (isset($_POST['pwd']))? $_POST['pwd']: "";
$email = (isset($_POST['email']))? $_POST['email']: "";

$sql="select * from registration where email='$email'";
$resultat= mysqli_query($con, $sql);
$num=mysqli_num_rows($resultat);
if ($num>0){
    header('location: ../signup.html');  

    }else 
    {
        $insert="insert into registration (user,pwd,email) values('$user','$pwd','$email')";
        mysqli_query($con,$insert); /*to run the query*/
        header('location: ../signin.html'); 
        
    }
    





?>