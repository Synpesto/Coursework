<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="styles.css">
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form submission
    $email = $_POST['email'];
    
    // Perform password reset logic here
    
    // Display success message
    echo '<div class="result success">Password reset email sent!</div>';
}
?>

<body>
    <div class="container">
        <h2>Reset Password</h2>
        <form method="post" action="reset_password.php">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Reset Password">
            </div>
            <div class="form-group">
                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            </div>
            <div class="form-group">
                <p>Remembered it? <a href="signin.php">Sign in</a></p>
            </div>
        </form>
    </div>
</body>
</html>