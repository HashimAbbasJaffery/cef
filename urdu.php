<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+po0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Neuton:wght@200;300;800&display=swap');
* {
  box-sizing: border-box;
}

body {
  background-color: #f6f5f3;
}

#regForm {
  background-color: #f6f5f3;
  margin: 150px auto;
  border-radius: 5px;
  font-family: "Neuton", Sans-serif;
  padding: 70px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}
@media screen and (max-width: 600px) {
  h1 {
    font-size: 25px;
  }
}
img{
  width: 300px;
  display: block;
}
@media screen and (max-width: 600px) {
  img {
    width: 150px;
    height: 50px;
  }
}
@media screen and (max-width: 600px) {
 #regForm {
    background-color: #f6f5f3;
    position: relative;
    margin-top: -3%;
    border-radius: 5px;
    font-family: "Neuton", Sans-serif;
    padding: 20px;
    width: 100%;
    min-width: 300px;
  }
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: "Neuton", Sans-serif;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that get an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  width: 100px;
  padding-top: 10px;
  padding-bottom: 10px;
  font-size: 17px;
  font-family: 'Neuton', serif;
  cursor: pointer;
  margin: 10px;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 8px;
  width: 8px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
h1 {
  font-family: 'Neuton', serif;
  text-align: center;
  position: relative;
  left: 20%;
}

header {
  padding: 10px;
  text-align: center;
  position: fixed;
  width: 100%;
  z-index: 1000;
}

/* Desktop Header Styles */
.desktop-header {
  background: rgba(300, 255, 255, 0.96);
  transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
  height: 85px;
  position: fixed;
}

.desktop-header .logo {
  display: inline-block;
  margin: 10px;
  float: left;
  margin-left: 23%;
}

.logo img {
  width: 60px; /* Set your desired width */
  height: auto;
}

.desktop-header .menu {
  float: right;
  margin: 15px;
  margin-right: 25%;
}

.menu h1 {
  font-size: 25px;
  top: 12px;
}

/* Mobile Header Styles */
.mobile-header {
  background-color: transparent;
  display: none;
}

@media only screen and (max-width: 768px) {
  header {
    padding: 10px;
    text-align: center;
    position: fixed;
    width: 100%;
    z-index: 1000;
  }

  .desktop-header {
    background: rgba(300, 255, 255, 0.96);
    transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
    height: 85px;
    position: fixed;
  }

  .desktop-header img {
    width: 80px;
    height: 60px;
    position: relative;
    right: 400%;
  }

  .desktop-header h1 {
    font-size: 30px;  
    float: right;
    position: relative;
    margin-top: 20px;
  }

  .mobile-header {
    display: none;
  }

  body {
    background-color: #f6f5f3;
  }

  header {
    padding: 5px;
  }

  .desktop-header {
    display: none; /* Hide on mobile */
  }

  .mobile-header {
    display: block; /* Display on mobile */
    padding: 15px;
    background: rgba(300, 255, 255, 0.96);
    transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
    height: 55px;
    position: fixed;
    top: 0; 
  }

  .col-4 img {
    width: 40px;
    height: 30px;
  }

  .col-8 h1 {
    float: left;
    font-size: 20px;
    position: relative;
    left: 35px;
    top: 2px;
  }

  .applying {
    position: relative;
    margin-left: 20%;
  }
}
</style>
</head>

<body>
  <header class="desktop-header">
    <div class="logo">
      <a href="https://gwadargymkhana.com.pk">
        <img src="images/gg.png" alt="Logo">
      </a>
    </div>
    <div class="menu">
      <h1>Candidate Eligibility Form</h1>
    </div>
  </header>

  <header class="mobile-header">
    <div class="row">
      <div class="col-4 col-md-2">
        <img id="MDB-logo" src="images/gg.png" alt="MDB Logo" draggable="false" height="100"/>
      </div>
      <div class="col-8 col-md-4">
        <h1>Candidate Eligibility Form</h1>
      </div>
    </div>
  </header>

  <br><br><br>

  <form id="regForm" onsubmit="return validateForm()" method="post" action="insert.php">
    <!-- Step 1 Start -->
    <div class="tab">
    <p class="text-justify">
  <!--<input type="text" name="current" class="tcal" value="<?php echo date("m/d/Y"); ?>"  /> -->
