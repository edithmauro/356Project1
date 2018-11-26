<?php
//variables for host, username, password, and database
$servername = "localhost";
$username = "emauro";
$password = "Converse<3";
$dbname = "Project1";


$conn = new mysqli($servername, $username, $password, $dbname); 
/*variable for connection: host, username, passowrd, database name, port, socket*/

//if the connection fails, an error will appear
if ($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}

?>