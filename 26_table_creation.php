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
$sql = "CREATE TABLE  student (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    rollno varchar(50) unique
)";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Table 'student' created in the database";
} else {
    echo "Table creation failed: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
