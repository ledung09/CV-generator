<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include_once('./db/db_connection.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the user credentials
    $sql = "SELECT user_id, password FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }


    mysqli_close($conn);
}
?>
