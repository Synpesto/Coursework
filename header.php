<style>
        body {
            background-color: #f4f4f4;
            color: #333;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #3d9970;
        }

        /* Header styles */
        .header {
            background-color: #3d9970;
            color: #fff;
            padding: 10px;
        }

        .header h2 {
            margin: 0;
        }

        /* Main content styles */
        .content {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
<?php 
    session_start();
    include_once('Connection/connection_open.php');
?>
<?php
    if ($_SESSION["id"]) {
        // echo "Logged in as " . $_SESSION["id"];
        $id = $_SESSION["id"];
    } else {
        header("Location: Login/signin.php");
    }
    $sql = "SELECT email FROM User WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $email = $stmt->fetchColumn();
    $id = isset($_SESSION["id"]) ? $_SESSION["id"] : null;
?>
<div>
        <p>Logged in as <?=$email?> (ID: <?=$id?>)</p>
        <a href="index.php">Home page</a>
        <!-- <a href="members.php">Members</a> -->
        <a href="modules.php">Modules</a>
        <a href="Login/signout.php">Log out</a>
        <a href="profile.php">Profile</a>
</div>
