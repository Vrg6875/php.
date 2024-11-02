<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Website</title>
    <link rel="stylesheet" href="styles.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"></a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
     
    </div>
  </div>
</nav>






<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve email and password from POST request
    $name = $_POST['name'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];


      // Check if any field is blank
    if (empty($name) || empty($email) || empty($desc)) {
        echo "All fields are required.";
        exit; 
    }

    //connecting to database
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

//inserting data front to databse add,delete here
$sql = "INSERT INTO contactus(name,email,des)VALUES('$name','$email','$desc'
)";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "inserted data  in the database";
} else {
    echo "insert creation failed: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
}
?>








<form action="/vicky/form.php" method="post">
  <label for="email">name:</label>
  <input type="text" id="email" name="name" required>

  <label for="password">email:</label>
  <input type="text" id="password" name="email" required>

  <label for="password">desc:</label>
  <input type="text" id="password" name="desc" required>

  <button type="submit">Submit</button>
</form>






</body>
</html>
