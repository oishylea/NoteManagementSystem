<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <br><br>
    <?php include 'head.php'; ?>

    <div class="container col-md-5">
        <br><br>
        <h2 class="text-center">Register to Note Management System</h2>
        <br><br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="container" style="background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    <form method="post" action="register_process.php" onsubmit="return validatePassword()">
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="toggle-password-btn btn btn-light" onclick="togglePasswordVisibility('password')">👁️</button>
                                </div>
                            </div>
                        </div>
                        
                        <div id="password-error" style="color: red;"></div>

                        <br>
                        <div style="display: flex; justify-content: space-between;">
                            <div style="margin-right: 10px;">
                                <button type="submit" class="btn btn-warning" style="font-family: inherit; font-size: inherit;">Register Account</button>
                            </div>
                            <div>
                                <a href="index.php" class="btn btn-warning" style="font-family: inherit; font-size: inherit;">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            var toggleButton = document.querySelector('.toggle-password-btn');

            // Change the type attribute based on the current type
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';

            // Change the button style based on the password visibility
        }

        function validatePassword() {
            var passwordInput = document.getElementById('password');
            var password = passwordInput.value;
            var passwordError = document.getElementById('password-error');

            // Password policy regex: at least one uppercase, one lowercase, one number, one symbol
            var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]+$/;

            if (!regex.test(password)) {
                passwordError.textContent = 'Password must include an uppercase letter, a lowercase letter, a number, and a symbol';
                return false;
            } else {
                passwordError.textContent = '';
                return true;
            }
        }
    </script>

    <?php include 'herta.php'; ?>

</body>

</html>
