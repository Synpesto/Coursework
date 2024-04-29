
<?php
require('Connection/connection_open.php');

// Function to handle module creation
function createModule($conn, $module_name) {
    $sql = "INSERT INTO Modules (module_name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$module_name]);
}

if(isset($_POST['create_module'])) {
    $module_name = $_POST['module_name'];
    createModule($conn, $module_name);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modules</title>
</head>
<body>
    <div>
        <h1>Modules</h1>
    </div>
    <?php include('header.php'); ?>

    <div>
        <form method="POST">
            <label for="module_name">Module Name:</label>
            <input type="text" id="module_name" name="module_name" required>
            <input type="submit" name="create_module" value="Create Module">
        </form>
    </div>

    <?php
        // Fetch modules from the database
        $sql = "SELECT * FROM Modules"; // <-- Corrected table name here
        $result = $conn->query($sql);
        if ($result && $result->rowCount() > 0) {
            echo "<ul>";
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id'];
                $name = $row['name'];
                echo "<li><a href='module_details.php?module_id=$id'>$name</a></li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No modules found.</p>";
        }
    ?>
</body>
</html>
