<?php 


include "db_conn.php";
$id = $_GET['id'];
$fetchAllData = mysqli_query($conn,"SELECT * FROM form WHERE id = $id");
$customer = mysqli_fetch_assoc( $fetchAllData);

?>
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
                    background: #eeffef;
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
            body {
                background: #eeffef;
            }
    </style>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</head>
<body>
    <div class="container-fluid mt-4">
    <div class="bc-head-txt-label bc-head-icon-chrome_android"><?php echo $customer['unique_key']; ?></div>
        <div class="header d-flex justify-content-between">
       
            <div>
                <h1 class="mt-2" style="font-weight: 500; margin-bottom: 0px;">CANDIDATE'S</h1>
                <p style="font-size: 15px; margin-top: 0px; font-weight: 400;">ONLINE ELIGIBILITY REPORT</p>
            </div>
            
            <!-- <img src="" alt=""> -->
            <div style="display: flex; justify-content: end; flex-direction: column; align-items: end;">
                <img src="img/logo.png" alt="" class="img-fluid" width="180px" style="float: right;">
            </div>
        </div>
        
        
        <p style="margin-top: 10px; font-size: 10px;">The candidate has successfully applied online for eligibility based on the terms and conditions of Gwadar Gymkhana Club. This exclusive membership is designed for business professionals, particularly those in the industrial and import-export sectors, as well as individuals involved in major projects within the Gwadar Economic Zone, including factory and hotel construction. It is also ideal for those interested in Gwadar’s tourism industry. By submitting the eligibility form, the candidate acknowledges and agrees to the club’s terms, confirming the accuracy of the provided information. Their personal data will be securely used for club-related communications only. Suitable applicants will be contacted with further membership details.</p>
        <div style="margin-top: 30px;">
            <div class="first-row">
                <p style="font-size: 14px; text-transform: uppercase;"><span style="font-weight: bolder;">FULLNAME:</span> <?php echo $customer["name"]; ?></p>
            </div>
            <div class="second-row" style="margin-top: 10px; display: flex;">
                <p style="font-size: 14px; margin-right: 10px; text-transform: uppercase;"><span style="font-weight: bolder;">CNIC / PASSPORT #:</span> <?php echo $customer["passport"] ?></p>
                <p style="font-size: 14px; text-transform: uppercase;"><span style="font-weight: bolder;">GENDER:</span> <?php echo $customer["gender"] ?></p>
            </div>
            <div class="third-row" style="margin-top: 10px; display: flex;">
                <p style="font-size: 14px; margin-right: 10px; text-transform: uppercase;"><span style="font-weight: bolder;">DOB:</span> <?php echo $customer["dob"] ?></p>
                <p style="font-size: 14px; text-transform: uppercase;"><span style="font-weight: bolder;">CITY:</span> <?php echo $customer['city'] ?></p>
            </div>
            <div class="fourth-row" style="margin-top: 5px;">
                <p style="font-size: 14px; line-height: 20px; text-transform: uppercase;"><span style="font-weight: bolder;">RESIDENTIAL ADDRESS:</span> <?php echo $customer["adress"] ?></p>
            </div>
        </div>
        <div class="congratulations" style="border: 2px dashed #000; margin-top: 20px; padding: 10px;">
            <p style="font-size: 20px; text-align: center; line-height: 20px;"><span style="font-weight: bolder;">Congratulations!</span> You are eligible for <br> Gwadar Gymkhana Membership</p>
        </div>
        <div class="claim-amount" style="border-radius: 3px; margin-top: 20px; color: white; background: rgb(220,19,53);
                                        background: linear-gradient(180deg, rgba(220,19,53,1) 0%, rgba(211,54,81,1) 100%);;">
            <p style="font-size: 25px; padding: 13px; font-weight: bolder; text-align: center;">Claim Your PKR 100,000/-</p>
        </div>
        <div class="redeeming" style="margin-top: 7px;">
            <?php 
                $today = new DateTime();
                $today->modify('+8 days');
                $expiry = $today->format('F j, Y');
            ?>
            <p style="font-size: 20px; text-align: center; font-weight: 600; color: #dc1335;">Redeem Before <?php echo $expiry ?>!</p>
        </div>
        <div class="terms&condition" style="margin-top: 20px; line-height: 20px;">
            <p style="font-weight: bold; font-size: 12px; margin-bottom: 8px;">Terms &amp; Conditions for Redeemable Offer:</p>
            <p style="font-size: 12px; margin-bottom: 8px;">1. This amount must be redeemed before it expires on <span style="font-weight: bold"><?php echo $expiry; ?></span>; after expiry, it cannot be used</p>
            <p style="font-size: 12px; margin-bottom: 8px;">2. It is strictly non-transferable and can only be used once per CNIC or Passport number. The same person cannot apply this amount again.</p>
            <p style="font-size: 12px; margin-bottom: 8px;">3. The amount is redeemable on all membership plans except Permanent Membership Special Edition.</p>
            <p style="font-size: 12px; margin-bottom: 8px;">4. For Permanent Membership Special Edition, only *PKR 35,000 is redeemable before expiry</p>
            <p style="font-size: 12px; margin-bottom: 8px;">5. The club reserves the right to modify or withdraw this offer at its discretion without</p>
        </div>
 
                
    </div>
       

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
