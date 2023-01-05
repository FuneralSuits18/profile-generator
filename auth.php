<?php

$dbServaerName = 'localhost';
$dbUserName = 'root';
$dbPassword = '';
$dbName = 'website';

$conn = mysqli_connect($dbServaerName, $dbUserName, $dbPassword, $dbName);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }