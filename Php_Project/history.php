<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location:home.php");
    exit();
}

// Connect to database
require_once('db_connection.php');
$db = db_connect();

// Get player ID
$player_id = $_SESSION['id'];

// Get game results for player from database
$query = "SELECT * FROM game_results WHERE player_id='$player_id'";
$result = mysqli_query($db, $query);

// Check if query was successful
if(!$result) {
    die("Query Failed: " . mysqli_error($db));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game Results</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th {
            background-color: #4CAF50;
            color: white;
            text-align: left;
            padding: 8px;
        }

        td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Game Results for <?= $_SESSION['username'] ?></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Level</th>
        <th>Result</th>
        <th>Lives Used</th>
        <th>Date and Time</th>
    </tr>
    <?php if (mysqli_num_rows($result) > 0) { ?>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['level'] ?></td>
                <td><?= $row['result'] ?></td>
                <td><?= $row['lives_used'] ?></td>
                <td><?= $row['date_time'] ?></td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan='5'>No game results found.</td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
