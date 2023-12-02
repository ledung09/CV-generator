<?php

include_once('./db/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get input data from the form
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Check if the username already exists
    $checkUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $checkUsernameQuery);

    if (mysqli_num_rows($result) > 0) {
        // Redirect back to register.html with an error message
        header("Location: register.php?error=username_exists");
        exit();
    } else {
        // Insert data into the 'users' table
        $insertQuery = "INSERT INTO users (username, password)
                        VALUES ('$username', '$password')";

        // Execute the SQL query
        if (mysqli_query($conn, $insertQuery)) {
            echo "User registered successfully";
            header("Location: signin.html");
            exit();
        } else {
            echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>
