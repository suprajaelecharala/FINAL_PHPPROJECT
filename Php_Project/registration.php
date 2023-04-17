<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="cssforRegistration.css">
</head>
<body>
<?php
// Database connection
include('dbconnection.php');

if(isset($_POST['create_submit'])){
  
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  
  // generate random id
  $id = mt_rand(1, 999);
  
  // check if username already exists
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows === 0) {
    
    if ($password === $confirm_password) {
    
      if (!empty($first_name) && !empty($last_name) && !preg_match('/^\d/', $first_name) && !preg_match('/^\d/', $last_name)) {
        
        $stmt = $conn->prepare("INSERT INTO users (id, username, password, first_name, last_name) VALUES (?, ?, ?, ?, ?)");
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("issss", $id, $username, $hashed_password, $first_name, $last_name);
        $stmt->execute();
        
        header("Location:Login.php");
        exit();
      } else {
        
        $error_message = "Sorry, your first name or last name is invalid!";
      }
    } else {
      
      $error_message = "Sorry, you entered 2 different passwords!";
    }
  } else {
    
    $error_message = "Sorry, this username already exists. Please, choose another one.";
  }
}

if(isset($_POST['sisubmit'])){
 
  header("Location:Login.php");
  exit();
}
?>


<form id="registration-form" method="post" action="registration.php">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>
  <br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>
  <br>
  <label for="confirm_password">Confirm Password:</label>
  <input type="password" id="confirm_password" name="confirm_password" required>
  <br>
  <label for="first_name">First Name:</label>
  <input type="text" id="first_name" name="first_name" required>
  <br>
  <label for="last_name">Last Name:</label>
  <input type="text" id="last_name" name="last_name" required>
  <br>
  <input type="submit" value="Create" id="create-submit" name="create_submit">
  <input type="submit" value="Sign-In" id="sisubmit" name="sisubmit">
</form>
</body>
</html>
