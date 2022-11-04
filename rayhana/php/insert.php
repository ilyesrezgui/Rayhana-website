<?php


$user_name = (isset($_POST['username']))? $_POST['username']: "";
$user_email = (isset($_POST['useremail']))? $_POST['useremail']: "";
$user_message = (isset($_POST['user_message']))? $_POST['user_message']: "";
if(!empty($user_name)||!empty($user_email)||!empty($user_message)){
    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="test";
    //create a connection to the data base 
    $con = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()){
        die('connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
    }else{
        $insert="insert into contactus(user_name,user_email,user_message) values(?,?,?)";
        $stmt= $con->prepare ($insert);
        $stmt->bind_param("sss",$user_name,$user_email,$user_message);
        $stmt->execute(); // execute that query 
        $message='Your Message is Successfuly sent';
 
echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
$url="../contactuus.html";
//eli louta bech tamel redirection lel page indexberami 
echo "<script type='text/javascript'> 
    window.location = '".$url."';
    </script>";
        $stmt->close();
        $con->close();


    }
}else{
    echo"all fields are required";
    die();
}


?>