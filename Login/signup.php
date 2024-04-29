<?php
include_once "../Connection/connection_open.php";

if (isset($_SESSION['username'])) {
    header("location: " . APPURL . " ");
    exit; // Added to prevent further execution
}

if (isset($_POST['submit'])) {
    // Check for empty fields
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password2'])) {
        echo "<script> alert('One or more inputs are empty');</script>";
    } elseif ($_POST['password'] !== $_POST['password2']) {
        echo "<script> alert('Passwords do not match');</script>";
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $about = isset($_POST['about']) ? $_POST['about'] : '';
        $avatar = $_FILES['avatar']['name'];
        $avatar_tmp = $_FILES['avatar']['tmp_name']; // Added temp location of file

        // Move uploaded file to permanent location
        // $dir = "avatar/" . basename($avatar);
        // if (move_uploaded_file($avatar_tmp, $dir)) {
            $insert = $conn->prepare("INSERT INTO User (name, email, username, password, about, avatar) VALUES(:name, :email, :username, :password, :about, :avatar)");
            $insert->execute([
                ":name" => $name,
                ":email" => $email,
                ":username" => $username,
                ":password" => $password,
                ":about" => $about,
                ":avatar" => $avatar,
            ]);
            header("location: signin.php");
            exit; // Added to prevent further execution
        // } else {
        //     echo "<script> alert('Error uploading file');</script>";
        }
    }
?>


<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="main-col">
				<div class="block">
					<h1 class="pull-left">Register</h1>
					<h4 class="pull-right">A Simple Forum</h4>
					<div class="clearfix"></div>
					<hr>
					<form role="form" enctype="multipart/form-data" method="post" action="signup.php">
						<div class="form-group">
							<label>Name*</label> <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
						</div>
						<div class="form-group">
							<label>Email Address*</label> <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address">
						</div>
						<div class="form-group">
							<label>Choose Username*</label> <input type="text" class="form-control" name="username" placeholder="Create A Username">
						</div>
						<div class="form-group">
							<label>Password*</label> <input type="password" class="form-control" name="password" placeholder="Enter A Password">
						</div>
						<div class="form-group">
							<label>Confirm Password*</label> <input type="password" class="form-control" name="password2" placeholder="Enter Password Again">
						</div>
						<div class="form-group">
							<label>Upload Avatar</label>
							<input type="file" name="avatar">
							<p class="help-block"></p>
						</div>
						<div class="form-group">
							<label>About Me</label>
							<textarea id="about" rows="6" cols="80" class="form-control" name="about" placeholder="Tell us about yourself (Optional)"></textarea>
						</div>
						<input name="submit" type="submit" class="color btn btn-default" value="Signup" />
					</form>
				</div>
			</div>
		</div>