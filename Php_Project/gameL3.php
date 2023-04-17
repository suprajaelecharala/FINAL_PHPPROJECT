<?php
if(!isset($_POST['send']))
{
    session_start();
    
    require("RandomNumbers.php");
    ?>
    <?php 
    
    $numberOfLives = isset($_POST["numberOfLives"]) ? $_POST["numberOfLives"] - 1 : 6;
    if($numberOfLives<=0)
    {
        echo "No more life to play this game !!!";
        echo "<a href='../../homepage/homepage.php'>Go To Home page</a>";
    }
    else
    {
        echo<<<_END
        <html>
            <head>
            <title><h1><b><i>LEVEL3 OF GAME</i></b><h1></title>
            <link rel="stylesheet" type="text/css" href="style.css">
                <style>
                    .body{
                        text-align:center;
                    }
                    #game{
                        color:crimson;
                    }
                </style>
            </head>
            <body>
            <h1 id='game'>This is Game Level 3</h1> 
            <h1>Random Generated Letters  : 
        _END;
        ?>
        <?php
            function generateRandomString()
            {
                $letters = range(1, 100);
                shuffle($letters);
                $set = array_slice($letters, 0, 6);
                return $set;
            }
            
            $randomString = generateRandomString();
            
            for($i = 0; $i < count($randomString); $i++) {
                echo $randomString[$i] . " ";
            }
            
            echo "</h1>";
            
        ?>  
                </h1>
                <form method="post" action="gameL3.php">
                    <h1>Arrange the Numbers in Ascending Order :
                    <input type="hidden" name="randomString[]" value="<?php echo $randomString[0] ?>" /> 
                    <input type="hidden" name="randomString[]" value="<?php echo $randomString[1]?>" />
                    <input type="hidden" name="randomString[]" value="<?php echo $randomString[2]?>" />
                    <input type="hidden" name="randomString[]" value="<?php echo $randomString[3] ?>" />
                    <input type="hidden" name="randomString[]" value="<?php echo $randomString[4] ?>" />
                    <input type="hidden" name="randomString[]" value="<?php echo $randomString[5] ?>" />
                    
                    <input type="text" name="userInput"><br><br>
                    <input type="submit" name="send" value="SEND IT" style="color:white;background-color: crimson;width:200px;height:40px;font-size:20px" required="required"/>
                </form>
                </h1>
                </body>
            </html>
        <?php
    }
}
else
{   
     function generateRandomString()
{
    $letters = range('a', 'z');
    shuffle($letters);
    $set = array_slice($letters, 0, 6);
    return $set;
}

$randomString = generateRandomString();

for($i = 0; $i < count($randomString); $i++) {
    echo $randomString[$i] . " ";
}

echo "</h1>";

    $randomString=$_POST['randomString'];


    for($i=0;$i<count($randomString);$i++)
    {
        echo $randomString[$i]."    ";
    }

    echo "<br>";
    $input_letters=$_POST['userInput'];
    $input_letters = explode(',', $input_letters);

    for($i=0;$i<count($input_letters);$i++)
    {
        echo $input_letters[$i]."    ";
    }
    echo "<br>";
    function isNumbersInAscOrder($randomNumber,$input_numbers)
    {
     sort($randomNumber);
     if($randomNumber===$input_numbers)
      {
         return  true;
      }
       else
        return false;
     }   
     function isnumbers($randomString,$input_letters)
      { 
       sort($randomString);
        if($randomString===$input_letters)
         {
            return true;
           }
      else
       {
           return false;
       }
     }
    if(isnumbers($randomString,$input_letters))
    {
          

        echo "<h1>Congratulations You have completed Level 1";
        echo "<a href='home.php'>Go Back To Login Page</a>";
        echo "<a href='gameL4.php'>Go To Next Level</a>";
    }
    else
    {
         

        
    
       $numberOfLives = 6;
        $numberOfLives=$numberOfLives-1;
        echo "Number of lives : ".$numberOfLives;
        

        if($numberOfLives==0)
        {
            echo "Now You dont't have more life to play this game !!!";

            

            echo "<a href='home.php'>Go to home page</a>";
        }

        echo "<h1>Failed";
        echo "<a href='home.php'>Go Back To Login Page</a>";
    }
}
    echo "<br>";

?>