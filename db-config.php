<?php 
    // local config
    $servername = "localhost";
    $username = "root";
    $password = "";
	$dbname = "cms";

    $user = 'root';
	$pass = '';
	$pdo = new PDO('mysql:host=localhost;dbname=cms;charset=utf8', $user, $pass);

	$conn = new mysqli($servername, $username, $password, $dbname);

    if (mysqli_connect_errno() === 0)
        $conn -> query("SET NAMES 'utf8'");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } 	
	
	
?>