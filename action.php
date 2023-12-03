
<?php
session_start();
include_once('./db/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Personal Information
    $user_id = $_SESSION['user_id'];  // Assuming you have started the session
    $insertCvQuery = "INSERT INTO cv_management (user_id, created_date, updated_date) VALUES ('$user_id', NOW(), NOW())";
    if (mysqli_query($conn, $insertCvQuery)) {
        // Step 2: Retrieve the generated cv_id
        $cv_id = mysqli_insert_id($conn);
    }
    $fullname = $_POST["fname"];
    $professional_title = $_POST["profess"];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $picname = basename($_FILES["profile-img"]["name"]);
    $phone_numbers = $_POST['phone']; //another table,array
    $emails   = $_POST['email'];        //another table, array


    //experience
    $job_title  = $_POST['job-title'];        //array
    $company_name  = $_POST['company-name'];    //array
    $job_start_date  = $_POST['job-start-date']; //array
    $job_end_date  = $_POST['job-end-date'];      //array

    // File Upload
    $targetDir = "uploads/";  
    $targetFile = $targetDir . basename($_FILES["profile-img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    //get cv id
    $getCVIdQuery = "SELECT cv_id FROM cv_management WHERE user_id = '$user_id'";
    $cvResult = mysqli_query($conn, $getCVIdQuery);

    if ($cvResult && mysqli_num_rows($cvResult) > 0) {
        $cvRow = mysqli_fetch_assoc($cvResult);
        $cv_id = $cvRow['cv_id'];



    }

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

    $sql = "INSERT INTO pinfo (user_id,cv_id, fullname, professional_title, address, city, country, profile_pic) 
    VALUES (?, ?, ?, ?, ?, ?, ?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iissssss",$user_id, $cv_id, $fullname, $professional_title, $address, $city, $country, $picname);

    //phone number
    foreach ($phone_numbers as $phone) {
        $phone = mysqli_real_escape_string($conn, $phone);
        $insertQuery = "INSERT INTO phone_number (user_id,cv_id, phone_number) VALUES ('$user_id','$cv_id', '$phone')";
        
        if (!mysqli_query($conn, $insertQuery)) {
            echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            exit();
        }
    }
    //emails  
    foreach ($emails as $email) {
        $email = mysqli_real_escape_string($conn, $email);
        $insertQuery = "INSERT INTO email (user_id,cv_id, email_address) VALUES ('$user_id','$cv_id', '$email')";
        
        if (!mysqli_query($conn, $insertQuery)) {
            echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            exit();
        }
    }
    //social media
    if (isset($_POST['media-link']) && isset($_POST['media-name'])) {
        $media_link = $_POST['media-link'];
        $media_name = $_POST['media-name'];
        foreach ($media_link as $index => $medialink) {
            $medialink = mysqli_real_escape_string($conn, $medialink);
            $socialmedia_name = mysqli_real_escape_string($conn, $media_name[$index]);
        
            $insertQuery = "INSERT INTO socialmedia_link (user_id,cv_id, socialmedia_name, socialmedia_link) VALUES ('$user_id','$cv_id', '$socialmedia_name', '$medialink')";
            
            if (!mysqli_query($conn, $insertQuery)) {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
                exit();
            }
        }
    }
    
    //experience
    if (
        count($job_title) === count($company_name) &&
        count($company_name) === count($job_start_date) &&
        count($job_start_date) === count($job_end_date)
    ) {
        // Get the length of the arrays
        $array_length = count($job_title);

        // Loop through the arrays and insert data into the 'experience' table
        for ($i = 0; $i < $array_length; $i++) {
            $current_job_title = mysqli_real_escape_string($conn, $job_title[$i]);
            $current_company_name = mysqli_real_escape_string($conn, $company_name[$i]);
            $current_start_date = mysqli_real_escape_string($conn, $job_start_date[$i]);
            $current_end_date = mysqli_real_escape_string($conn, $job_end_date[$i]);

            $insertQuery = "INSERT INTO experience (user_id,cv_id, company_name, job_title, start_date, end_date) 
                            VALUES ('$user_id','$cv_id', '$current_company_name', '$current_job_title', '$current_start_date', '$current_end_date')";

            if (!mysqli_query($conn, $insertQuery)) {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
                exit();
            }
        }
        echo "Experience data inserted successfully";
    } 
    //experence description
    $getExpQuery = "SELECT experience_id FROM experience WHERE cv_id = '$cv_id'";
    $expResult = mysqli_query($conn, $getExpQuery);
    
    if ($expResult && mysqli_num_rows($expResult) > 0) {
        $expRow = mysqli_fetch_assoc($expResult);
        $experience_id = $expRow['experience_id'];
    }
    
    $descriptions = $_POST['job-des'];
    foreach ($descriptions as $description) {
        // Ensure that $description is sanitized and validated as needed
        //$description = mysqli_real_escape_string($conn, $description);
    
        // Insert data into the 'experience_description' table
        $insertQuery = "INSERT INTO experience_description (experience_id, description) VALUES ('$experience_id', '$description')";
        if (!mysqli_query($conn, $insertQuery)) {
            echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            exit();
        }
    }
    

    //education
    

    if ($stmt->execute()) {
        echo "Record added successfully";
        header("Location: index.php?add_cv_success");
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>