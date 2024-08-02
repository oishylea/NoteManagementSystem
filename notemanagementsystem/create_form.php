<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>

    <head>
        <title>Note Management</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    </head>


    <body>
        <br>
        <br>
        <div class="container">
            <h2>Add Note</h2><br><br>
            <form method="post" action="create_process.php">
            <div class="form-row">
                
    <div class="form-group col-md-4">
        <label>Date :</label>
        <input type="date" name="date" class="form-control" required>
    </div>
    <div class="form-group col-md-4">
        <label>Due Date :</label>
        <input type="date" name="duedate" class="form-control">
    </div>

    <script>
        $(document).ready(function(){
            // Triggered when the input value changes
            $('#duedate').change(function(){
                // Get the selected date
                var selectedDate = $(this).val();

                // Set the input value to null if not selected
                if (!selectedDate) {
                    $(this).val(null);
                }
            });
        });
    </script>


    <div class="form-group col-md-4">
        <label>Status :</label>
        <select name="noteStatus" class="form-control" required onchange="this.style.backgroundColor = this.options[this.selectedIndex].style.backgroundColor">
    <option value="Not Started" style="background-color: #f2c6de; color: black;">Not Started</option>
    <option value="In Progress" style="background-color: #faedcb; color: black;">In Progress</option>
    <option value="On Hold" style="background-color: #f7d9c4; color: black;">On Hold</option>
    <option value="Completed" style="background-color: #c9e4de; color: black;">Completed</option>
    <!-- Add more options as needed -->
</select>


    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Title : </label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group col-md-6">
        <label>Category : </label>
        <select name="category" class="form-control" required >
    <option value="Personal">Personal</option>
    <option value="Work">Work</option>
    <option value="Urgent">Urgent</option>
    <!-- Add more options as needed -->
</select>

</div>


    </div>



    
    <div class="form-group">
        <label>Note : </label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="container">
        <br><br>
    <div class="row">
        <div class="col-md-6">
            <button type="submit" class="btn btn-warning" style="background-color: #c6dbea; border: 2px solid #c6dbea; color: black;">Add Note</button>

        </div>
        <div class="col-md-6">
        <button id="backButton" class="btn btn-warning" style="background-color: #c6dbea; border: 2px solid #c6dbea; color: black;" onclick="goBack()">Back</button>

<script>
    function goBack() {
        window.location.href = 'dashboard.php';
    }
</script>
        </div>
    </div>
</div>
            </form>

            </div>
    </body>
</html>