<br>
<br>

    <b>شرائط و ضوابط:</b> گوادر جم خانہ کلب کاروباری پیشہ ور افراد اور ایگزیکٹوز کے لیے خصوصی، محدود رکنیت پیش کرتا ہے،
    جن میں صنعت کار اور امپورٹ ایکسپورٹ کے ماہرین شامل ہیں۔ ترقی پذیر جیسے اہم منصوبوں میں شامل افراد کے لیے مثالی۔
    گوادر اکنامک زون میں فیکٹریاں اور ہوٹل، ہمارا کلب صنعت کے بااثر لیڈروں کا مرکز ہے۔ شامل ہونے کے لیے، مکمل کریں۔
    اہلیت فارم. ہدایت یافتہ رکنیت کے عمل کے لیے اہل افراد سے رابطہ کیا جائے گا۔ آگے بڑھ کر، آپ
    ہماری شرائط سے اتفاق کریں اور اپنی معلومات کی درستگی کو یقینی بنائیں۔ آپ کی ذاتی تفصیلات صرف کے لیے محفوظ طریقے سے استعمال کی جائیں گی۔
    ہماری مصنوعات اور خدمات کے بارے میں مواصلات۔
    </p>
    <p class="text-center" style='color:red;'>
   پڑھا، سمجھا اور اتفاق کیا۔
    </p>
    </div>
    <!-- Step 1 End -->
    <!-- Step 2 Start -->
    <div class="tab">
    <p>
        <label for="">پورا نام <span style='color:red; width:50px;'>&#8727;	</span></label>
        <input type='text' placeholder="...پورا نام"  name="name" required class="form_input">
    </p>
    <p>
        <label for="">صنف  <span style='color:red; width:50px;'>&#8727;	</span></label>  
         <select name="gender" id="gender" style="width:100%; border: 1px solid #aaaaaa; padding: 10px;" >
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
</p>
   
    <p>
        <label for="">پیدائش کی تاریخ  <span style='color:red; width:50px;'>&#8727;	</span></label>
        <input type="date" oninput="this.className" name="dob" required class="form_input">
    </p>
        
    </div>
    <!-- Step 2 End -->
    <!-- Step 3 Start -->
    <div class="tab">
    <p>
    <label for="">شناختی کارڈ / پاسپورٹ نمبر  <span style='color:red; width:50px;'>&#8727;	</span></label>
    <input type="number" placeholder="شناختی کارڈ / پاسپورٹ نمبر"  name="passport" required class="form_input">    
    <p>
    <label for="">رہائشی پتہ۔  <span style='color:red; width:50px;'>&#8727;	</span></label>
    <input type="text" placeholder="رہائشی پتہ۔"  name="adress" required class="form_input"><br><br>
     <label for="">شہر  <span style='color:red; width:50px;'>&#8727;	</span></label>
    <input placeholder="شہر کا نام"  name="city" required class="form_input"> 
    </p>
    </p>
    </div>
    <!-- Step 3 End -->
    <!-- Step 4 Start -->
    <div class="tab">
    <p>
    <label for="">ای میل اڈریس.
  <span style='color:red; width:50px;'>&#8727;	</span></label>
    <input type="email" placeholder="ای میل اڈریس.
."  name="email" required class="form_input"> 
    </p>

    <p>
    <label for="">موبائل فون کانمبر.  <span style='color:red; width:50px;'>&#8727;	</span></label>
    <input type="number" placeholder="موبائل فون کانمبر."  name="mobile" required class="form_input"> 
    </p>
    </div>
    <!-- Step 4 End -->
    <!-- Step 5 Start -->
    <div class="tab">
    <p>
    <label for="">پیشہ <span style='color:red; width:50px;'>&#8727;</span></label>
    <input placeholder="...پیشہ"  name="profession" required class="form_input"> 
    </p>

    <p>
    <label for="">عہدہ   <span style='color:red; width:50px;'>&#8727;</span></label>
    <input placeholder="عہدہ"  name="position" required class="form_input"> 
    </p>

    <p>
    <label for="">تنظیم کا نام <span style='color:red; width:50px;'>&#8727;</span></label>
    <input placeholder="تنظیم کا نام"  name="orginization" required class="form_input"> 
    </p>
    <p>
    <label for="">ماہانہ آمدنی  <span style='color:red; width:50px;'>&#8727;	</span></label>
    <input type="text" placeholder="ماہانہ آمدنی"  name="income" id="incomeInput" required class="form_input"> 
    </p>
    </div>
    <!-- Step 5 End -->
     <!-- Step 6 Start -->
    <div class="tab">
    <p>
    <label for="">میں درج ذیل کلبوں یا پیشہ ورانہ باڈی/باڈیز کا ممبر ہوں (اگر کوئی ہے)؛	</label>
    <br>
    </p>
    
    <p>
    <input   name="clubs1" placeholder='کلب کا نام 1'> <br><br>
    <input   name="clubs2"   placeholder='کلب کا نام 2'> <br><br>
    <input  name="clubs3"  placeholder='کلب کا نام 3'><br><br>
    <input  name="clubs4"  placeholder='کلب کا نام 4' > 
    </p>
    </div>
    <!-- Step 6 End -->
    <!-- Step 7 Start -->
    <div class="tab">
    <p>
    <label for="">مستقبل قریب میں گوادر میں آپ کے وقت کے لیے آپ کے کیا منصوبے یا اہداف ہیں؟ <span style='color:red; width:50px;'>&#8727;	</span></label><br>
    <textarea class="form-control" rows="6" name="seeking" class="form_input"></textarea>
    </p>
    </div>
    <!-- Step 7 End -->
     <!-- Step 8 Start -->
      <div class="tab">
      <p class="text-justify">
   <b>براہ مہربانی نوٹ کریں:</b> گوادر جم خانہ عام رعایت نہیں دیتا لیکن مخصوص زمروں میں سبسڈی دیتا ہے، بشمول پاک فوج کے اعلان کردہ شہداء کے اہل خاندان، حکومت کی طرف سے اعلان کردہ سویلین ایوارڈز کے وصول کنندگان، معذور افراد اور تعلیمی لحاظ سے بہترین کارکردگی کا مظاہرہ کرنے والے افراد۔ مزید برآں، فوج کے ان ارکان کے لیے سبسڈیز دستیاب ہیں جو اپنی خدمات کی وجہ سے معذور ہو گئے ہیں۔ کسی بھی دیگر خصوصی معاملات کے لیے انتظامی کمیٹی سے منظوری درکار ہوتی ہے۔ دی گئی سبسڈی انفرادی حالات کی بنیاد پر 5% سے 25% کے درمیان ہے۔
    </p>
    
    <p>
        <label for="" class="applying"><b>میں سبسڈی کے لیے درخواست دے رہا ہوں۔</b></label>
        <select value="No" name="applying" id="gender" style="width:100%; border: 1px solid #aaaaaa; padding: 10px;">
              <option value="no">No</option>
    <option value="yes">Yes</option>

