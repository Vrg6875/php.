
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<?php 
include '5.php';
 ?>



<!--part1-->
<form action="/vicky/31_delete.php" method="post" class="p-4">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required><br><br>

  <label for="email">Email:</label>
  <input type="text" id="email" name="email" required><br><br>

  <label for="desc">Description:</label>
  <input type="text" id="desc" name="desc" required><br><br>

  <label for="desc">District:</label>
  <input type="text" id="desc" name="district" required><br><br>


  <button type="submit" class="btn btn-primary">Submit</button>
  <div id="successMessage" style="display:none; margin-top: 20px;" class="alert alert-success">
    Your message has been sent successfully!
</div>
</form>






<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];
    $district = $_POST['district'];
    


    //database connectivity
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "contact";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Not connected to database: " . mysqli_connect_error());
    } else {
        echo "Connected to database successfully<br>";
    }




    // Insert query
    $sql = "INSERT INTO contactus (name, email, des, district) VALUES ('$name', '$email', '$desc', '$district')";
    $insertResult = mysqli_query($conn, $sql);

    if ($insertResult) {
        echo "Data inserted successfully.<br>";
    } else {
        echo "Data insertion failed: " . mysqli_error($conn);
    }


    // // Update query
    // $sql = "UPDATE contactus SET name='rajani' WHERE name='raju'";
    // $updateResult = mysqli_query($conn, $sql);

    // if ($updateResult) {
    //     echo "Data updated successfully.<br>";
    // } else {
    //     echo "Data updated failed: " . mysqli_error($conn);
    // }

    // $aff=mysqli_affected_rows($conn);
    // echo"total updated affted rows are $aff<br>";




    // // delete query
    // $sql = "DELETE  FROM contactus WHERE name='rajani'";
    // $deleteResult = mysqli_query($conn, $sql);

    // if ($deleteResult) {
    //     echo "Data deleted successfully.<br>";
    // } else {
    //     echo "Data deleted failed: " . mysqli_error($conn);
    // }

    // $affec=mysqli_affected_rows($conn);
    // echo"total delete affted rows are $affec<br>";

    

    // Select query to display the records
    $sql = "SELECT * FROM contactus";
    $selectResult = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($selectResult); // Get the number of selected rows
    echo"total number of record$num"."<br>";

?>




<!-- Displaying data in an HTML table -->
<div class="container mt-5">
    <h2>Contact Records</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Description</th>
                <th>District</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($selectResult)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['des']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['district']) . "</td>";
                    echo "</tr>";
                }
            } 
            
            else {
                echo "<tr><td colspan='4'>No records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
    mysqli_close($conn);
}
?>
