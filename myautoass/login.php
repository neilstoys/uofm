<?php
    require_once "../pdo.php";

    global $message;
    // p' OR '1' = '1



    if ( isset($_POST['who']) && isset($_POST['pass'])  ) {
        echo("<p>Handling POST data...</p>\n");
        $who = htmlentities($_POST['who']);
        $pass = htmlentities($_POST['pass']);

        if (!filter_var($who, FILTER_VALIDATE_EMAIL)) {
            $message = "<p style=color:red;>Email address '".$who."' is considered invalid.\n"."</p>";
        }



        $sql = "SELECT email FROM users 
            WHERE email = :em AND password = :pw";

        //echo "<p>$sql</p>\n";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':em' => $who,
            ':pw' => $pass));
        //See if there is a row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //If no row then it is false
        //var_dump($row);
       if ( $row === FALSE ) {
           if(empty($_POST['who'])== true){
               $message = "<p style=color:red;>Enter your name</p>";
           }
           if(empty($_POST['pass']) == true){
               $message = "<p style=color:red;>Incorrect password</p>";
           }
       } else {
           //Send 'email' as a POST to autos.php
           header("Location: autos.php?who=".urlencode($_POST['who']));
               exit;

       }
    }
if(isset($_POST['pass']))
    {
        $message = "<p style=color:red;>Incorrect password</p>";
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Neil Robert Mutch 98afdcc1 </title>

</head>
<body>
<p>Please Log In</p>
<form method="post">
<p><label for='who'>Who:
<input type="text" size="40" name="who"</p></label>

<p><label for='pass'>Password:
<input type="text" size="40" name="pass"</p></label>
    <p>
        <?php echo $message; ?>
    </p>
    <button type="submit" value="Log In">Log In</button>
<a href="<?php echo($_SERVER['PHP_SELF']);?>">Refresh</a></p>
</form>
<a href="login.php">Please Log In</a>
<p>
</body>
</html>