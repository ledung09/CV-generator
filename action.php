<?php
session_start();
$state = $_POST['state'];
<<<<<<< HEAD
$CVID_for_review = 0;
if (isset($_POST['CVID'])) {
    $CVID_for_review = isset($_POST['CVID']);
};
include_once('./db/db_connection.php');
=======
// $CVID_for_review = $_POST['CVID'];
$CVID_for_review = 0;
if (isset($_POST['CVID'])) $CVID_for_review = $_POST['CVID'];

include_once('./db/connect.php');
>>>>>>> 068a78994fa88d5fdcb286128d496f68ef261858
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $user_id = $_SESSION['user_id'] ;
    // Personal Information
    if($state == "create"){
        $insertCvQuery = "INSERT INTO cv_management (user_id, created_date, updated_date) VALUES ('$user_id', NOW(), NOW())";
        if (mysqli_query($conn, $insertCvQuery)) {
            // Step 2: Retrieve the generated cv_id
            $cv_id = mysqli_insert_id($conn);
        }
    }

    $fullname = $_POST["fname"];
    $professional_title = $_POST["profess"];
    $country = $_POST['country'];
    $city = "";
    if (isset($_POST['city'])) $city = $_POST['city'];
    $address = $_POST['address'];
    $picname = basename($_FILES["profile-img"]["name"]);
    $phone_numbers = $_POST['phone']; //another table,array
    $emails = $_POST['email'];        //another table, array


    //experience
    $job_title  = $_POST['job-title'];        //array
    $company_name  = $_POST['company-name'];    //array
    $job_start_date  = $_POST['job-start-date']; //array
    $job_end_date  = $_POST['job-end-date'];      //array
    //education
    $edu_des = $_POST['edu-des'];
    $institution_names = $_POST['edu-ins-name'];
    $start_dates = $_POST['edu-start-date'];
    $end_dates = $_POST['edu-end-date'];
    //certification
    $cer_names = $_POST['cer-name'];
    $cer_years = $_POST['cer-year'];
    $cer_ins_names = $_POST['cer-ins-name'];
    $cer_links = $_POST['cer-link'];

    //skill
    $skills_categories = $_POST['skills-category'];
    $skills_names = $_POST['skills-name'];
    //Project
    $prj_names = $_POST['prj-name'];
    $prj_years = $_POST['prj-year'];
    $prj_links = $_POST['prj-link'];
    $prj_dess = $_POST['prj-des'];
    $ref_relations = $_POST['ref-relation'];

    //reference
    $ref_names = $_POST['ref-name'];
    $ref_ins_names = $_POST['ref-ins-name'];
    $ref_emails = $_POST['ref-email'];
    $ref_phones = $_POST['ref-phone'];
    $ref_relations = $_POST['ref-relation'];

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
    //pInfo table
    if($state == "create"){
        $sql = "INSERT INTO pinfo (user_id,cv_id, fullname, professional_title, address, city, country, profile_pic) VALUES (?, ?, ?, ?, ?, ?, ?,?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iissssss",$user_id, $cv_id, $fullname, $professional_title, $address, $city, $country, $picname);
        if ($stmt->execute()) {
            echo "Record added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $stmt->error;
        }

        //phone number
        foreach ($phone_numbers as $phone) {
            $phone = mysqli_real_escape_string($conn, $phone);
            $insertQuery = "INSERT INTO phone_number (cv_id, phone_number) VALUES ('$cv_id', '$phone')";
            
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
    }
    else if($state == "review"){
        $sql = "UPDATE pinfo SET 
        fullname = ?,
        professional_title = ?,
        address = ?,
        city = ?,
        country = ?,
        profile_pic = ?
        WHERE cv_id = $CVID_for_review AND user_id = $user_id";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $fullname, $professional_title, $address, $city, $country, $picname);

        if ($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    }
    //experience
    if($state == "create"){
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

        if (isset($_POST['job-des'])) {
            $descriptions = $_POST['job-des'];
            foreach ($descriptions as $description) {
    
                //$description = mysqli_real_escape_string($conn, $description);
            
                // Insert data into the 'experience_description' table
                $insertQuery = "INSERT INTO experience_description (experience_id, description) VALUES ('$experience_id', '$description')";
                if (!mysqli_query($conn, $insertQuery)) {
                    echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
                    exit();
                }
            }
        }
        
    } 
    else if($state == "review"){
        if (
            count($job_title) === count($company_name) &&
            count($company_name) === count($job_start_date) &&
            count($job_start_date) === count($job_end_date)
        ) {
            // Get the length of the arrays
            $array_length = count($job_title);
        
            // Loop through the arrays and update data in the 'experience' table
            for ($i = 0; $i < $array_length; $i++) {
                $current_job_title = mysqli_real_escape_string($conn, $job_title[$i]);
                $current_company_name = mysqli_real_escape_string($conn, $company_name[$i]);
                $current_start_date = mysqli_real_escape_string($conn, $job_start_date[$i]);
                $current_end_date = mysqli_real_escape_string($conn, $job_end_date[$i]);
        
                // Assuming you have an experience_id for each record       
                $updateQuery = "UPDATE experience 
                                SET company_name = '$current_company_name', 
                                    job_title = '$current_job_title', 
                                    start_date = '$current_start_date', 
                                    end_date = '$current_end_date' 
                                WHERE cv_id = $CVID_for_review AND user_id = $user_id";
        
                if (!mysqli_query($conn, $updateQuery)) {
                    echo "Error: " . $updateQuery . "<br>" . mysqli_error($conn);
                    exit();
                }
            }
            echo "Experience data updated successfully";
        }
        //experence description
        $getExpQuery = "SELECT experience_id FROM experience WHERE cv_id = '$CVID_for_review'";
        $expResult = mysqli_query($conn, $getExpQuery);
        
        if ($expResult && mysqli_num_rows($expResult) > 0) {
            $expRow = mysqli_fetch_assoc($expResult);
            $experience_id = $expRow['experience_id'];
        }
        if (isset($_POST['job-des'])) {
            $descriptions = $_POST['job-des'];
        }
        $descriptions = isset($_POST['job-des']) ? $_POST['job-des'] : [];

        // Assuming you have a unique identifier for each description
        $description_ids = isset($_POST['description-ids']) ? $_POST['description-ids'] : [];
        
        if (count($descriptions) > 0 && count($descriptions) === count($description_ids)) {
            for ($i = 0; $i < count($descriptions); $i++) {
                $current_description = mysqli_real_escape_string($conn, $descriptions[$i]);
                $current_description_id = mysqli_real_escape_string($conn, $description_ids[$i]);
        
                $updateQuery = "UPDATE experience_description 
                                SET description = '$current_description' 
                                WHERE description_id = '$current_description_id'";
        
                if (!mysqli_query($conn, $updateQuery)) {
                    echo "Error: " . $updateQuery . "<br>" . mysqli_error($conn);
                    exit();
                }
            }
        } else {
            echo "Error: Invalid or missing data for job descriptions.";
        }
        
        
        echo "Experience descriptions updated successfully";
        
    }

    

    //education
    if($state == "create"){
        for ($i = 0; $i < count($edu_des); $i++) {

            $edu_des_i = mysqli_real_escape_string($conn, $edu_des[$i]);
            $institution_name_i = mysqli_real_escape_string($conn, $institution_names[$i]);
            $start_date_i = mysqli_real_escape_string($conn, $start_dates[$i]);
            $end_date_i = mysqli_real_escape_string($conn, $end_dates[$i]);
        
            // Insert data into the 'education' table
            $insertQuery = "INSERT INTO education (cv_id, edu_des, institution_name, start_date, end_date) VALUES ('$cv_id', '$edu_des_i', '$institution_name_i', '$start_date_i', '$end_date_i')";
        
            if (!mysqli_query($conn, $insertQuery)) {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
                exit();
            }
        }
    }else if($state == "review"){
        for ($i = 0; $i < count($edu_des); $i++) {
            $current_edu_des = mysqli_real_escape_string($conn, $edu_des[$i]);
            $current_institution_name = mysqli_real_escape_string($conn, $institution_names[$i]);
            $current_start_date = mysqli_real_escape_string($conn, $start_dates[$i]);
            $current_end_date = mysqli_real_escape_string($conn, $end_dates[$i]);
        
            // Assuming you have a unique identifier for each education record
        
            $updateQuery = "UPDATE education 
                            SET edu_des = '$current_edu_des', 
                                institution_name = '$current_institution_name', 
                                start_date = '$current_start_date', 
                                end_date = '$current_end_date' 
                            WHERE cv_id = $CVID_for_review AND user_id = $user_id";
        
            if (!mysqli_query($conn, $updateQuery)) {
                echo "Error: " . $updateQuery . "<br>" . mysqli_error($conn);
                exit();
            }
        }
    }
    //certification
    if($state == "create"){
        for ($i = 0; $i < count($cer_names); $i++) {
            $certificate_name = mysqli_real_escape_string($conn, $cer_names[$i]);
            $certifying_institution = mysqli_real_escape_string($conn, $cer_ins_names[$i]);
            $certificate_year = mysqli_real_escape_string($conn, $cer_years[$i]);
            $certificate_link = mysqli_real_escape_string($conn, $cer_links[$i]);
        
            
            $insertQuery = "INSERT INTO certificate (cv_id, certificate_name, certifying_institution, certificate_date, certificate_link, user_id)
                            VALUES (?, ?, ?, ?, ?, ?)";
        
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param("issssi", $cv_id, $certificate_name, $certifying_institution, $certificate_year, $certificate_link, $user_id);
        
            if (!$stmt->execute()) {
                echo "Error: " . $insertQuery . "<br>" . $stmt->error;
                exit();
            }  
        }
    }else if($state == "review"){
        for ($i = 0; $i < count($cer_names); $i++) {
            $current_certificate_name = mysqli_real_escape_string($conn, $cer_names[$i]);
            $current_certifying_institution = mysqli_real_escape_string($conn, $cer_ins_names[$i]);
            $current_certificate_year = mysqli_real_escape_string($conn, $cer_years[$i]);
            $current_certificate_link = mysqli_real_escape_string($conn, $cer_links[$i]);
        
            // Assuming you have a unique identifier for each certificate record
        
            $updateQuery = "UPDATE certificate 
                            SET certificate_name = '$current_certificate_name', 
                                certifying_institution = '$current_certifying_institution', 
                                certificate_date = '$current_certificate_year', 
                                certificate_link = '$current_certificate_link' 
                            WHERE cv_id = $CVID_for_review AND user_id = $user_id";
        
            if (!mysqli_query($conn, $updateQuery)) {
                echo "Error: " . $updateQuery . "<br>" . mysqli_error($conn);
                exit();
            }
        }
    }
    //Skill
 

    if($state == "create"){
        $skill_ids = array(); // Array to store inserted skill_ids

        // Assuming you have a query to fetch skill_id values, replace the query below with your actual query
        $selectSkillIdQuery = "SELECT skill_id FROM skill WHERE cv_id = ? AND skill_type = ? AND user_id = ?";
        $stmtSelectSkillId = $conn->prepare($selectSkillIdQuery);
        
        foreach ($skills_categories as $index => $skill_category) {
            // Ensure that $skill_category is sanitized and validated as needed
            $skill_category = mysqli_real_escape_string($conn, $skill_category);
        
            // Assuming you have cv_id and user_id values, replace them with your actual values
            $cv_id = 1; // Replace with your actual cv_id
            $user_id = 1; // Replace with your actual user_id
        
            $stmtSelectSkillId->bind_param("iss", $cv_id, $skill_category, $user_id);
            $stmtSelectSkillId->execute();
            $stmtSelectSkillId->bind_result($skill_id);
        
            while ($stmtSelectSkillId->fetch()) {
                // Store the fetched skill_id in the array
                $skill_ids[] = $skill_id;
            }
        
            $stmtSelectSkillId->close();
        }
        
        // Insert into skillname table
        foreach ($skill_ids as $index => $skill_id) {
            foreach ($skills_names[$index] as $skill_name) {
                // Ensure that $skill_name is sanitized and validated as needed
                $skill_name = mysqli_real_escape_string($conn, $skill_name);
        
                // Use a prepared statement to prevent SQL injection
                $insertQuery = "INSERT INTO skillname (skill_id, skill_name) VALUES (?, ?)";
                $stmt = $conn->prepare($insertQuery);
                $stmt->bind_param("is", $skill_id, $skill_name);
        
                if (!$stmt->execute()) {
                    echo "Error: " . $insertQuery . "<br>" . $stmt->error;
                    exit();
                }
        
                $stmt->close();
            }
        }
        
        // Use $skill_ids as needed in the rest of your code
        
    }
    else if ($state == "review"){
        // $skill_ids = array();

        // // Loop through skills_categories to insert or update records in the skill table
        // foreach ($skills_categories as $skill_category) {
        //     $skill_category = mysqli_real_escape_string($conn, $skill_category);

        //     // Check if the record with the current skill_category already exists
        //     $checkQuery = "SELECT skill_id FROM skill WHERE cv_id = ? AND skill_type = ? AND user_id = ?";
        //     $checkStmt = $conn->prepare($checkQuery);
        //     $checkStmt->bind_param("isi", $CVID_for_review , $skill_category, $user_id);
        //     $checkStmt->execute();
        //     $checkStmt->store_result();

        //     if ($checkStmt->num_rows > 0) {
        //         // Skill record exists, perform update
        //         $updateQuery = "UPDATE skill SET cv_id = ?, skill_type = ?, user_id = ? WHERE cv_id = ? AND skill_type = ? AND user_id = ?";
        //         $updateStmt = $conn->prepare($updateQuery);
        //         $updateStmt->bind_param("isisii", $CVID_for_review , $skill_category, $user_id, $CVID_for_review , $skill_category, $user_id);

        //         if (!$updateStmt->execute()) {
        //             echo "Error: " . $updateQuery . "<br>" . $updateStmt->error;
        //             exit();
        //         }

        //         // Get the skill_id and store it in the array
        //         $skill_id = $checkStmt->fetch();
        //         $skill_ids[] = $skill_id;
        //     } else {
        //         // Skill record doesn't exist, perform insert
        //         $insertQuery = "INSERT INTO skill (cv_id, skill_type, user_id) VALUES (?, ?, ?)";
        //         $insertStmt = $conn->prepare($insertQuery);
        //         $insertStmt->bind_param("isi", $CVID_for_review , $skill_category, $user_id);

        //         if ($insertStmt->execute()) {
        //             // Get the last inserted skill_id and store it in the array
        //             $skill_ids[] = mysqli_insert_id($conn);
        //         } else {
        //             echo "Error: " . $insertQuery . "<br>" . $insertStmt->error;
        //             exit();
        //         }
        //     }

        //     $checkStmt->close();
        // }

        // // Loop through skills_names to update records in the skillname table
        // for ($i = 0; $i < count($skills_names); $i++) {
        //     $skill_name = mysqli_real_escape_string($conn, $skills_names[$i]);
        //     $skill_id = $skill_ids[$i];

        //     $updateQuery = "UPDATE skillname SET skill_name = ? WHERE skill_id = ?";
        //     $updateStmt = $conn->prepare($updateQuery);
        //     $updateStmt->bind_param("si", $skill_name, $skill_id);

        //     if (!$updateStmt->execute()) {
        //         echo "Error: " . $updateQuery . "<br>" . $updateStmt->error;
        //         exit();
        //     }
        // }
        if (!empty($skills_categories)) {
            foreach ($skills_categories as $skill_category) {
                $skill_category = mysqli_real_escape_string($conn, $skill_category);
        
                $updateQuery = "UPDATE skill 
                                SET skill_type = ? 
                                WHERE cv_id = $CVID_for_review AND user_id = $user_id";
        
                $stmt = $conn->prepare($updateQuery);
                $stmt->bind_param("s", $skill_category);
        
                if ($stmt->execute()) {
                    // Update successful
                } else {
                    echo "Error: " . $updateQuery . "<br>" . $stmt->error;
                    exit();
                }
            }
        } else {
            echo "Error: No skills categories provided.";
        }

        if (count($skills_categories) === count($skills_names)) {
            for ($i = 0; $i < count($skills_categories); $i++) {
                $skill_category = mysqli_real_escape_string($conn, $skills_categories[$i]);
                $skill_names = $skills_names[$i]; // Assuming $skills_names is an array of skill names
        
                // Insert or update the skill record in the skill table
                $insertOrUpdateSkillQuery = "INSERT INTO skill (cv_id, skill_type, user_id) 
                                             VALUES (?, ?, ?) 
                                             ON DUPLICATE KEY UPDATE skill_id = LAST_INSERT_ID(skill_id)";
                $stmtSkill = $conn->prepare($insertOrUpdateSkillQuery);
                $stmtSkill->bind_param("isi", $cv_id, $skill_category, $user_id);
        
                if ($stmtSkill->execute()) {
                    // Get the last inserted or updated skill_id
                    $skill_id = mysqli_insert_id($conn);
        
                    // Update the skillname records based on the skill_id
                    foreach ($skill_names as $skill_name) {
                        $skill_name = mysqli_real_escape_string($conn, $skill_name);
        
                        $updateSkillNameQuery = "INSERT INTO skillname (skill_id, skill_name) 
                                                 VALUES (?, ?) 
                                                 ON DUPLICATE KEY UPDATE skill_name = VALUES(skill_name)";
                        $stmtSkillName = $conn->prepare($updateSkillNameQuery);
                        $stmtSkillName->bind_param("is", $skill_id, $skill_name);
        
                        if (!$stmtSkillName->execute()) {
                            echo "Error updating skillname: " . $stmtSkillName->error;
                            exit();
                        }
                    }
                } else {
                    echo "Error inserting/updating skill: " . $stmtSkill->error;
                    exit();
                }
            }
        } else {
            echo "Error: Mismatched data between skills categories and names.";
        }

    }
    //project
    if ($state == "create"){
        for ($i = 0; $i < count($prj_names); $i++) {

            $prj_name = mysqli_real_escape_string($conn, $prj_names[$i]);
            $prj_year = mysqli_real_escape_string($conn, $prj_years[$i]);
            $prj_link = mysqli_real_escape_string($conn, $prj_links[$i]);
            $prj_des = mysqli_real_escape_string($conn, $prj_dess[$i]);
        

            $insertQuery = "INSERT INTO project (cv_id, project_name, project_year, description, project_link, user_id) 
                            VALUES (?, ?, ?, ?, ?, ?)";
        
            $stmt = $conn->prepare($insertQuery);
            $stmt->bind_param("issssi", $cv_id, $prj_name, $prj_year, $prj_des, $prj_link, $user_id);
        
            if ($stmt->execute()) {
                // Get the last inserted project_id
                $project_id = mysqli_insert_id($conn);
                $project_ids[] = $project_id; // Store the project_id in the array
            } else {
                echo "Error: " . $insertQuery . "<br>" . $stmt->error;
                exit();
            }
        }
    }
    else if ($state == "review"){
        for ($i = 0; $i < count($prj_names); $i++) {
            $prj_name = mysqli_real_escape_string($conn, $prj_names[$i]);
            $prj_year = mysqli_real_escape_string($conn, $prj_years[$i]);
            $prj_link = mysqli_real_escape_string($conn, $prj_links[$i]);
            $prj_des = mysqli_real_escape_string($conn, $prj_dess[$i]);
        
            // Assuming $project_ids array contains the project_id values you want to update
        
            $updateQuery = "UPDATE project SET 
                            project_name = ?,
                            project_year = ?,
                            description = ?,
                            project_link = ?
                            WHERE cv_id = $CVID_for_review AND user_id = $user_id";
        
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param("ssss", $prj_name, $prj_year, $prj_des, $prj_link);
        
            if ($stmt->execute()) {
                // Update successful
            } else {
                echo "Error: " . $updateQuery . "<br>" . $stmt->error;
                exit();
            }
        }
        
    }

    // reference
    if ($state == "create"){
        if (
            isset($ref_names, $ref_ins_names, $ref_emails, $ref_phones, $ref_relations) &&
            is_array($ref_names) &&
            is_array($ref_ins_names) &&
            is_array($ref_emails) &&
            is_array($ref_phones) &&
            is_array($ref_relations) &&
            count($ref_names) > 0 &&  
            count($ref_ins_names) > 0 &&
            count($ref_emails) > 0 &&
            count($ref_phones) > 0 &&
            count($ref_relations) > 0
        ) {
            // Iterate over the arrays
            for ($i = 0; $i < count($ref_names); $i++) {
                
                $ref_name = mysqli_real_escape_string($conn, $ref_names[$i]);
                $ref_ins_name = mysqli_real_escape_string($conn, $ref_ins_names[$i]);
                $ref_email = mysqli_real_escape_string($conn, $ref_emails[$i]);
                $ref_phone = mysqli_real_escape_string($conn, $ref_phones[$i]);
                $ref_relation = mysqli_real_escape_string($conn, $ref_relations[$i]);

                // Use a prepared statement to prevent SQL injection
                $insertQuery = "INSERT INTO reference (cv_id, reference_name, institution_name, ref_email, ref_phone, ref_relation, user_id) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($insertQuery);
                $stmt->bind_param("isssssi", $cv_id, $ref_name, $ref_ins_name, $ref_email, $ref_phone, $ref_relation, $user_id);

                if ($stmt->execute()) {
                    // Get the last inserted reference_id
                    $reference_id = mysqli_insert_id($conn);
                } else {
                    echo "Error: " . $insertQuery . "<br>" . $stmt->error;
                    exit();
                }


            }
        } else {
            echo "One or more arrays are not properly initialized or are empty.";
        }
    }
    else if ($state == "review"){
        for ($i = 0; $i < count($ref_names); $i++) {
            $ref_name = mysqli_real_escape_string($conn, $ref_names[$i]);
            $ref_ins_name = mysqli_real_escape_string($conn, $ref_ins_names[$i]);
            $ref_email = mysqli_real_escape_string($conn, $ref_emails[$i]);
            $ref_phone = mysqli_real_escape_string($conn, $ref_phones[$i]);
            $ref_relation = mysqli_real_escape_string($conn, $ref_relations[$i]);
        

            $updateQuery = "UPDATE reference SET 
                            reference_name = ?,
                            institution_name = ?,
                            ref_email = ?,
                            ref_phone = ?,
                            ref_relation = ?
                            WHERE cv_id = $CVID_for_review AND user_id = $user_id";
        
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param("sssss", $ref_name, $ref_ins_name, $ref_email, $ref_phone, $ref_relation);
        
            if ($stmt->execute()) {
                // Update successful
            } else {
                echo "Error: " . $updateQuery . "<br>" . $stmt->error;
                exit();
            }
        }
        
    }

    //
    if ($stmt->execute()) {
        echo "Record added successfully";
<<<<<<< HEAD
        // header("Location: index.php?page=manageCVs");
=======
        header("Location: index.php?manageCVs");
>>>>>>> 068a78994fa88d5fdcb286128d496f68ef261858
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>