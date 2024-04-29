<?php
include_once('../Connection/connection_open.php');
include_once('../header.php');

// Number of posts for the user
if ($singleTopic) {
    $topicCount = $conn->prepare("SELECT COUNT(*) AS count_topics FROM topics WHERE user_name = :user_name");
    $topicCount->bindParam(':user_name', $singleTopic->user_name, PDO::PARAM_STR);
    $topicCount->execute();
    $count = $topicCount->fetch(PDO::FETCH_OBJ);
    echo "<p>Total posts by " . htmlspecialchars($singleTopic->user_name) . ": " . $count->count_topics . "</p>";
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="main-col">
                <div class="block">
                    <h4 class="pull-right">Ask Everything</h4>
                    <div class="clearfix"></div>
                    <hr>
                    <ul id="topics">
                        <!-- Your HTML content here -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// Initialize $singleTopic to null to avoid undefined variable errors
$singleTopic = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Prepare the SQL query with a placeholder for the id
    $topic = $conn->prepare("SELECT * FROM topics WHERE id = :id");
    $topic->bindParam(':id', $id, PDO::PARAM_INT);
    $topic->execute();
    $singleTopic = $topic->fetch(PDO::FETCH_OBJ);
    // Check if $singleTopic is set before using it further
    if (!$singleTopic) {
        exit("Topic not found");
    }
    // Output the single topic data
    echo "<h2>Post</h2>";
    echo "<ul>";
    echo "<li>";
    echo "Name: " . htmlspecialchars($singleTopic->title) . "<br>";
    echo "Category: " . htmlspecialchars($singleTopic->category) . "<br>";
    echo "Content: " . htmlspecialchars($singleTopic->body) . "<br>";
    echo "</li>";
    echo "</ul>";
}
?>