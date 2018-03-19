<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestmed";
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
#$db->exec('PRAGMA foreign_keys = ON;'); //Activa la integridad referencial para esta conexión

?>

<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="messages.js"></script>
<link rel="stylesheet" type="text/css" href="style.css"">