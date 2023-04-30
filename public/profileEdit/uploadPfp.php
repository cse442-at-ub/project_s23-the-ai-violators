<?php
session_start();
include __DIR__ . "/../../config/database.php";

$target_dir = "../uploads/";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

// give it a random name
$target_file = $target_dir . uniqid() . "." . $imageFileType;


// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        error(2);
        $uploadOk = 0;
    }
} else {
    error();
    $uploadOk = 0;
}



// Check if file already exists
if (file_exists($target_file)) {
    error(3);
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large. The maximum file size is 5MB.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    error(2);
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    error();
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        setProfilePic($_SESSION['user_name'], $target_file);
        sucess();
    } else {
        error();
    }
}

function sucess()
{
    header('Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile');
}

function error($errorType = 4) // 1 = file too large, 2 = file not an image, 3 = file already exists, 4 = other
{
    header('Location: /CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profileEdit?error=' . $errorType);
}
