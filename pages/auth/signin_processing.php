<?php
session_start();

function isValidUsername($username) {
    return (strlen($username) > 0 && strlen($username) <= 50);
}

function isValidPassword($password) {
    return (strlen($password) > 0 && strlen($password) <= 50);
}

function containsOnlyASCII($str) {
    return preg_match('/^[\x00-\x7F]+$/', $str);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include_once('../../db/connect.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!isValidUsername($username) || !isValidPassword($password) || !containsOnlyASCII($username) || !containsOnlyASCII($password)) {
        $_SESSION['login_fail'] = $username;
        header("Location: ./signin.php");
        exit();
    }


    $sql = "SELECT user_id, password FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Verify the password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            header("Location: ../../../../index.php");
            exit();
        } else {
            echo "Invalid password";
            $_SESSION['login_fail'] = $username;
            header("Location: ./signin.php");
            exit();
        }
    } else {
        echo "Invalid username";
        $_SESSION['login_fail'] = $username;
        header("Location: ./signin.php");
        exit();
    }

    mysqli_close($conn);
}
?>