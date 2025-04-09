<?php

if ($_SERVER['USER']== 's2195150') {
    $servername = "localhost";
    $username = "x2195150";
    $password = "Wessel09092007";
    $dbname = "admin_crud";
} else {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud challenge";
}


$conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);