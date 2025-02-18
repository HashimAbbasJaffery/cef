<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @media print{
                @page{
                    size: A5;
                    margin: 0 10px;
                }
                table, th, td {
                    border: 0.5px solid black;
                }

                .bc-head-txt-label {
    left: calc(50% - .5rem);
    line-height: 1;
    padding-top: .5rem;
    position: absolute;
    left: 0;
    top:30px;
    transform: rotate(180deg);
    white-space: nowrap;
    writing-mode: vertical-rl;
    font-size:10px;
    font-weight:600;
    color: #a7a7a7 !important;
}
            .button{
                display:none;
            }
            }
            body {
                font-size: 11px;
                padding-left:10px;
            }
        table{
            line-height: 6px;
        }
            .header h1 {
                font-size: 20px;
                font-weight: 400;
                text-transform: uppercase;
                
            }
            .header h1 span{
                font-weight: bold;
            }
            p{
                font-size: 8px;
                margin-bottom: 2px;
                line-height: 12px;
            }
            .form-section {
                border: 1px solid #000;
                padding: 20px;
            }
            .form-label {
                font-weight: bold;
            }
            .form-check-label {
            font-size: 9px;
            font-weight: bold;
            padding-left: 5px;
            margin-top: 6px;
            }
            .plans-goals {
                font-size: 9px;
                line-height: 12px;
                margin-bottom: 2px;
                text-transform: capitalize;
            }
            /* .remarks {
                height: 100px;
            } */
            .sign-stamp {
                height: 50px;
            }
            tr td{
                font-size: 9px;
                text-transform: uppercase;
            }
            .question{
                border:1px dashed #000;
                border-radius:8px !important; 
                padding: 5px;
            }
            input.form-check-input {
                width: 30px;
                height: 15px;
                border: 2px solid #000;
            }
            .form-box{
                font-weight: bold;
                font-size: 12px;
                text-transform: uppercase;
            }
            .subsidy{
                font-size: 13px;
                font-weight: bold;
                text-transform: uppercase;
            }
            .subsidy span{
                font-weight: 400;
            }
            .date{
                font-weight: bold;
                font-size: 11px;
                text-transform: uppercase;
            }
            .date span{
                font-weight: 400;
            }
            .bc-head-txt-label {
    left: calc(50% - .5rem);
    line-height: 1;
    padding-top: .5rem;
    position: absolute;
    left: 0;
    top:30px;
    transform: rotate(180deg);
    white-space: nowrap;
    writing-mode: vertical-rl;
    font-weight:600;
    color: #a7a7a7;
}
            /* img{
                vertical-align: middle;
            } */

            table, th, td {
                border: 0.5px solid black;
                border-bottom: none;
                border-collapse: collapse;
            }
    </style>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</head>
