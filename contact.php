<?php
//database connection
$server = "localhost";
$username = "root";
$password = "";
$database = "sclproject";
$conn =  new mysqli($server, $username, $password, $database);
//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//logic to handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['firstname'];
    $email = $_POST['email'];


    $sql = "INSERT INTO users (firstname, email) VALUES ('$fname', '$email')";

    if($conn->query($sql) === TRUE) {
        echo "<p>New record created successfully</p>";
    } else {
        echo "Error : " . $sql . "<br>" . $conn->error;
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="server.php">
        <label for="">FIRST NAME</label>
        <input type="text" name="firstname" required>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" required>
        <br>
        <input type="submit" value="Submit">
        
    </form>
</body>
</html>