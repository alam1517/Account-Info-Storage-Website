<?php
/* Database credentials */
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpwd', 'root');
define('dbname', 'accountinfo');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(dbhost, dbuser, dbpwd, dbname);

// Check connection
if ($mysqli == false){
    echo "Error: could not connect to the DB. " . $mysqli->connect_error;
    exit;
}
?>