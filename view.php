<?php
session_start();

require 'admin/db_conn.php';
                if(isset($_GET['id']))
                        {
                            
                            $id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM form WHERE id='$id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                $date = $student['current'];

                                // Convert the date to a timestamp
                                $timestamp = strtotime($date);

                                // Format the date to 15 Jan 24 format
                                $formattedDate = date('d M Y', $timestamp);

                                $date_of_birth = $student ['dob'];
                                $timestamp2 = strtotime($date_of_birth);
                                // Format the date to 15 Jan 24 format
                                $dob = date('d M Y', $timestamp2);

                                // $incomeFormatted = number_format($student['income']);
                                ?>
                               



                               <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$student['name'], date(" d-M-Y");?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @media print{
                @page{
                    size: landscape !important; 
                    size: A5;
                    margin: 0 10px;
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
            /* img{
                vertical-align: middle;
            } */
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
    color: #8d847b;
}
    </style>
</head>
<body onload="window. print(); window.close(); ">
    <div class="container-fluid mt-4">
    <div class="bc-head-txt-label bc-head-icon-chrome_android"><?php echo $student['unique_key']; ?></div>
        <div class="header d-flex justify-content-between">
            <h1 class="mt-2"><span>Candidate's </span><br>Online Eligibility Report</h1>
            <!-- <img src="" alt=""> -->
            <img src="admin/Logo.png" alt="" class="img-fluid" width="180px">
        </div>
        <p class="my-2"><span style="font-weight: bold;">TERMS & CONDITION:</span> The Gwadar Gymkhana Club offers selective memberships for business professionals, including those in industrial and import-export sectors. Perfect for individuals involved in major projects within Gwadar Economic Zone, such as the construction of factories and hotels. It's also suited for those interested in Gwadar's tourism. Complete the eligibility form to apply. Suitable applicants will be contacted for membership details. By applying, you agree to our terms and confirm the accuracy of your information. Your personal data will be securely used for club-related communications only.</p>
        
        <table style="width: 100%;" class="mt-1">
            <tr>
                <td style="width: 40%;">
                    <label class="form-label">Full Name : </label>
                    <span><?php echo $student['name'];?></span>
                </td>
                <td style="width: 28%;">
                    <label class="form-label">CNIC / Passport No : </label>
                    <span><?php echo $student['passport'];?></span>
                </td>
                <td style="width: 15%;">
                    <label class="form-label">Gender : </label>
                    <span><?php echo $student['gender'];?></span>
                </td>
                <td style="width: 17%;">
                    <label class="form-label">DOB : </label>
                    <span><?php echo $dob;?></span>
                </td>
            </tr>
          
        </table>
        <table style="width: 100%;">
            <tr>
                <td style="width: 75%;">   
                    <label class="form-label">Residential Address : </label>
                    <span><?php echo $student['adress'];?></span>
                </td>
                <td style="width: 25%;">
                    <label class="form-label">City : </label>
                    <span><?php echo $student['city'];?></span>
                </td>
            </tr>
        </table>
        <table style="width: 100%;">
            <tr>
                <td style="width: 39%;">
                    <label class="form-label">Email : </label>
                    <span><?php echo $student['email'];?></span>
                </td>
                <td style="width: 19%;">
                    <label class="form-label">Mobile:</label>
                    <span><?php echo $student['mobile'];?></span>
                </td>
                <td style="width: 41%;">
                    <label class="form-label">Professional / Occupation : </label>
                    <span><?php echo $student['profession'];?></span>
                </td>
            </tr>
          
        </table>
        <table style="width: 100%;">
            <tr>
                <td style="width: 35%;">
                    <label class="form-label">Designation / Position : </label>
                    <span><?php echo $student['position'];?></span>
                </td>
                <td style="width: 35%;">
                    <label class="form-label">Organization Name : </label>
                    <span><?php echo $student['orginization'];?></span>
                </td>
            </tr>
          
        </table>
        <table style="width: 100%;">
            <tr>
                <td style="width: 100%;">
                    <label class="form-label">Monthly Income : </label>
                    <span>PKR. <?php echo $student['income'];?>/-</span>
                </td>
            </tr>
          
        </table>

                <table style="width:100%;">
                    <tr>
                        <td style="width:40%;">
                            <label class="my-1" style="text-transform: uppercase; line-height: 12px;  font-weight: bold;">I am a member of the following clubs or<br> professional body/bodies (if any) : </label>
                            <ul style="list-style-type: none; margin: 0; padding: 0; font-size: 9px; line-height: 15px;">
                                <li><span style="font-weight: 600; padding-right: 5px;">1. </span> <?php echo $student['clubs1'];?></li>
                                <li><span style="font-weight: 600; padding-right: 5px;">2. </span> <?php echo $student['clubs2'];?></li>
                                <li><span style="font-weight: 600; padding-right: 5px;">3. </span> <?php echo $student['clubs3'];?></li>
                                <li><span style="font-weight: 600; padding-right: 5px;">4. </span> <?php echo $student['clubs4'];?></li>
                            </ul>
                            <p class="mt-2 me-4" style="text-align: justify;">GWADAR GYMKHANA DOES NOT PROVIDE GENERAL DISCOUNTS BUT EXTENDS SUBSIDIES TO SPECIFIC CATEGORIES, INCLUDING ELIGIBLE FAMILY MEMBERS OF DECLARED MARTYRS FROM THE PAKISTAN ARMY, RECIPIENTS OF CIVILIAN AWARDS DECLARED BY THE GOVERNMENT, INDIVIDUALS WITH DISABILITIES, AND THOSE WHO HAVE EXCELLED ACADEMICALLY, ADDITIONALLY, SUBSIDIES ARE AVAILABLE FOR MEMBERS OF THE ARMY WHO HAVE BECOME DISABLED DUE TO THEIR SERVICES ANY OTHER SPECIAL CASES REQUIRE APPROVAL FROM THE MANAGING COMMITTEE THE SUBSIDY GRANTED IS BETWEEN 5% TO 25% BASED ON INDIVID UAL CIRCUMSTANCES.</p>
                            <div class="subsidy mt-2" style="line-height: 12px;">
                                <label class="form-label">Candidate Applying for Subsidy:</label>
                                <span><?php echo $student['applying'];?></span>
                            </div>
                            <div class="date" style="line-height: 12px;">
                                <label class="form-label">Date of Submission:</label>
                                <span><?php echo $formattedDate;?></span>
                            </div> 
                        </td>
                        <td style="width:60%;">
                            <div class="question">
                                <label class="form-label" style="text-transform: uppercase; font-size: 9px;">What are your plans or goals for your time in Gwadar in the near future?</label>
                                
                                <textarea class="plans-goals" row="20" style="width:100%; height:100px; border: none; background:none;" disabled><?php echo $student['seeking'];?></textarea> 
                            </div>
                            <table class="my-2" style="width: 100%;">
                                <tr>
                                    <td style="width: 50%;">
                                        <input type="checkbox" class="form-check-input" name="checkBox2" >
                                        <label class="form-check-label" for="candidate_eligible">Candidate Eligible</label>
                                    </td>
                                    <td style="width: 50%;">
                                        <input class="form-check-input" type="checkbox" id="candidate_not_eligible">
                                <label class="form-check-label" for="candidate_not_eligible">Candidate Not Eligible</label>
                                    </td>
                                </tr>
                            </table>
                            <div class="form-section my-3">
                                <label class="form-box">Remarks</label>
                            </div>
                                <div class="form-section my-3">
                                    <label class="form-box">Sign & Stamp</label>
                                </div>
                        </td>
                    </tr>
                </table>
                
    </div>
       

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>

</body>
</html>
