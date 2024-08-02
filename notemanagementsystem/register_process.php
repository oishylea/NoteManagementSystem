<!DOCTYPE html>
<html>

<?php include 'head.php'; ?>
<div style="display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column;">
    <br><h2 style="text-align: center;">Note Management System</h2><br>


<?php 
session_start(); 
include 'db.php'; 
 
if($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = $_POST['username']; 
    $password = $_POST['password']; 
 
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 

    $check_sql = "SELECT * FROM users_izzah WHERE username = '$username'"; 
    $check_result = $conn->query($check_sql); 
 
    if($check_result->num_rows > 0) { 
        echo '<img src="unavailable.png" alt="Unavailable" style="vertical-align: middle; width: 100px; height: 100px;">';
        echo '<br>';
        echo '<span style="font-size: 18px; font-family: \'Euphoria Script\';">Username already exists. Please choose a different username.</span><br>';
        echo '<a href="register.php" style="font-size: 18px; font-family: \'Euphoria Script\';">Go back to Register Page</a>';

    } else { 
        $sql = "INSERT INTO users_izzah (username, password) VALUES ('$username', '$hashedPassword')"; 

        if($conn->query($sql) === TRUE) { 
            echo '<img src="userregistered.png" alt="Unavailable" style="vertical-align: middle; width: 100px; height: 100px;">';
            echo '<br>';
            echo '<span style="font-size: 18px; font-family: \'Euphoria Script\';">Registration successful. You can now login.</span><br>';
            echo '<a href="index.php" style="font-size: 18px; font-family: \'Euphoria Script\';">Go back to Login Page</a>';

        } else { 
            echo "Error: " . $sql . "<br>" . $conn->error; 
        } 
    } 
} 

$conn->close(); 
?>
