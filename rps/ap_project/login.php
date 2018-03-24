
<!DOCTYPE html>
<html>
<head>
    <title>
        Anuj Pant's Login Screen
    </title>
</head>
<body>
    <p>
        <h1>
            Please Log In
        </h1>
            <form action="login.php" method="post">
                    Username: <input type="text" name="who" placeholder="Name" ><br>
                    Password: <input type="password" name="pass" placeholder="Password"><br>
                    <input type="submit" name="login" value="Log In" ></input> <input type="submit"  name="cancel" value="Cancel" >
            </form>
            <p>For a password hint, view source and find a password hint in the HTML comments.</p>
    </p>
    <?php
        if(isset($_POST['cancel']))
        {
            header("Location: index.php");
            exit(0);
        }
        if(!isset($_POST['who']) || !isset($_POST['pass']))
            echo "<p style=color:red;>Username and password are required"."</p>";
        else
        {
            if($_POST['pass']=="php123")
            {
                $name=$_POST['who'];
                header("Location: game.php/?name=$name");
            }
            else
            {
                echo "<p style=color:red;>Incorrect password"."</p>";
            }
        }
     ?>
</body>
</html>

