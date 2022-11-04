<?php
     $host="localhost";
     $dbUsername="root";
     $dbPassword="";
 $dbname="test";
    //create a connection to the data base 
   $con = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
     if (mysqli_connect_error()){
    die('connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
	
?>
