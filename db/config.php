<?php
const HOSTNAME = "localhost";
const USERNAME = "root";
const PASSWORD = "";
const DB       = "crud1";

$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DB);

if ($conn === false) die("ERROR: could not connect to db.". mysqli_connect_error());

?>