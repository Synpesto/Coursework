<?php
include_once('Connection/connection_open.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
</head>
<?php include('header.php'); ?>
<?php
// Fetch members from the database
$sql = "SELECT * FROM User";
$result = $conn->query($sql);

// Check if there are any members
if ($result && $result->rowCount() > 0) {
    echo "<h2>Members List</h2>";
    echo "<ul>";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<li>";
        echo "<a href='MyAccount.php?id=" . $row["userID"] . "'>" . $row["userID"] . "</a><br>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No members found.</p>";
}
?>
