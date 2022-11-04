<?php 


$_SERVER['REQUEST_METHOD']="POST";/* khater php kaad dima yatini f request method get donc forsitou post pour connecter */
 if ($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
}

$nameh = (isset($_POST['nameh']))? $_POST['nameh']: "";
$datein = (isset($_POST['datein']))? $_POST['datein']: "";
$dateout = (isset($_POST['dateout']))? $_POST['dateout']: "";
$email = (isset($_POST['email']))? $_POST['email']: "";


$sql="select * from reservation where datein='$datein' && nameh='$nameh'";
$sql2="select * from homes where name='$nameh'";
$resultat= mysqli_query($con, $sql);
$resultat2= mysqli_query($con, $sql2);
$num=mysqli_num_rows($resultat);
$num2=mysqli_num_rows($resultat2);

if (($num>0)||($num2<1)){     
header('location:../registerno.html');
}
else {
    $insert="insert into reservation (email,datein,dateout,nameh) values('$email','$datein','$dateout','$nameh')";
    mysqli_query($con,$insert); /*to run the query*/ 
    header('location:../registerdone.html');  
    }
    
    

?>