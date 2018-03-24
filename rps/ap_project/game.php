
<!--Source code of game.php-->
<!DOCTYPE html>
<html>
    <head>
        <title>Anuj Pant's Rock Paper Scissors</title>
    </head>
    <body>
    <p>
        <?php
            if(!isset($_GET['name']))
            {
                echo "Name paramter is missing";
                exit(0);
            }
            else
            {
                echo "<h1>Rock Paper Scissors\n</h1>";
                echo"Welcome: ";
                $v=$_GET['name'];
                    echo $v;
            }
                ?>
    </p>
        <form method="post">
            <select name="move">
                <option value="Select" selected>Select</option>
                <option value="Rock">Rock</option>
                <option value="Paper">Paper</option>
                <option value="Scissors">Scissors</option>
                <option value="Test">Test</option>
            </select>
            <input type="submit" value="Play" name="submit"></input>
            <input type="submit" value="Logout" name="logout" ></input>
        </form>
        <pre>
            <?php
                $names=Array("Rock","Paper","Scissors");
                if(isset($_POST['logout']))
                {
                    header("Location: index.php");
                    exit(0);
                }
                if(isset($_POST['move']))
                {
                    $val=$_POST['move'];
                    if($val=="Test")
                    {
                        for($c=0;$c<3;$c++) {
                            for($h=0;$h<3;$h++) {
                                $r = check($names[$c], $names[$h]);
                                echo ("<div style='background-color: lightgrey; padding= 8em;'>     Human=$names[$h] Computer=$names[$c] Result=$r\n</div>");
                            }
                        }
                    }
                    elseif($val=="Select")
                    {
                        echo "<div style='background-color: lightgrey'>  Please select a strategy and press Play.</div>";
                    }
                    else
                    {
                        $rnd=$names[array_rand($names)];
                        $value=check($rnd,$val);
                        echo "<div style='background-color: lightgrey'> Your Play= $val Computer Play=$rnd Result=$value </div>";
                    }
                }
                else
                {
                    echo "  Please select a strategy and press Play.";
                }
                function check($com, $hum)
                {
                    if($com==$hum)
                        return "Tie";
                    elseif(($hum=="Paper" && $com=="Rock") || ($hum=="Scissors" && $com=="Paper") || ($hum=="Rock" && $com=="Scissors") )
                        return "You Win";
                    else
                        return "You Lose";
                }

            ?>
        </pre>
    </body>
</html>

