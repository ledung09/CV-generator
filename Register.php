<?php
// Include your database connection file
include_once('db_connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get input data from the form
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // You may want to perform additional validation and sanitation here

    // Insert data into the 'users' table
    $sql = "INSERT INTO users (username, password)
            VALUES ('$username', '$password')";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
