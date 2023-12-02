<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include your database connection file
    include_once('db_connection.php');

    // Get input data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the user credentials
    $sql = "SELECT user_id, password FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Store the user_id in the session for later use
            $_SESSION['user_id'] = $row['user_id'];

            // Redirect to a page where you can input data to applicants
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
