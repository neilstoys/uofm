<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc',
   'fred', 'zap');
// See the "errors" folder for details...
//PDO::ERRMODE_SILENT = default - BAD!! PDO::ERRMODE_WARNING - warns of syntax errors but is BAD!!
//Use PDO::ERRMODE_EXCEPTION for debugging
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



