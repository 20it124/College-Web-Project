<?php

//Connexting to the database
$server = "localhost";
$username = "root";
$password = "";
$database = "project";


//Create a connection
$con = mysqli_connect($server, $username, $password, $database);

// Die is connection was not successful 
if(!$con)
{
    die("Error". mysqli_connect_server());
}

?>