<?php
if (!isset($_POST['send'])) {
    session_start();

    require("RandomLetters.php");
    $numberOfLives = isset($_POST["numberOfLives"]) ? $_POST["numberOfLives"] - 1 : 6;
    if ($numberOfLives <= 0) {
        echo "No more lives to play!!!";
        echo "<a href='../../homepage/homepage.php'>Go Back To Home page</a>";
    } else {
        function generateRandomString()
        {
            $letters = range('a', 'z');
            shuffle($letters);
            $set = array_slice($letters, 0, 6);
            return $set;
        }

        $randomString = generateRandomString();

        echo <<< _END
        <html>
            <head>
                <title><h1><b><i>LEVEL5 OF GAME</i></b><h1></title>
                <style>
                    .body {
                        text-align: center;
                    }
                    #L1 {
                        color: yellow;
                        border: 10px solid green;
                        background-color: coral;
                    }
                </style>
            </head>
            <body>
                <h1 id='L1'> Game Level 5</h1>
                <h1>Random Generated Letters : 
_END;
        for ($i = 0; $i < count($randomString); $i++) {
            echo $randomString[$i] . " ";
        }

        echo "</h1>";

        ?>
        <form method="post" action="gameL5.php">
            <h1>Write the first and last letters in <b>Ascending Order</b> :</h1>
            <input type="hidden" name="randomString[]" value="<?php echo $randomString[0] ?>" />
            <input type="hidden" name="randomString[]" value="<?php echo $randomString[1] ?>" />
            <input type="hidden" name="randomString[]" value="<?php echo $randomString[2] ?>" />
            <input type="hidden" name="randomString[]" value="<?php echo $randomString[3] ?>" />
            <input type="hidden" name="randomString[]" value="<?php echo $randomString[4] ?>" />
            <input type="hidden" name="randomString[]" value="<?php echo $randomString[5] ?>" />

            <input type="text" name="firstLetter" placeholder="First Letter" required="required">
            <input type="text" name="lastLetter" placeholder="Last Letter" required="required"><br><br>
            <input type="submit" name="send" value="SEND IT" style="color:Grey;background-color: blue;width:200px;height:40px;font-size:20px" />
        </form>
        </h1>
    </body>
</html>
<?php
}
} else {
    $randomString = $_POST['randomString'];
    $firstLetter = $_POST['firstLetter'];
    $lastLetter = $_POST['lastLetter'];

    function isFirstAndLastOfSet($randomString, $fLetter, $lLetter)
    {
        sort($randomString);
        $first = $randomString[0];
        $last = end($randomString);

        return (($fLetter == $first) && ($last == $lLetter)) ? true : false;
    }

    if (isFirstAndLastOfSet($randomString, $firstLetter, $lastLetter)) {
        

    echo "<h1>Successfully You Completed Level 5";
    echo "<br>";
    echo "<br>";
    echo "<a href='home.php'>Go Back To Login Page</a>";
    echo "<br>";
    echo "<br>";
    echo "<a href='gameL6.php'>Go To Next Level</a>";
}

    else
    {
        $numberOfLives = 6;
        $numberOfLives=$numberOfLives-1;
        echo "Number of lives : ".$numberOfLives;
        

        if($numberOfLives==0)
        {
            echo "No more life to play!!!";

            

            echo "<a href='home.php'>Go to home page</a>";
        }

        echo "<h1>Failed";
        echo "<a href='home.php'>Go Back To Login Page</a>";   

        
    }
       
    }
    echo "<br>";

?>