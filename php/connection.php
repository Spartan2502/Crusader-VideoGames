<?php 
//azure
// $host = 'prueba-yeivi.mysql.database.azure.com';
// $username = 'toor';
// $password = 'koshka_niebla1';
// $db_name = 'HolaMundo';

// //Initializes MySQLi
// $conn = mysqli_init();

// mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/DigiCertGlobalRootG2.crt.pem", NULL, NULL);

// // Establish the connection
// mysqli_real_connect($conn, $host, $username, $password  , $db_name, 3306, NULL, MYSQLI_CLIENT_SSL);

// //If connection failed, show the error
// if (mysqli_connect_errno())
// {
//     die('Failed to connect to MySQL: '.mysqli_connect_error());
// }

// 192.168.137.166:3306
// LocalHost 
$servername = "localhost";
$username = "root";
$password = "";
$password = "";
$database = "HolaMundo";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//rodo
// $servername = "localhost";
// $username = "root";
// $password = "";
// $password = "";
// $database = "HolaMundo";
// // Create connection
// $conn = new mysqli($servername, $username, $password,$database);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }


echo "Connected successfully";
?>

<!-- koshka_niebla1 -->
