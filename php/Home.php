<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>hola mundo</h1>

    <?php
    include "connection.php";

    $sql = "SELECT Id, UserName, Email FROM Users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["Id"] . " - Name: " . $row["UserName"] . "Email: " . $row["Email"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</body>

</html>