<body>
    <?php 
    
    include "db_conn.php";
    $id = $_GET['id'];
    $fetchAllData = mysqli_query($conn,"SELECT * FROM form WHERE id = $id");
    $customer = mysqli_fetch_assoc( $fetchAllData);
    
    ?>
    <?php 
    
    $id = $_GET['id'];
    $invoice_data = mysqli_query($conn,"SELECT * FROM invoices WHERE form_id = $id");
    $data = mysqli_fetch_assoc( $invoice_data);   
    $record = $data;
    $invoice_data = json_decode($data["invoice_data"]);   
    
    ?>
    <div class="container-fluid mt-4">
    <div class="bc-head-txt-label bc-head-icon-chrome_android">120</div>
        <div class="header d-flex justify-content-between">
       
            <div>
                <h1 class="mt-2" style="font-weight: 500; margin-bottom: 3px;">RECEIPT</h1>
                <p style="font-size: 15px; margin-top: 0px; font-weight: 400;">from Gwadar Gymkhana (Pvt) Ltd.</p>
                <p style="font-size: 8px;">PR120224 - <span style="font-style: italic;">All published prices are in PKR.</span></p>
            </div>
            
            <!-- <img src="" alt=""> -->
             <div style="display: flex; justify-content: end; flex-direction: column; align-items: end;">
                 <img src="img/logo.png" alt="" class="img-fluid" width="180px" style="float: right;">
             </div>
        </div>
        <div class="d-flex" style="justify-content: end;">
            <p style="font-size: 10px; font-weight: bold;">www.gwadargymkhana.com.pk</p>
            <p style="margin-right: 10px; margin-left: 10px; font-size: 10px; font-weight: bold;">-</p>
            <p style="font-size: 10px; font-weight: bold;">UAN: +9221-111-947-111</p>
         </div>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <tr>
                <td style="padding: 5px; width: 50%;"><span style="font-weight: bold;">Bill to: </span><?php echo $customer["name"] ?></td>
                <td style="padding: 5px; white-space: nowrap;"><span style="font-weight: bold;">CEF no: </span><?php echo $record["cef"] ?></td>
                <td style="padding: 5px; white-space: nowrap;"><span style="font-weight: bold;">Invoice no: </span><?php echo mt_rand(100000, 999999) ?></td>
        </table>
        <table style="width: 100%; border-bottom: 1px solid black;">
            <tr>
                <td style="padding: 5px; width: 70%;"><span style="font-weight: bold;">Address: </span><?php echo $customer['adress'] ?></td>
                <td style="padding: 5px; white-space: nowrap;"><span style="font-weight: bold;">Phone: </span><?php echo $customer['mobile'] ?></td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 10px;">
            <tr style="background: #d9d9d9">
                <td style="width: 75%; border-left: 0px; padding: 5px;">Description</td>
                <td style="padding: 5px; text-align: center;">Due Date</td>
                <td style="padding: 5px; text-align: right;">PKR</td>
            </tr>
            <?php
                $i = 01;
                $total = 0;
                $current_total = 0;
            ?>
            <?php foreach($invoice_data as $data): ?>
                <tr>
                    <td style="width: 75%; border-left: 0px; padding: 5px;"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT) ?>. <?php echo $data->description ?></td>
                    <td style="padding: 5px; text-align: center; text-transform: capitalize;"><?php echo date("dMy", strtotime($data->date)) ?></td>
                    <td style="padding: 5px; text-align: right;"><?php echo number_format($data->price) ?></td>
                    <?php $total += $data->price; ?>
                    <?php ($data->cp) ? $current_total += $data->price : "" ?>
                    <?php $i++; ?>
                </tr>
            <?php endforeach; ?>
            <?php for($j = $i; $j <= 10; $j++): ?>
                <tr>
                    <td style="width: 75%; border-left: 0px; padding: 5px;"><?php echo str_pad($j, 2, "0", STR_PAD_LEFT) ?>. </td>
                    <td style="padding: 5px; text-align: center;"></td>
                    <td style="padding: 5px; text-align: right;"></td>
                </tr>
            <?php endfor; ?>

            <tr>
                <td style="width: 75%; border-left: 0px; padding: 5px; text-align: right;" colspan="2">Total Payable Amount</td>
                <td style="padding: 5px; text-align: right; font-weight: bold;"><?php echo number_format($total); ?>/-</td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
                <td style="width: 75%; border-left: 0px; padding: 5px; text-align: right;" colspan="2">Paid</td>
                <td style="padding: 5px; text-align: right; font-weight: bold;"><?php echo number_format($record["paid"]) ?>/-</td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
                <td style="width: 75%; border-left: 0px; padding: 5px; text-align: right;" colspan="2">Balance</td>
                <td style="padding: 5px; text-align: right; font-weight: bold;"><?php echo number_format($record["balance"]) ?>/-</td>
            </tr>
        </table>
        <table style="width: 100%; margin-top: 10px;">
            <tr>
                <td style="padding: 5px;">
                    <div>
                        <span style="text-transform: capitalize;"><span style="font-weight: bold;">Date:</span> <?php echo date('d/m/Y'); ?></span>
                    </div>
                </td>
                <td style="padding: 5px; font-weight: bold;">Approved by finance department</td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
                <td style="padding: 5px; width: 30%;">
                    <p style="line-height: 10px; font-size: 7px; text-align: left; margin: 5px 5px;">
                        <span style="font-weight: bold;">Invoice generated and signed by</span>
                        <br>
                        Khadija Basheer Baloch
                    </p>
                </td>

                <td style="padding: 5px;  width: 70%;">
                    &nbsp;
                </td>
            </tr>
        </table>  
        <table style="width: 100%; margin-top: 10px;">
            <tr>
                <td style="font-weight: bold; padding: 10px; text-transform: capitalize;">Upon completion of payment, please direct all communication to the following departments:</td>
            </tr>
        </table>
        <table style="width: 100%; border-bottom: 1px solid black;">
            <tr>
                <td style="padding: 10px; line-height: 10px; width: 20%; text-transform: capitalize; font-weight: bold;">
                    Member Services <br>
                    Department
                </td>
                <td style="text-transform: capitalize; padding: 10px; line-height: 10px;">For correspondence regarding membership approval and membership cards.</td>
                <td style="text-transform: capitalize; padding: 10px;">member.services@gwadargymkhana.com.pk</td>
            </tr>
            <tr>
                <td style="padding: 10px; line-height: 10px; text-transform: capitalize; font-weight: bold;">
                    Reciprocal <br>
                    Department
                </td>
                <td style="text-transform: capitalize; padding: 10px; line-height: 10px;">For introduction letters for reciprocal clubs.</td>
                <td style="text-transform: capitalize; padding: 10px;">reciprocal@gwadargymkhana.com.pk</td>
            </tr>
            <tr>
                <td style="padding: 10px; line-height: 10px; text-transform: capitalize; font-weight: bold;">
                    Finance <br>
                    Department
                </td>
                <td style="text-transform: capitalize; padding: 10px; line-height: 10px;">For matters relating to bank payments and monthly instalments.</td>
                <td style="text-transform: capitalize; padding: 10px;">finance@gwadargymkhana.com.pk</td>
            </tr>
        </table>
        <p style="font-weight: bold; text-align: center; margin-top: 10px;">If you have any questions, please call us at +9221 111 947 111 or email us info@gwadargymkhana.com.pk</p>

                
    </div>
       

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
