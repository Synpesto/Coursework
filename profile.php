
<?php
include_once('Connection/connection_open.php');
include_once('header.php');

if (!isset($_SESSION['id'])) {
    header("location: Login/signin.php");
}


$userID = $_SESSION['id'];
$select = $conn->prepare("SELECT * FROM User WHERE id = :id ");
$select->bindParam(':id', $userID, PDO::PARAM_INT);
$select->execute();
$user = $select->fetchObject();
// var_dump($user);
if ($user) {
    echo "<h2>Profile</h2>";
    echo "<ul>";
    echo "<li>";
    echo "Name: " . $user->name . "<br>";
    echo "Email: " . $user->email . "<br>";
    echo "</li>";
    echo "</ul>";
} else {
    echo "<p>No user found.</p>";
}

