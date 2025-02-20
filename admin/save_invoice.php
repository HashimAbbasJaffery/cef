<?php 


include "db_conn.php";
$invoice_data = json_encode($_GET['invoice_data']);
$cef = $_GET['cef'];
$cef = "$cef";
$issue_date = json_encode(date('Y-m-d', strtotime($_GET['issue_date'])));

$expiry_date = json_encode(date('Y-m-d', strtotime($_GET['expiry_date'])));
$paid = $_GET['paid'];
$balance = $_GET['balance'];



$form_id = (int)$_GET['form_id'];
$query = "SELECT * FROM invoices WHERE form_id = $form_id";
$fetchData = mysqli_query($conn, $query);
$customer = mysqli_fetch_assoc( $fetchData);

if($customer) {
    $query = "UPDATE invoices SET invoice_data = $invoice_data, issue_date = $issue_date, expiry_date = $expiry_date, paid = $paid, balance = $balance WHERE form_id = $form_id";
    mysqli_query($conn, $query);

} else {
    $query = "INSERT INTO invoices (`form_id`, `invoice_data`, `issue_date`, `expiry_date`, `paid`, `balance`) VALUES ($form_id, $invoice_data, $issue_date, $expiry_date, $paid, $balance)";
    mysqli_query($conn,$query);
}



echo 1;