<?php
session_start();
include 'head.php';

// Initialize default sorting values
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'date';
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'ASC';
?>

<div class="container">
    <br>
    <br>
    <form action="logout.php" method="post">
        <button type="submit" class="btn btn-primary" style="background-color: #c6dbea; border: 2px solid #c6dbea; color: black">Logout</button>
        <br>
        <br>
        <img src="cat.gif" alt="GIF Image Description" width="200" style="float: right;">
        <h2 style="text-align: center;">Note Management | <?php echo ucfirst(strtolower($_SESSION['username'])); ?></h2><br>
        <br>
    </form>

    <!-- <form method="get" action="">
            <div class="form-row">
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" value="<?php //echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form> -->

    <table class="table">
        <thead>
        <tr>
    <th style="width: 10%;">
        <a href="?sort=date&order=<?php echo ($sortColumn == 'date' && $sortOrder == 'ASC') ? 'DESC' : 'ASC'; ?>"
           style="color: black; text-decoration: none;">
            Date <?php echo ($sortColumn == 'date') ? ($sortOrder == 'ASC' ? '▲' : '▼') : ''; ?>
        </a>
    </th>
    <th style="width: 15%;">
        <a href="?sort=duedate&order=<?php echo ($sortColumn == 'duedate' && $sortOrder == 'ASC') ? 'DESC' : 'ASC'; ?>"
           style="color: black; text-decoration: none;">
            Due Date <?php echo ($sortColumn == 'duedate') ? ($sortOrder == 'ASC' ? '▲' : '▼') : ''; ?>
        </a>
    </th>
    <th style="width: 25%;">
        <a href="?sort=title&order=<?php echo ($sortColumn == 'title' && $sortOrder == 'ASC') ? 'DESC' : 'ASC'; ?>"
           style="color: black; text-decoration: none;">
            Title <?php echo ($sortColumn == 'title') ? ($sortOrder == 'ASC' ? '▲' : '▼') : ''; ?>
        </a>
    </th>
    <th style="width: 20%;">
    <a >
            Category <?php //echo ($sortColumn == 'category') ? ($sortOrder == 'ASC' ? '▲' : '▼') : ''; ?>
        </a>
</th>
    <th style="width: 15%;">
        <a href="?sort=noteStatus&order=<?php echo ($sortColumn == 'noteStatus' && $sortOrder == 'ASC') ? 'DESC' : 'ASC'; ?>"
           style="color: black; text-decoration: none;">
            Status <?php echo ($sortColumn == 'noteStatus') ? ($sortOrder == 'ASC' ? '▲' : '▼') : ''; ?>
        </a>
    </th>
    <th style="width: 15%;">
        <a href="create_form.php" class="btn btn-primary" style="background-color: #c6dbea; border: 2px solid #c6dbea; color: black">Add Note</a>
    </th>
</tr>


        </thead>
        <tbody>

            <?php

            include 'read.php';


            ?>

        </tbody>
    </table>

</div>
