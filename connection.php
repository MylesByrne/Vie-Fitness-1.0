<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "vie_fitness";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    die("failed to connect!");
}

