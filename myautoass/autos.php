<?php
require_once "../pdo.php";

    // Demand a GET parameter
    if(!isset($_GET['who']))
    {
        echo "Name paramter is missing";
        exit(0);
    }

    if(isset($_POST['logout']))
    {
        header("Location: index.php");
        exit(0);
    }

    if ( isset($_POST['make']) && isset($_POST['year'])
        && isset($_POST['mileage'])) {

        //bits start here
        if (empty($_POST['make'])) {
            echo "<p style=color:red;>Car make is required.\n" . "</p>";
        }
//$carYear = $_POST['year'];
        $carYear = $_POST['year'];
        if (is_numeric($carYear)) {
            try {
                $sql = "INSERT INTO autos (make, year, mileage) VALUES (:make, :year, :mileage)";
                //echo("<pre>\n" . $sql . "\n</pre>\n");
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                    ':make' => $_POST['make'],
                    ':year' => $_POST['year'],
                    ':mileage' => $_POST['mileage']));
            } catch (Exception $ex) {
                echo("Internal error, please contact support");
                error_log("error4.php, SQL error=" . $ex->getMessage());
                return;
            }
        } else {
            echo "<p style=color:red;>Year needs to be numeric.\n"."</p>";
        }
    }

$stmt = $pdo->query("SELECT make, year, mileage FROM autos");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Neil Robert Mutch 98afdcc1 </title>

    </head>
    <body>
        <div class="container">
            <h1>AUTOMOTIVE NRM</h1>
            <?php
            //'email' is brought in from login.php
                if ( isset($_REQUEST['who']) ) {
                    echo "<p>Welcome: ";
                    echo htmlentities($_REQUEST['who']);
                    echo "</p>\n";
                }
            ?>
            <!-- Table of mySQL data -->
            <table border="1">
                <?php
                foreach ( $rows as $row ) {
                    echo "<tr><td>";
                    echo($row['make']);
                    echo("</td><td>");
                    echo($row['year']);
                    echo("</td><td>");
                    echo($row['mileage']);
                    echo("</td></tr>\n");
                }
                ?>
            </table>
            <form method="post">
                <p>Make:
                    <input type="text" size="40" name="make"></p>
                <p>Year:
                    <input type="text" size="40" name="year"></p>
                <p>mileage:
                    <input type="text" size="40" name="mileage"></p>
                <button type="submit" name="Add" value="Add">Add</button>
                <button type="submit" name="logout" value="Logout">Log Out</button>
            </form>


        </div>
    </body>
</html>
