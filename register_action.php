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
        // Redirect back to register.php with an error message
        header("Location: register.php?error=username_exists");
        exit();
    } else {
        // Insert data into the 'users' table
        $insertQuery = "INSERT INTO users (username, password)
                        VALUES ('$username', '$password')";
        
        // // Execute the INSERT query
        // if (mysqli_query($conn, $insertQuery)) {
        //     // Retrieve the user_id after successful insertion
        //     $getUserIDQuery = "SELECT user_id FROM users WHERE username = '$username'";
        //     $result = mysqli_query($conn, $getUserIDQuery);

        //     if ($result && mysqli_num_rows($result) > 0) {
        //         $row = mysqli_fetch_assoc($result);
        //         $user_id = $row['user_id'];

        //         // Insert user_id into the 'cv_management' table
        //         $insertCVManagementQuery = "INSERT INTO cv_management (user_id, created_date, updated_date)
        //                                    VALUES ('$user_id', NOW(), NOW())";

                if (mysqli_query($conn,  $insertQuery)) {
                    echo "User registered successfully. User ID: $user_id";
                    header("Location: signin.html?regist_successfully");
                } else {
                    echo "Error inserting into cv_management: " . mysqli_error($conn);
                }
        //     } else {
        //         echo "Error retrieving user_id: " . mysqli_error($conn);
        //     }
        // } else {
        //     echo "Error inserting user data: " . mysqli_error($conn);
        // }
    }

    mysqli_close($conn);
    
}
?>
