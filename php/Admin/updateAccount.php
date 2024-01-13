<?php
    include('../secure.php'); // Include the secure page to check if the user is logged in
    include('../includes/checkRole.php');
    checkUserRole('a');

    include('../db.php');

    function getUserData($userID, $db) {
        // Sanitize the user ID to prevent SQL injection
        $userID = mysqli_real_escape_string($db, $userID);

        // Query to retrieve user data by ID
        $query = "SELECT * FROM accounts WHERE userID = '$userID' LIMIT 1";
        $result = mysqli_query($db, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Fetch user data as an associative array
            $userData = mysqli_fetch_assoc($result);
            return $userData;
        } else {
            // Return false if user data is not found
            return false;
        }
    }

    // Check if 'userID' is set in the URL parameters
    if (isset($_GET['userID'])) {
        $userID = $_GET['userID'];
        $userData = getUserData($userID, $db);

        if (!$userData) {
            // Handle the case where user data is not found
            echo "User not found!";
            exit;
        }
    } else {
        // Handle the case where 'userID' is not set in the URL parameters
        echo "User ID not provided!";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../style/style.css">
        <link rel="icon" type="image/x-icon" href="../../style/images/samcis_logo.png" sizes="16x16">
        <title>Update Account</title>
    </head>
    <body>
        <?php
            include('../includes/headerHub.php');
            include('../includes/time.php');
        ?>

        <div class="accountAdd">
            <a href='adminHub.php'><button id="backBtn">Back</button></a>
            <h2>Update Account Form</h2>
            <form action="../includes/updateAcc.php" method="POST">
                <!-- Populate form fields with user data -->
                <input type="hidden" name="userID" value="<?php echo $userID; ?>">
                <strong><label for="username">Username: <?php echo $userData['username']; ?></strong></b><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="" required><br>

                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" value="<?php echo $userData['firstName']; ?>" required><br>

                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" value="<?php echo $userData['surName']; ?>" required><br>

                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="admin" <?php echo ($userData['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="content_creator" <?php echo ($userData['role'] == 'content_creator') ? 'selected' : ''; ?>>Content Creator</option>
                </select><br><br>

                <button id="updtBtn"type="submit">Update Account</button>
            </form>
        </div>
    </body>
</html>