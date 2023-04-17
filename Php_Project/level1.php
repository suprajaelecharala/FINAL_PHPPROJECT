<!DOCTYPE html>
<html lang="en">
<head>
    <title>Level 1: Order letters in ascending order</title>
</head>
<body>
    <?php
    // Generate a set of 6 random letters
    $letters = range('a', 'z');
    shuffle($letters);
    $set = array_slice($letters, 0, 6);

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the user's input
        $input = str_split(strtolower($_POST["input"]));
        sort($input);
        sort($set);
        // Check if all the elements are different
        if (count(array_unique($input)) < count($input)) {
            $msg = "Incorrect – All your letters are not unique.";
        } else {
            // Check if some of the elements are different
            if (count(array_intersect($input, $set)) != count($set)) {
                $msg = "Incorrect – Some of your letters are different than ours.";
            } else {
                // Check if the elements are not correctly ordered
                $set_copy = $set;
                sort($set_copy);
                if ($input != $set_copy) {
                    $msg = "Incorrect – Your letters have not been correctly ordered in ascending order.";
                } else {
                    // Input is correct
                    $msg = "Correct – Your letters have been correctly ordered in ascending order.";
                }
            }
        }

        // Show the result message and buttons
        echo "<p>$msg</p>";
        if ($msg == "Correct – Your letters have been correctly ordered in ascending order.") {
            echo "<form method='post'>";
            echo "<input type='hidden' name='lives' value='6'>";
            echo "<input type='hidden' name='level' value='2'>";
            echo "<button type='submit'>Go to the Next Level</button>";
            echo "</form>";
        } else {
            $lives = $_POST["lives"] - 1;
            if ($lives == 0) {
                echo "<p>Game Over</p>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='level' value='0'>";
                echo "<button type='submit'>Play Again</button>";
                echo "</form>";
            } else {
                echo "<p>Lives Left: $lives</p>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='lives' value='$lives'>";
                echo "<input type='hidden' name='level' value='1'>";
                echo "<label for='input'>Enter the letters in ascending order:</label>";
                echo "<input type='text' name='input'>";
                echo "<button type='submit'>Submit</button>";
                echo "</form>";
            }
        }
        echo "<form method='post'>";
        echo "<input type='hidden' name='lives' value='6'>";
        echo "<input type='hidden' name='level' value='0'>";
        echo "<button type='submit'>Stop this Session</button>";
        echo "</form>";
        echo "<form method='post'>";
        echo "<button type='submit'>Sign Out</button>";
        echo "</form>";
    } else {
        // Show the form to the user
        echo "<p>Here is your set of 6 different letters: " . implode(',', $set) . "</p>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='lives' value='s6'>";
        echo "<input type='hidden' name='level' value='1'>";
        echo "<label for='input'>Enter the letters in ascending order:</label>";
        echo "<input type='text' name='input'>";
        echo "<button type='submit'>Submit</button>";
        echo "</form>";
    }
    ?>
</body>
</html>
