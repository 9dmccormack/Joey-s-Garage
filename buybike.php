<?php
//Load info from form
$name = $_POST['name'];
$price = $_POST['price'];
$conn;
//Login Information
$usr = 'mrflemin_theflem';
$pw = '**************';
$db = 'mrflemin_parking';
// Create connection
if (strlen($name) > 0 and strlen($price) > 0) {
    $conn = new mysqli('localhost', $usr, $pw, $db);
}
// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
$sql = "INSERT INTO name (number, price) VALUES ('$name', '$price')";
if ($conn->query($sql) === true) {
    echo "Your Bike is ready to buy!";
    echo "<a href=\"Index.html\" onclick=\"location.reload()\">Go back to home page</a>";
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}
$conn->close();
?>
