<?php
session_start();
include 'db.php';

// Initialize error message
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Escape user input to prevent SQL injection
    $escapedUsername = mysqli_real_escape_string($conn, $username);
    $escapedPassword = mysqli_real_escape_string($conn, $password);

    // Check if entered username/password are not equal
    if ($username != $escapedUsername || $password != $escapedPassword) {
        $error = "Wrong username or password.";
    } else {
        // Query the database to get the hashed password and users_id
        $sql = "SELECT users_id, password FROM users_izzah WHERE username = '$escapedUsername'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];
            $users_id = $row['users_id'];

            // Verify the entered password against the stored hash
            if (password_verify($escapedPassword, $hashedPassword)) {
                $_SESSION['username'] = $escapedUsername;
                $_SESSION['users_id'] = $users_id;
                header("Location: dashboard.php"); // Redirect to the dashboard or any other authenticated page
            } else {
                $error = "Wrong username or password.";
            }
        } else {
            $error = "Invalid login credentials.";
        }
    }
}

$conn->close();
?>

<?php require 'index.php'; ?>
