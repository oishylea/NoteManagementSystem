<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'users_id' session variable is set
    if (isset($_SESSION['users_id'])) {
        $date = $_POST['date'];
        $duedate = $_POST['duedate'];
        $title = $_POST['title'];
        $note = $_POST['description'];
        $noteStatus = $_POST['noteStatus'];
        $category = $_POST['category'];

        $users_id = $_SESSION['users_id'];

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO todo_list (date, duedate, title, description, noteStatus,category, users_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssi", $date, $duedate, $title, $note, $noteStatus,$category, $users_id);

        if ($stmt->execute()) {
            header("Location: dashboard.php");
        } else {
            echo "Error : " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: users_id not set in session.";
    }
}

$conn->close();
?>
