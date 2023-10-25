<?php
session_start();

include "db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    // You can place code here for handling logged-in users (if needed)
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["comment"])) {
    $user_id = 1; // Replace with the actual user's ID
    $comment_text = $_POST["comment"];

    // You should use prepared statements to prevent SQL injection
    $sql = "INSERT INTO comments (user_id, comment_text) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $comment_text);

    if ($stmt->execute()) {
        // After successfully inserting a comment, redirect to the comment page
        header("Location: f.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Retrieve comments from the database
$sql = "SELECT * FROM comments ORDER BY comment_id DESC";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your HTML head content here -->
    <style>
        /* Your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        /* Add more styles for your specific elements */
        .comment {
            border: 1px solid #ddd; /* Add border */
            background-color: #f9f9f9; /* Add background color */
            margin: 10px 0;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <!-- Add comment form -->
        <div class="add-comment-section mt-4 mb-4">
        <form method="POST" action="f.php">
    <div class="user-avatar">
        <img class="rounded-circle" src="https://i.imgur.com/qdiP4DB.jpg" width="38" alt="User Avatar">
    </div>
    <input type="text" class="form-control mr-3" name="comment" placeholder="Add comment">
    <button class="btn btn-primary" type="submit">Comment</button>
</form>

        </div>

        <!-- Display comments retrieved from the database -->
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="commented-section mt-2">';
                echo '<div class="commented-user d-flex flex-row align-items-center">';
                echo '<h5 class="mr-2">User ID: ' . $row["user_id"] . '</h5>';
                echo '<span class="dot mb-1"></span>';
                echo '<span class="mb-1 ml-2">';
                if (isset($row["date"])) {
                    echo 'Date: ' . $row["date"];
                } else {
                    echo 'No date available';
                }
                echo '</span>';
                echo '</div>';
                echo '<div class="comment-text-sm">';
                echo '<span>' . $row["comment_text"] . '</span>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "No comments available.";
        }
        ?>
    </div>
</body>
</html>

