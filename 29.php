
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
<form action="/vicky/29.php" method="post" class="p-4">
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







<!--part2-->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];
    $district = $_POST['district'];

    // if (empty($name) || empty($email) || empty($desc)) {
    //     echo "All fields are required.";
    //     exit;
    // }

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
    #insert
    $sql = "INSERT INTO contactus (name, email, des,district) VALUES ('$name', '$email', '$desc','$district')";
    $insertResult = mysqli_query($conn, $sql);

    if ($insertResult) {
        echo "Data inserted successfully.<br>";
    } else {
        echo "Data insertion failed: " . mysqli_error($conn);
    }
    #select
    #custom query bhi
    $sql = "SELECT * FROM contactus where name='kutta'";
    $selectResult = mysqli_query($conn, $sql);

    if ($selectResult) {
        $num = mysqli_num_rows($selectResult);
        echo "Number of records: $num<br><br>";
    }
?>
<!--part3-->
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
                    echo "<td>" . $row['district'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
    mysqli_close($conn);
}
?>

</body>
</html>
