<?php
require_once "config.php";

$sql = "CREATE TABLE Clients (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name varchar(255),
    Email varchar(255),
    Phone varchar(255),
    Address varchar(255),
    CreatedAt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) echo "Succesfully created table";
else echo "ERROR: could not create table";

?>