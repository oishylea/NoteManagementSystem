<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar View</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css"
        integrity="sha512-mo6lVadFC5vMw5FwXetrx3sfSaZ5y70NGjOWaRi0hjNEsUib9KTrp4HbCPMlR0fB5Cp9fBWTXUZuN7P/Xp+aUg=="
        crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha512-UqBgWmcBlYqxGj/8ZOd2wWTXX4ZaI8IpZtBZnCFi4s7eBTBDU4DSzvM41WJCECA8AckbS65sFkftwWWA9jGiGg=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-nNEw5rM6ur3kfUgE6Zo4izV/ZfbCblz1KJLnMn89sZ3ztcz5z5jeut3MPk4KqtmHVI0zZvm+DbhX1beFvs2fNQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"
        integrity="sha512-lA04DMo3jRY7DVtKVlgZbW6ypJ/DtHBc6ZgEBR6sfggz7p9fToibZLLr2Dz0Rf+9l3I2p17/bsz5Y0Ii5G6nfQ=="
        crossorigin="anonymous"></script>
</head>
<?php include 'head.php'; ?>

<body>
    <!-- Your calendar container -->
    <div id="calendar"></div>

    <!-- Your PHP code to fetch events -->
    <?php
    session_start();

    include 'db.php';
    $colors = array(
        'Not Started' => '#f2c6de',
        'In Progress' => '#faedcb',
        'On Hold' => '#f7d9c4',
        'Completed' => '#c9e4de'
    );
    
    // Check if the 'users_id' session variable is set
    if (isset($_SESSION['users_id'])) {
        $users_id = $_SESSION['users_id'];

        $sql = "SELECT * FROM todo_list WHERE users_id = $users_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            //fetch_assoc untuk panggil data 
            while ($row = $result->fetch_assoc()) {
                echo '{';
                echo 'title: "' . ucfirst($row["title"]) . '",';
                echo 'start: "' . $row["date"] . 'T00:00:00",'; // Assuming date is in YYYY-MM-DD format
                echo 'end: "' . $row["duedate"] . 'T23:59:59",'; // Assuming duedate is in YYYY-MM-DD format
                echo 'color: "' . $colors[$row["noteStatus"]] . '",'; // Color based on noteStatus
                echo 'url: "update_form.php?taskId=' . $row["taskId"] . '",'; // URL for editing
                echo '},';
            }
        } else {
            echo "No notes.";
        }
    } else {
        echo "Error: users_id not set in session.";
    }

    $conn->close();
    ?>

    <!-- Initialize FullCalendar -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    <?php
                    session_start();

                    include 'db.php';
                    $colors = array(
                        'Not Started' => '#f2c6de',
                        'In Progress' => '#faedcb',
                        'On Hold' => '#f7d9c4',
                        'Completed' => '#c9e4de'
                    );

                    // Check if the 'users_id' session variable is set
                    if (isset($_SESSION['users_id'])) {
                        $users_id = $_SESSION['users_id'];

                        $sql = "SELECT * FROM todo_list WHERE users_id = $users_id";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            //fetch_assoc to call data
                            while ($row = $result->fetch_assoc()) {
                                echo '{';
                                echo 'title: "' . ucfirst($row["title"]) . '",';
                                echo 'start: "' . $row["date"] . 'T00:00:00",'; // Assuming date is in YYYY-MM-DD format
                                echo 'end: "' . $row["duedate"] . 'T23:59:59",'; // Assuming duedate is in YYYY-MM-DD format
                                echo 'color: "' . $colors[$row["noteStatus"]] . '",'; // Color based on noteStatus
                                echo 'url: "update_form.php?taskId=' . $row["taskId"] . '",'; // URL for editing
                                echo '},';
                            }
                        } else {
                            echo "{ title: 'No notes', start: '', end: '', color: '' }";
                        }
                    } else {
                        echo "{ title: 'Error: users_id not set in session', start: '', end: '', color: '' }";
                    }

                    $conn->close();
                    ?>
                ],
            });

            calendar.render();
        });
    </script>
</body>

</html>
