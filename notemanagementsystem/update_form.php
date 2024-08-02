<!DOCTYPE html> 
<html> 
<?php include 'head.php'; ?>

    <head> 
    <title>Note Management</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
 
    </head> 
 
    <body> 
        <div class="container"> 
            <br>
            <br> 
            <br>
            <h2>Edit Note</h2><br><br>
            <?php 
            include 'db.php'; 
 
            if(isset($_GET['taskId'])){ 
                $id = $_GET['taskId']; 
                $sql= "SELECT * FROM todo_list WHERE taskId=$id"; 
                $result = $conn->query($sql); 
 
                if($result->num_rows>0) 
                    { 
                        $row = $result->fetch_assoc(); 
                ?> 
 
                    <form method = "post" action = "update_process.php"> 
                        <input type="hidden" name="taskId" value="<?php echo $row['taskId']; ?>"> 
                        <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Date:</label>
                            <input type="date" name="date" class="form-control" value="<?php echo $row['date']; ?>" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Due Date:</label>
                            <input type="date" name="duedate" class="form-control" value="<?php echo $row['duedate']; ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Status:</label>
                            <select name="noteStatus" class="form-control" required onchange="this.style.backgroundColor = this.options[this.selectedIndex].style.backgroundColor">
    <option value="Not Started" style="background-color: #f2c6de;" <?php echo ($row['noteStatus'] == 'Not Started') ? 'selected' : ''; ?>>Not Started</option>
    <option value="In Progress" style="background-color: #faedcb;" <?php echo ($row['noteStatus'] == 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
    <option value="On Hold" style="background-color: #f7d9c4;" <?php echo ($row['noteStatus'] == 'On Hold') ? 'selected' : ''; ?>>On Hold</option>
    <option value="Completed" style="background-color: #c9e4de;" <?php echo ($row['noteStatus'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
    <!-- Add more options as needed -->
</select>

                        </div>
                    </div>
                </div>


                <div class="row">

                            <div class="form-group col-md-6"> 
                            <label> Title : </label> 
                            <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" required>  
                        </div> 
                        <div class="form-group col-md-6"> 
                            <label> Category : </label> 
                            <select name="category" class="form-control" required >
                                <option value="Personal" <?php echo ($row['category'] == 'Personal') ? 'selected' : ''; ?>>Personal</option>
                                <option value="Work" <?php echo ($row['category'] == 'Work') ? 'selected' : ''; ?>>Work</option>
                                <option value="Urgent" <?php echo ($row['category'] == 'Urgent') ? 'selected' : ''; ?>>Urgent</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div> 
                    </div>



                        <div class="form-group"> 
                            <label> Note : </label> 
                            <textarea name="description" class="form-control" required><?php echo nl2br($row['description']); ?></textarea>
                        </div> 
                        <br><br>
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-warning btn-block">Update Note</button>
                            </div>
                            <div class="col-md-2">
                                <button id="backButton" class="btn btn-warning btn-block" style="background-color: #c6dbea; border: 2px solid #c6dbea; color: black;" onclick="goBack()">Back</button>
                            </div>
                        </div>

<script>
    function goBack() {
        window.location.href = 'dashboard.php';
    }
</script>
                       

                    </form> 
                     <?php include 'herta.php'; ?>
            <?php 
                } else { 
                    echo "Task not found."; 
                } 
            } else{ 
                echo "Invalid request."; 
            } 
            $conn->close(); 
            ?> 

        </div> 
    </body> 
</html>
