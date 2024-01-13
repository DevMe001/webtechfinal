<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="icon" type="image/x-icon" href="../../style/images/samcis_logo.png" sizes="16x16">
    <title>Add Account</title>
</head>
<body>
    <?php
        include('../includes/headerHub.php');
        include('../includes/time.php');
    ?>

    <div class="accountAdd">
        <a href='adminHub.php'><button id="backBtn">Back</button></a>
        <h2>Add Account Form</h2>
        <form action="../includes/addUser.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required><br>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required><br>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="content_creator">Content Creator</option>
            </select><br><br>

            <button type="Add Account">Submit</button>
        </form>
    </div>
</body>
</html>