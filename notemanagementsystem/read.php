<?php
include 'db.php';

// Check if the 'users_id' session variable is set
if (isset($_SESSION['users_id'])) {
    $users_id = $_SESSION['users_id'];

    $sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'date';
    $sortOrder = isset($_GET['order']) ? $_GET['order'] : 'ASC';

    // Define allowed columns for sorting
    $allowedColumns = ['date', 'duedate', 'title', 'noteStatus'];

    // Validate and set the sorting column
    if (!in_array($sortColumn, $allowedColumns)) {
        $sortColumn = 'date'; // Default to 'date' if invalid column
    }

        // // Get the search term if it is set
        // $search = isset($_GET['search']) ? $_GET['search'] : '';

        // // Build the SQL query with search term
        // $sql = "SELECT * FROM todo_list WHERE users_id = $users_id AND
        //         (title LIKE '%$search%' OR category LIKE '%$search%' OR noteStatus LIKE '%$search%')
        //         ORDER BY $sortColumn $sortOrder";
    
        // $result = $conn->query($sql);
    
        // if ($result->num_rows > 0) {
        //     while ($row = $result->fetch_assoc()) {
        //         // ... (rest of your code to display the table rows)
        //     }
        // } else {
        //     echo "No results found.";
        // }
    $sql = "SELECT * FROM todo_list WHERE users_id = $users_id ORDER BY $sortColumn $sortOrder";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            $formattedDate = date('d/m/Y', strtotime($row["date"]));
            echo "<td>" . $formattedDate . "</td>";
            
        
            $dueDateFromDatabase = $row["duedate"];
            
            if ($dueDateFromDatabase == '0000-00-00' || empty($dueDateFromDatabase)) {
                echo "<td>-</td>";
            } else {
                $formattedDueDate = date('d/m/Y', strtotime($dueDateFromDatabase));
                echo "<td>" . $formattedDueDate . "</td>";
            }
            
            echo "<td><a href='#' class='note-link' data-toggle='modal' data-target='#noteModal' data-description='" . ucfirst($row["description"]) . "' style='color: black;'>" . ucfirst($row["title"]) . "</a></td>";
            
            

            echo "<td>" . ucfirst($row["category"]) . "</td>";
            echo "<td>";

            $colors = array(
                'Not Started' => '#f2c6de',
                'In Progress' => '#faedcb',
                'On Hold' => '#f7d9c4',
                'Completed' => '#c9e4de'
            );
            
            $color = isset($colors[$row["noteStatus"]]) ? $colors[$row["noteStatus"]] : '';
            
            echo "<a style='background-color: $color; border: none; color: black; padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; margin: 4px 2px; cursor: pointer; border-radius: 4px;'>". ucfirst($row["noteStatus"]) . "</a>";
            
            echo "</td>";
            
            echo "<td>
            <a href='update_form.php?taskId=" . $row["taskId"] . "' style='background-color: #f8df81; color: black; padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; margin: 4px 2px;' class='btn'>Edit</a>
            <a href='delete.php?taskId=" . $row["taskId"] . "' style='background-color: #ff9aa2; color: black; padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; margin: 4px 2px;' class='btn'>Delete</a>
            </td>";
            echo "</tr>";
        }
    } else {
        echo "No notes.";
    }
} else {
    echo "Error: users_id not set in session.";
}

$conn->close();
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!-- MODALLLLLLLLLLLLL -->
<div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
        <div class="modal-dialog d-flex align-items-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noteModalLabel">Note Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p id="noteDescription"></p>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function () {
        $('.note-link').on('click', function () {
            var description = $(this).data('description');
            $('#noteDescription').text(description);
        });
    });
</script>

</body>
</html>
