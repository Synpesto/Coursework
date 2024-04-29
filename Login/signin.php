<?php
include_once('../Connection/connection_open.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Your Website</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .container h2 {
            margin-top: 0;
            font-size: 24px;
            text-align: center;
        }
        .container form {
            display: flex;
            flex-direction: column;
        }
        .container label {
            margin-bottom: 5px;
        }
        .container input[type="text"],
        .container input[type="password"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .container input[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .container .signup-link {
            text-align: center;
            margin-top: 10px;
        }
        .container .signup-link a {
            color: #4CAF50;
            text-decoration: none;
            transition: color 0.3s;
        }
        .container .signup-link a:hover {
            color: #45a049;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Login Page</h1>
    </div>
    <div class="container">
        <h2>Login</h2>
        <form method="POST">
            <label for="email">Email:</label>
            <input type="text" id="email" name="txt_email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="txt_pass" required>

            <input type="submit" value="Login" name="btn_submit">

            <div class="signup-link">
                <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
            </div>
            <div class="signup-link">
                <p>Forgot your password? <a href="forget_password.php">Reset password</a></p>
        </form>
    </div>

    <div class="result">
        <?php
        if (isset($_POST['btn_submit'])) {
            $email = $_POST["txt_email"];
            $txt_pass = $_POST["txt_pass"];

            // Use prepared statement to prevent SQL injection
            $sql = "SELECT password, username, id FROM User WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $record = $stmt->fetchObject();

            if (password_verify($txt_pass, $record->password)) {
                echo "You logged in successfully";
                // Set session variable to indicate login status
                $_SESSION["id"] = $record->id;
                var_dump($_SESSION);
                header("Location: ../index.php");
            } else {
                echo "Wrong password";
            }
        }
        ?>
    </div>
</body>
</html>

<?php include_once('../Connection/connection_close.php'); ?>
