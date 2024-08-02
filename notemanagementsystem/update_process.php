<?php
include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id = $_POST['taskId'];
    $date = $_POST['date'];
    $duedate = $_POST['duedate'];
    $title = $_POST['title'];
    $note = $_POST['description'];
    $noteStatus = $_POST['noteStatus'];
    $category = $_POST['category'];



    $sql = "UPDATE todo_list SET date = '$date', duedate='$duedate', title='$title' , description='$note', noteStatus='$noteStatus', category='$category' WHERE taskId=$id";

if ($conn->query($sql)==TRUE){
    header("Location: dashboard.php");
}
else{
    echo "Error updating note: ".$conn->error;
}
}
$conn->close();
?>
