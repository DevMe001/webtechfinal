<!DOCTYPE html>
<html lang="en">
    <body>
        <?php
            include('includes/time.php');
        ?>

        <div class="login-info">
            <h1> LOGIN</h1>
        </div>

        <form action="includes/logIn.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Login">
        </form>

        <script>
            // Check if a query parameter 'error' exists in the URL
            const urlParams = new URLSearchParams(window.location.search);
            const errorParam = urlParams.get('error');

            // If 'error' parameter is present, show the alert
            if (errorParam === 'wrong_roles') {
                alert('You are unauthorized to access this page. Please Log In again');
            }
            if (errorParam === 'wrong_credentials') {
                alert('Incorrect username or password. Please try again.');
            }
        </script>
    </body>
</html>
