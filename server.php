<?php
//database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "sclproject";
$connect = new mysqli($host, $username, $password, $database);

//check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
//get form data
    $fname = $_POST['firstname'];
    $email = $_POST['email'];

//insert data into database
    $sql = "INSERT INTO users (firstname, email) VALUES (?,? )";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("ss", $fname, $email);
    if ($stmt->execute()) {
        echo "New record created successfully";
        echo "<a href="index.php">Go back to home</a>";
    } else {
        echo "Error: " . $sql . " . $connect->error;
    }
    $stmt->close();
    $connect->close();



?>