<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title><?php echo $customer["name"] ?></title>
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
        };
    </script>
</head>
<body>

    <div class="container-fluid mt-4" style="padding: 35px;">
        <div class="header d-flex justify-content-between">
       
            <div>
                <h1 class="mt-2" style="font-weight: 500; margin-bottom: 3px;">INVOICE</h1>
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
                <td style="padding: 5px; white-space: nowrap;"><span style="font-weight: bold;">CEF no: </span><?php echo explode(" ", $customer["unique_key"])[1]; ?></td>
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
                <td style="width: 75%; border-left: 0px; padding: 5px; text-align: right;" colspan="2">Current Payable Amount</td>
                <td style="padding: 5px; text-align: right; font-weight: bold;"><?php echo number_format($current_total) ?>/-</td>
            </tr>
        </table>
        <p style="margin-top: 10px; font-size: 6px; line-height: 10px;">
            <span style="font-weight: bold;">Important note:</span> The processing fee, membership from fee and down payment/full payment must be submitted as a single
            transaction payment through. a Pay-Order, Crossed Cheque, or Online Payment, payable to 'Gwadar Gymkhana (Private) Limited.
            All applicant's payments are non-refundable in accordance with the club's rules and bylaws. The membership fee and processing
            fee are subject to change without prior notice. Applicant must pay the current membership fee as indicated on our official website.
            Gwadar Gymkhana does not engage with agents or dealers. All payments are to be remitted solely to the designated bank account
            provided herewith. Any payments directed to an account other than the aforementioned will be deemed non-compliant and,
            accordingly, not accepted. Please ensure to pay prior to the expiration date.
        </p>
        <table style="width: 100%; margin-top: 10px;">
            <tr>
                <td style="padding: 5px; font-weight: bold;">Bank Al Habib</td>
                <td style="padding: 5px; font-weight: bold;">Bank Alfalah</td>
                <td style="padding: 5px; font-weight: bold;">Pay Online</td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
                <td style="padding: 5px; width: 33.33%;">
                    <p style="line-height: 10px; font-size: 7px; margin-bottom: 10px;">
                        Title: Gwadar Gymkhana Pvt. Ltd <br>
                        Bank Al Habib Limited (Clifton) <br>
                        Branch Code 1241
                    </p>
                    <p>
                        Account number: <br>
                        1241-0981-063986-01-1 <br>
                        IBAN number: <br>
                        PK22 BAHL1241098106398601
                    </p>
                </td>

                <td style="padding: 5px;  width: 33.33%;">
                    <p style="line-height: 10px; font-size: 7px; margin-bottom: 10px;">
                        Title: Gwadar Gymkhana Pvt. Ltd <br>
                        Bank Alfalah (Sea View) <br>
                        Branch Code 0163
                    </p>
                    <p>
                        Account number: <br>
                        0163-1008382404 <br>
                        IBAN number: <br>
                        PK29 ALFH0163001008382404
                    </p>
                </td>

                <td style="padding: 5px;  width: 33.33%; padding-bottom: 15px;">
                    <p style="line-height: 10px; font-size: 7px;">
                        Please go to
                        www.gwadargymkhana.com.pk/pay-online/
                        to pay the fee mentioned above. Keep in <br>
                        mind that there will be a 3% bank charge <br>
                        added to the transaction.
                    </p>
                    <img src="./images/visa.png" width="50" style="float:right;" />
                </td>
            </tr>
        </table>  
        <table style="width: 100%; margin-top: 10px;">
            <tr>
                <td style="padding: 5px;">
                    <div>
                        <span style="font-weight: bold; text-transform: capitalize;">Issue date: </span>
                        <?php echo date("Y/m/d", strtotime($record["issue_date"])) ?>
                        <span style="font-weight: bold; margin-left: 10px; text-transform: capitalize;">Expiry date: </span>
                        <?php echo date("Y/m/d", strtotime($record["expiry_date"]))?>
                    </div>
                </td>
                <td style="padding: 5px; font-weight: bold;">Approved by finance department</td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
                <td style="padding: 5px; width: 33.33%;">
                    <p style="line-height: 10px; font-size: 7px; text-align: center; margin: 5px 5px;">
                        <span style="font-weight: bold;">Invoice generated and signed by</span>
                        <br>
                        Khadija Basheer Baloch
                    </p>
                </td>

                <td style="padding: 5px;  width: 33.33%;">
                    &nbsp;
                </td>
            </tr>
        </table>  
        <p style="font-weight: bold; text-align: center; margin-top: 10px;">If you have any questions, please call us at +9221 111 947 111 or email us info@gwadargymkhana.com.pk</p>

                
    </div>
       

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
