<?php
//reference: https://www.phptutorial.net/php-pdo


$host = 'localhost';
$db = 'DB';
$user = 'root';
$password = 'root';		//replace the password in your PC
	
$dsn = "mysql:host=$host;dbname=$db;port=8080;charset=UTF8";

try {
	$conn = new PDO($dsn, $user, $password);
	if ($conn) {
		//  echo "Connected to the $db database successfully!";
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>