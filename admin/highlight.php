<?php
include "db_conn.php";

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Fetch the current status
    $result = mysqli_query($conn, "SELECT status FROM form WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    
    // Toggle the status
    $newStatus = ($row['status'] == 'highlighted') ? 'normal' : 'highlighted';

    // Update the status in the database
    $update = mysqli_query($conn, "UPDATE form SET status = '$newStatus' WHERE id = $id");

    if($update) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
