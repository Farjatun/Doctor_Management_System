<?php
include_once ('../../../../../vendor/autoload.php');
use App\Utility\Utility;
if(isset($_POST['bton'])){
    $did = $_POST['d_Id'];
}
else{
    Utility::redirect('../../index.php');
    return;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chamber</title>
    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">


    <link rel="shortcut icon" href="../../../../../resources/image/android-icon-192x192.png" type="image/x-icon">
    <link rel="icon" href="../../../../../resources/image/android-icon-192x192.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/animate.css-master/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/css/commonnav.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/css/commonfooter.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/css/frontpagestyle.css">
    <link rel="stylesheet" href="../../../../../resources/css/jquery.timepicker.min.css">
    <script type="text/javascript" src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


</head>
<body style="background: radial-gradient(#ffffff,#aed0ea)">



<header>
    <div class="container">
        <div class="col-lg-10"><img src="../../../../../resources/image/headlogo.png" alt="header_logo"></div>
        <div class="col-lg-2" style="padding-top: 10px"><a href="signup.php">Register as a DOCTOR</a></div>
    </div>

    <div class="navigation">
        <ul>
            <li><a href="../../../../../index.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href=""><i class="fa fa-search"></i> Find doctor <i class="fa fa-caret-down"></i></a>

                <ul>
                    <li><a href="website_main_index.php?workingfield=Medicine"><i class="fa fa-briefcase"></i> Medicine</a></li>
                    <li><a href="website_main_index.php?workingfield=Child Specialist"><i class="fa fa-child"></i> Child Specialist</a></li>
                    <li><a href="website_main_index.php?workingfield=Dentist"><i class="fa fa-pencil"></i> Dentist</a></li>
                    <li><a href="website_main_index.php?workingfield=ENT Specialist"><i class="fa fa-wrench"></i> ENT Specialist</a></li>
                    <li><a href="website_main_index.php?workingfield=Cardiologist"><i class="fa fa-heart"></i> Cardiologist</a></li>
                    <li><a href="website_main_index.php?workingfield=Neurologist"><i class="fa fa-user"></i> Neurologist</a></li>
                    <li><a href="website_main_index.php?workingfield=Eye Specialist"><i class="fa fa-eye"></i> Eye Specialist</a></li>
                    <li><a href="website_main_index.php?workingfield=Gynaecologist"><i class="fa fa-gift"></i> Gynaecologist</a></li>
                    <li><a href="website_main_index.php?workingfield=Skin & Venereal diseases"><i class="fa fa-gift"></i> Skin & Venereal diseases</a></li>
                    <li><a href="website_main_index.php?workingfield=Chest and Respiratory Medicine"><i class="fa fa-gift"></i> Chest and Respiratory Medicine</a></li>
                    <li><a href="website_main_index.php?workingfield=General Surgery"><i class="fa fa-gift"></i> General Surgery</a></li>
                    <li><a href="website_main_index.php?workingfield=Urology"><i class="fa fa-gift"></i> Urology</a></li>
                    <li><a href="website_main_index.php?workingfield=Nephrology"><i class="fa fa-gift"></i> Nephrology</a></li>
                </ul>
            </li>
            <li><a href="mobile.php"><i class="fa fa-mobile"></i> Mobile Services</a></li>
            <li><a href="../../../RHYTHM/index.php"><i class="fa fa-key"></i> Doctor login</a></li>
            <li><a href="../../../RHYTHM/User/Profile/about.php"><i class="fa fa-info"></i> About</a></li>
            <li><a href="../../../RHYTHM/User/Profile/contact_us.php"><i class="fa fa-phone"></i> Contact us</a></li>
        </ul>
    </div>
</header>





<div class="container text-center">
    <h1 style="color: #5bc0de">Create Chamber</h1>
<form action="chamberpost.php" method="post" class="form-horizontal" style="margin-top: 50px;padding-top: 50px;padding-bottom: 50px;border-top: 2px solid #28a4c9">
    <fieldset>
        <input type="hidden" name="c_id">
        <input type="hidden" name="d_id" value="<?php  echo $did ?>">
        <div class="form-group">
        <level for="chamber_name" class="col-lg-3">Chamber Name</level>
            <div class="col-lg-5">
        <input type="text" name="chamber_name" placeholder="Chamber"  class="form-control">
            </div>
        </div>

        <div class="form-group">
            <level for="chamber_location" class="col-lg-3">Chamber Location</level>
            <div class="col-lg-5">
            <input type="text" name="chamber_location" placeholder="Location" class="form-control" id="location">
            </div>
            </div>

        <div class="form-group">
            <level for="phone_number" class="col-lg-3">Phone Number</level>
            <div class="col-lg-5">
            <input type="number" name="phone_number" placeholder="Phone" class="form-control">
        </div>
        </div>

        <div class="form-group">
            <level for="time" class="col-lg-3">Time</level>
            <div class="col-lg-2">
                <input type="text" name="timeto"  class="form-control time"> to <input type="text" name="time" class="form-control time">
            </div>
        </div>

        <div class="form-group">
            <level for="working dates" class="col-lg-3">Working date</level>
            <div class="col-lg-5">
                <level class="col-lg-3">Saturday</level><input  name="Day[]" class="col-lg-5" type="checkbox" value="Saturday"><br>
                <level class="col-lg-3">Sunday</level><input  name="Day[]" class="col-lg-5" type="checkbox" value="Sunday"><br>
                <level class="col-lg-3">Monday</level><input  name="Day[]" class="col-lg-5" type="checkbox" value="Monday"><br>
                <level class="col-lg-3">Tuesday</level><input name="Day[]" class="col-lg-5" type="checkbox" value="Tuesday" ><br>
                <level class="col-lg-3">Wednesday</level><input name="Day[]" class="col-lg-5" type="checkbox" value="Wednesday"><br>
                <level class="col-lg-3">Thursday</level><input name="Day[]" class="col-lg-5" type="checkbox" value="Thursday"><br>
                <level class="col-lg-3">Friday</level><input name="Day[]" class="col-lg-5" type="checkbox" value="Friday"><br>
        </div>
        </div>

        <div class="form-group">
            <level for="phone_number" class="col-lg-3">Max Appoint Day</level>
            <div class="col-lg-5">
            <select name="max_appointment_day" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            </div>
        </div>

        <div class="form-group">
            <level for="patient limit" class="col-lg-3">Max Patient Limit</level>
            <div class="col-lg-5">
            <select name="patient_limit" class="form-control">
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
                <option value="60">60</option>
                <option value="70">70</option>
                <option value="80">80</option>
                <option value="90">90</option>
                <option value="100">100</option>
                <option value="150">150</option></select>
        </div>
        </div>
        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i>&nbsp;Create Chamber</button>
    </fieldset>

</form>
</div>




<footer class="text-center footer">
    <div class="follow"><h4 style="text-decoration: none">Follow us</h4>
        <div class="arrowdown"><i class="fa fa-angle-double-down"></i></div></div>
    <div class="container text-center socialdiv">
        <div class="socials"><i class="fa fa-facebook fa-2x"></i></div>
        <div class="socials"><i class="fa fa-twitter fa-2x"></i></div>
        <div class="socials"><i class="fa fa-pinterest fa-2x"></i></div>
    </div>
    <p> Copyright &copy; <?php echo date('Y');?> DOCTOR MANAGEMENT SYSTEM. Powered by BITM TEAM RHYTHM all rights reserved.</p>
</footer>



<script type="text/javascript" src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwyZimvA9z_SzFmL55fpJSoeYrloU6RF4&libraries=places">
</script>
<script>
    var SearchBox = new google.maps.places.SearchBox(document.getElementById('location'));
</script>
<script type="text/javascript" src="../../../../../resources/js/jquery.timepicker.min.js"></script>
<script type="text/javascript">
    $('.time').timepicker();
</script>
</body>
</html>