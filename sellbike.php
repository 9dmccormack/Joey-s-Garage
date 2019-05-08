<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
        //Load info from form
        $file = $_POST['file'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['$description'];
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
        $sql = "INSERT INTO bikes (file, name, price, description) VALUES ('$file', '$name', '$price', '$description')";
        if ($conn->query($sql) === true) {
            echo "Bike registered!";
            echo "$sql";
            echo "<a href=\"Index.html\" onclick=\"location.reload()\">Go back to home page</a>";
        } else {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
            echo "Not enough Information";
            echo "<br>";
            echo "$sql";
            echo "<br>";
            echo "<a href=\"sellbike.html\" onclick=\"location.reload()\">Sell More</a>";
        }
        $conn->close();
        ?>
    </body>
</html>
