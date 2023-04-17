<!DOCTYPE html>
<html lang="en">
<head>
    <title>Modification Form</title>
    <link rel="stylesheet" type="text/css" href="cssforModification.css">
</head>
<body>
<?php
if(isset($_POST['modify_submit'])){
  $existing_username = $_POST['existing_username'];
  $new_password = $_POST['new_password'];
  $confirm_new_password = $_POST['confirm_new_password'];
  
  
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->bind_param("s", $existing_username);
  $stmt->execute();
  $result = $stmt->get_result();
  
  
  if ($result->num_rows === 1) {
    
    if ($new_password === $confirm_new_password) {
      
      $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
      $stmt->bind_param("ss", $new_password, $existing_username);
      $stmt->execute();
      
      
      header("Location:Login.php");
      exit();
    } else {
      
      $error_message = "Sorry, you entered 2 different passwords!";
    }
  } else {
    
    $error_message = "Sorry, the username doesn't exist. Please, try again.";
  }
}

if(isset($_POST['sisubmit'])){

  header("Location:Login.php");
  exit();
}
?>


<?php if(isset($error_message)): ?>
  <p><?php echo $error_message; ?></p>
<?php endif; ?>
<form id="password-modification-form" method="post" action="Modification.php">
  <label for="existing_username">Existing Username:</label>
  <input type="text" id="existing_username" name="existing_username" required>
  <br>
  <label for="new_password">New Password:</label>
  <input type="password" id="new_password" name="new_password" required>
  <br>
  <label for="confirm_new_password">Confirm New Password:</label>
  <input type="password" id="confirm_new_password" name="confirm_new_password" required>
  <br>
  <input type="submit" value="Modify" id="modify-submit" name="modify_submit">
  <input type="submit" value="Sign-In" id="sisubmit" name="sisubmit">
</form>

</body>
</html>