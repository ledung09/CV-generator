<?php
session_start();

function isValidUsername($username) {
    return (strlen($username) >= 4 && strlen($username) <= 50);
}

function isValidPassword($password) {
    return (strlen($password) >= 6 && strlen($password) <= 50);
}

function containsOnlyASCII($str) {
    return preg_match('/^[\x00-\x7F]+$/', $str);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include_once('../../db/connect.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!isValidUsername($username) || !isValidPassword($password) || !containsOnlyASCII($username) || !containsOnlyASCII($password)) {
        $_SESSION['reg_fail'] = $username .'sss';
        header("Location: ./register.php");
        exit();
    }

    $sqlCheckUsername = "SELECT username FROM users WHERE username = ?";
    $stmtCheckUsername = mysqli_prepare($conn, $sqlCheckUsername);

    if ($stmtCheckUsername) {
      mysqli_stmt_bind_param($stmtCheckUsername, "s", $username);
      mysqli_stmt_execute($stmtCheckUsername);
      mysqli_stmt_store_result($stmtCheckUsername);
      if (mysqli_stmt_num_rows($stmtCheckUsername) > 0) {
        $_SESSION['reg_fail'] = $username;
        header("Location: ./register.php");
        exit();
      }
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);
        $success = mysqli_stmt_execute($stmt);

        if ($success) {
          $newUserId = mysqli_insert_id($conn);

          $_SESSION['user_id'] = $newUserId;
  
          header("Location: ../../../../index.php");
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
}
?>