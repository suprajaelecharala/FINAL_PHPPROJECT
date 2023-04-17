<?php

// Database connection
$servername = "localhost";
$username = "yourusername";
$password = "yourpassword";
$dbname = "yourdbname";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// Check if user is authenticated
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

// Get the session result information
if (isset($_POST['submit_result'])) {
  $result = $_POST['result'];
  $lives_used = $_POST['lives_used'];
  
  // Insert the result into the database
  $stmt = $conn->prepare("INSERT INTO session_results (username, result, lives_used) VALUES (:username, :result, :lives_used)");
  $stmt->bindParam(':username', $_SESSION['username']);
  $stmt->bindParam(':result', $result);
  $stmt->bindParam(':lives_used', $lives_used);
  $stmt->execute();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Game Results</title>
  <link rel="stylesheet" type="text/css" href="cssforResult.css">
</head>
<body>
  <h1>Game Results</h1>
  <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
  <form id="result-form" method="post" action="result.php">
    <label for="result">Result:</label>
    <select id="result" name="result" required>
      <option value="win">Win</option>
      <option value="fail">Fail</option>
      <option value="incomplete">Incomplete</option>
    </select>
    <br>
    <label for="lives_used">Lives Used:</label>
    <input type="number" id="lives_used" name="lives_used" required>
    <br>
    <input type="submit" value="Submit" id="submit-result" name="submit_result">
  </form>
</body>
</html>
