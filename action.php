<?php
session_start();
include_once('./db/db_connection.php');
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Personal Information
    $user_id = $_SESSION['user_id'];
    $fullname = $_POST["fname"];
    $professional_title = $_POST["profess"];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $picname = basename($_FILES["profile-img"]["name"]);

    // File Upload
    $targetDir = "uploads/";  
    $targetFile = $targetDir . basename($_FILES["profile-img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


    // Server-side validation
    if (!preg_match("/^[a-zA-Z' ]*$/", $fullname)) {
        echo "Name sai cu phap";
        $conn->close();
        exit();  
    }
    if (!preg_match("/^[a-zA-Z0-9 ]*$/", $professional_title)) {
        echo "Profess sai cu phap";
        $conn->close();
        exit();
    }
    // if (!preg_match("/^\d+$/", $phone_number)) {
    //     echo "Phone sai cu phap";
    //     $conn->close();
    //     exit();
    // }

    if (!preg_match("/^[a-zA-Z' ]*$/", $country) ) {
        echo "City hoac Country sai cu phap";
        $conn->close();
        exit();  
    }
    if (!preg_match("/^[A-Za-z0-9,.\/_\-\s]+$/", $address)) {
        echo "Address sai cu phap";
        $conn->close();
        exit();  
    }
    
    // Check image
    $check = getimagesize($_FILES["profile-img"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profile-img"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["profile-img"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["profile-img"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql = "INSERT INTO applicants (user_id,fullname, professional_title, email, address, city, country, profile_pic, created_date, updated_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, CURDATE(), CURDATE())";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $user_id, $fullname, $professional_title, $email, $address, $city, $country, $picname);


    if ($stmt->execute()) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