</select>
    </p>
      </div>
     <!-- Step 8 End -->

    <!-- Navigation Buttons -->
    <div style="overflow:auto;">
      <div class="text-center">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        <button type="submit" id="submitBtn" style="display:none;">Submit</button>
      </div>
    </div>

    <!-- Step Indicators -->
    <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
    </div>
  </form>

  <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").style.display = "none";
        document.getElementById("submitBtn").style.display = "inline";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
        document.getElementById("nextBtn").style.display = "inline";
        document.getElementById("submitBtn").style.display = "none";
      }
      //... and run a function that displays the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByClassName("form_input");

  // Remove existing error messages
  var existingErrors = x[currentTab].getElementsByClassName("error-message");
  while (existingErrors.length > 0) {
    existingErrors[0].parentNode.removeChild(existingErrors[0]);
  }

  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // Show validation message
      var errorMessage = document.createElement("p");
      errorMessage.className = "error-message";
      errorMessage.textContent = "This field is required.";
      y[i].parentNode.insertBefore(errorMessage, y[i].nextSibling);
      // and set the current valid status to false:
      valid = false;
    } else {
      // Remove the "invalid" class if the field is not empty
      y[i].className = y[i].className.replace(" invalid", "");
    }

    // Check for specific field validation:
    if (y[i].name == "email" && !validateEmail(y[i].value)) {
      y[i].className += " invalid";
      var errorMessage = document.createElement("p");
      errorMessage.className = "error-message";
      errorMessage.textContent = "Please enter a valid email address.";
      y[i].parentNode.insertBefore(errorMessage, y[i].nextSibling);
      valid = false;
    }

    if ((y[i].name == "phone_office" || y[i].name == "phone_residence" || y[i].name == "mobilenumber") && !validatePhoneNumber(y[i].value)) {
      y[i].className += " invalid";
      var errorMessage = document.createElement("p");
      errorMessage.className = "error-message";
      errorMessage.textContent = "Please enter a valid phone number.";
      y[i].parentNode.insertBefore(errorMessage, y[i].nextSibling);
      valid = false;
    }
  }

  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function validateEmail(email) {
  var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  return emailPattern.test(email);
}

function validatePhoneNumber(phone) {
  var phonePattern = /^\d{10,15}$/; // Allows 10 to 15 digits
  return phonePattern.test(phone);
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

// Get the input element
var incomeInput = document.getElementById('incomeInput');

// Add event listener for input event
incomeInput.addEventListener('input', function(event) {
  // Remove existing commas and non-numeric characters
  var value = event.target.value.replace(/[^\d]/g, '');

  // Add commas every three digits from the right
  var formattedValue = '';
  while (value.length > 3) {
    formattedValue = ',' + value.slice(-3) + formattedValue;
    value = value.slice(0, -3);
  }
  formattedValue = value + formattedValue;

  // Update the input value
  event.target.value = formattedValue;
});


  </script>
</body>
</html>
