<!DOCTYPE html>
    <head>
        <title>Neil's First Database Query</title>
    <link rel="stylesheet" type="text/css" href='uofm.css'>
    </head>
    <body>
    <h1>Neil's First Database Query</h1>


    <?php
        echo "<pre\n>";
        require_once "pdo.php";
        $stmt = $pdo->query("SELECT * FROM users");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            print_r($row);

        }
        echo "</pre\n>";

        //Draw a Table
        $stmt = $pdo->query("SELECT name, email, password FROM users");
        echo "<table class='mytable'>\n";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>";
            echo ($row["name"]);
            echo "</td><td>";
            echo ($row["email"]);
            echo "</td><td>";
            echo ($row["password"]);
            echo "</td></tr>";
        }
        echo "</table>";

    ?>
    </body>
</html>