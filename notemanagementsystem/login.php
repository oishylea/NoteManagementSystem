<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container col-md-5">
    <br><br>
    <h2 class="text-center">Login</h2><br><br>
    <div class="container" style="background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

    <form method="post" action="login_process.php">
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
<br>
        <div style="display: flex; justify-content: space-between;">
            <button type="submit" class="btn btn-primary">Login</button>
         <a class="btn btn-warning" href="register.php">Register</a>
        </div>
    </form>
</div>
</div>

    <?php include 'herta.php'; ?>

</body>

</html>
