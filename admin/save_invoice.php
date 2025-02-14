<?php 


include "db_conn.php";
$invoice_data = json_encode($_GET['invoice_data']);



$form_id = $_GET['form_id'];
$query = "SELECT * FROM invoices WHERE form_id = $form_id";
$fetchData = mysqli_query($conn, $query);
$customer = mysqli_fetch_assoc( $fetchData);

if($customer) {

    $query = "UPDATE invoices SET invoice_data = $invoice_data";
    mysqli_query($conn, $query);

} else {
    $query = "INSERT INTO invoices (`form_id`, `invoice_data`) VALUES ($form_id, $invoice_data)";
    mysqli_query($conn,$query);
}



echo 1;