<!DOCTYPE html>
<html>

<?php include 'head.php'; ?>
<div style="display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column;">
    <br><h2 style="text-align: center;">Note Management | Izzah</h2><br>
    <?php
    include 'db.php';

    if (isset($_GET['taskId'])) {
        $taskId = $_GET['taskId'];
        $sql = "DELETE FROM todo_list WHERE taskId=$taskId";

        if ($conn->query($sql) == TRUE) {
            echo '<img src="trashbin.png" alt="Trashbin" style="vertical-align: middle; width: 100px; height: 100px;">';
            echo '<br>';
            echo '<span style="font-size: 18px; font-family: \'Euphoria Script\';">Deleted Successfully</span><br>';
            echo '<a href="dashboard.php" style="font-size: 18px; font-family: \'Euphoria Script\';">Go back to Dashboard</a>';
        } else {
            echo "Error deleting note: " . $conn->error;
        }
    } else {
        echo "Invalid request.";
    }
    $conn->close();
    ?>
</div>
</html>

