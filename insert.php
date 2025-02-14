<?php
include 'admin/db_conn.php';

// Generate a unique numeric key
$uniqueNumber = rand(100000, 999999); // 6-digit random number
$formattedKey = sprintf('CEF#: %06d', $uniqueNumber);

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Taking all values from the form data (input) and escaping them
$name = mysqli_real_escape_string($conn, $_POST['name']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$passport = mysqli_real_escape_string($conn, $_POST['passport']);
$adress = mysqli_real_escape_string($conn, $_POST['adress']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
$profession = mysqli_real_escape_string($conn, $_POST['profession']);
$position = mysqli_real_escape_string($conn, $_POST['position']);
$orginization = mysqli_real_escape_string($conn, $_POST['orginization']);
$income = mysqli_real_escape_string($conn, $_POST['income']);
$clubs1 = mysqli_real_escape_string($conn, $_POST['clubs1']);
$clubs2 = mysqli_real_escape_string($conn, $_POST['clubs2']);
$clubs3 = mysqli_real_escape_string($conn, $_POST['clubs3']);
$clubs4 = mysqli_real_escape_string($conn, $_POST['clubs4']);
$seeking = mysqli_real_escape_string($conn, $_POST['seeking']);
$applying = mysqli_real_escape_string($conn, $_POST['applying']);
$current = date('d-M-Y');

// We are going to insert the data into our form table
$sql = "INSERT INTO `form`(`name`, `gender`, `dob`, `passport`, `adress`, `city`, `email`, `mobile`, `profession`, `position`, `orginization`, `income`, `clubs1`, `clubs2`, `clubs3`, `clubs4`, `seeking`, `applying`, `current`, `unique_key`)
        VALUES ('$name', '$gender', '$dob', '$passport', '$adress', '$city', '$email', '$mobile', '$profession', '$position', '$orginization', '$income', '$clubs1', '$clubs2', '$clubs3', '$clubs4', '$seeking', '$applying', '$current', '$formattedKey')";

// Print SQL for debugging
echo $sql;

// Execute the query
if (mysqli_query($conn, $sql)) {
    // Get the last inserted ID
    $last_id = mysqli_insert_id($conn);
    
    // Redirect to view.php with the last inserted ID
    header('Location: view.php?id=' . $last_id);
    exit;
} else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
