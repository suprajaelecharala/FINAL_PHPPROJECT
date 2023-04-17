<?php
session_start();
include('dbconnection.php');

// connect to database
$conn = mysqli_connect("localhost", "root", "", "phpproject");

// check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['login_submit'])){
  
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  // prepare and execute query
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  
  // check if username and password match
  if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $username;
      header("Location: gameL1.php");
      exit();
    } else {
      $error_message = "Sorry, you entered a wrong password!";
    }
  } else {
    $error_message = "Sorry, this username doesn't exist!";
  }
}

if(isset($_POST['signup_submit'])){
  
  header("Location:registration.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="cssforlogin.css">
</head>
<body>
<?php if(isset($error_message)): ?>
  <p><?php echo $error_message; ?></p>
  <a href="Modification.php">Forgotten? Please, change your password.</a>
<?php endif; ?>
<form id="login-form" method="post" action="login.php">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>
  <br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>
  <br>
  <input type="submit" value="Connect" id="login-submit" name="login_submit">
  <input type="submit" value="Sign-Up" id="signup-submit" name="signup_submit">
</form>

<?php include('registration.php'); ?>

</body>
</html>
