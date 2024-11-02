<?php
$servername = "localhost";  // or your server address
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

echo"<br>";



//create db
$sql="CREATE DATABASE dbvicky1";
$result=mysqli_query($conn,$sql);
 if ($result){
    echo"connected database";

 }
 else{
    echo"failed<br>".mysqli_error($conn);
 }

?>




