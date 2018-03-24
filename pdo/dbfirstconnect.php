<?php
echo "<pre>\n";
//Connection string (localhost means on the same server) db, db port, dbname, dbuser, dbpassword
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc',
    'fred', 'zap');

$stmt = $pdo->query("SELECT * FROM users");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);

echo "</pre>\n";
