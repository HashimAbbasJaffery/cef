<?php
require('db_conn.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM form WHERE id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
header("Location: home.php"); 
exit();
?>