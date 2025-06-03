<?php
$host = 'localhost';
$username = 'root';
$password = '12345678';
$database = 'malang_tangguh';

global $conn;
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}