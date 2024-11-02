<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve name, email, and description from POST request
    $name = $_POST['name'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];

    // Check if any field is blank
    if (empty($name) || empty($email) || empty($desc)) {
        echo "All fields are required.";
        exit;
    }

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "contact";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Not connected to database: " . mysqli_connect_error());
    } else {
        echo "Connected to database successfully";
    }

    echo "<br>";

    // SQL query to select all records from the `contactus` table
    $sql = "SELECT * FROM `contactus`";
    $result = mysqli_query($conn, $sql);

   
        
        $num = mysqli_num_rows($result);
        echo "Number of records: " . $num . "<br>";

        // if ($num>0){
        //     $row=mysqli_fetch_assoc($result);
        //     echo var_dump($row);
        // }
        echo"<br>";
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Name: " . $row['name'] . ", Email: " . $row['email'] . ", Description: " . $row['des'] . "<br>";
            }
        }
    // Close the connection
    mysqli_close($conn);
}
?>
