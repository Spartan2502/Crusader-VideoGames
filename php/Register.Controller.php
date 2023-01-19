<?php
   // connect to the database
   include("connection.php");
   session_start();
   try {
  
// initializing variables
$username = "";
$email    = "";
$password = "";
$steam = "";
$epic = "";
$gog = "";
$errors = array(); 

// REGISTER USER
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // receive all input values from the form
  $username = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password']);
  $steam = mysqli_real_escape_string($conn, $_POST['steam']);
  $epic  = mysqli_real_escape_string($conn, $_POST['epic']);
  $gog = mysqli_real_escape_string($conn, $_POST['gog']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($steam)) { array_push($errors, "steam account is required"); }
  if (empty($epic)) { array_push($errors, "epic account is required"); }
  if (empty($gog)) { array_push($errors, "gog account is required"); }


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM Users WHERE UserName='$username' OR Email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
 

  if ($user) { // if user exists
    if ($user['UserName'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['Email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO Users (Id,UserName, Email, Password) 
  			  VALUES('','$username', '$email', '$password')";
  	mysqli_query($conn, $query);
 
//insert data on the database accounts
//find number of users
$users_number= "SELECT Id FROM Users where Email = '$email'";
$number_result = mysqli_query($conn, $users_number);
$row2 = $number_result->fetch_assoc();
$id2 = $row2["Id"];
echo $id2;
//insert
    $query2 = "INSERT INTO accounts  (id, steam, epic, gog, user) 
    VALUES('','$steam', '$epic', '$gog', '$id2')";
mysqli_query($conn, $query2);


  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    $conn->close();
  	header('location: Home.php');
  }
  else {
	header('location: Login.php');
  }

}
} catch (Exception $e) {
  echo $e->getMessage();
  die();
}

?>