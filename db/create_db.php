<?php

$conn = mysqli_connect("localhost", "root", "");

if ($conn === false) die("ERROR: could not connect to localhost phpmyadmin. " . mysqli_connect_error());

$sql = "CREATE DATABASE crud1";

if (mysqli_query($conn, $sql)) echo "Succesfully created database";
else die("ERROR: could not create database. " . mysqli_error($conn));

?>