<?php
$servername = "localhost";  // or your server address
$username = "root";
$password = "";
$database = "dbvicky";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Not connected to database: " . mysqli_connect_error());
} else {
    echo "Connected to database successfully";
}

echo "<br>";

// Create table
$sql = "INSERT INTO student(name,email,rollno)VALUES('vicky','vrg@gmail.com',2003281
)";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "inserted 'student' created in the database";
} else {
    echo "insert creation failed: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
