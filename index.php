<?php
require('Connection/connection_open.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
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
</head>
<body>
    <div class="header">
        <h2>Main Page</h2>
    </div>
    <?php include('header.php'); ?>
    <div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="main-col">
				<div class="block">
					<h1 class="pull-left">Welcome to Forum</h1>
					<h4 class="pull-right">Ask Everything</h4>
					<div class="clearfix"></div>
                    <hr>
                    <a href="topics/topics.php?id=1" class="btn btn-primary">Go to Topics</a>

</body>
</html>