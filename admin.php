<?php

include_once('vendor/autoload.php');

if(!isset($_SESSION) )session_start();

use App\Message\Message;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">

    <link rel="shortcut icon" href="resources/image/android-icon-192x192.png" type="image/x-icon">
    <link rel="icon" href="resources/image/android-icon-192x192.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="resources/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resources/animate.css-master/animate.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/commonnav.css">
    <link rel="stylesheet" type="text/css" href="resources/css/commonfooter.css">
    <link rel="stylesheet" href="resources/jquery-ui-1.12.1.custom/jquery-ui.min.css">


    <style>
        .fa{color: white}
    </style>
</head>
<body style="background: url('resources/image/69096361-medical-wallpapers.jpg')no-repeat;background-size:cover">
<header>
    <div class="container">
        <div class="col-lg-10"><img src="resources/image/headlogo.png" alt="header_logo"></div>
        <div class="col-lg-2" style="padding-top: 10px"><a href="views/IIUC/RHYTHM/User/Profile/signup.php">Register as a DOCTOR</a></div>
    </div>

    <div class="navigation">
        <ul>
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href=""><i class="fa fa-search"></i> Find doctor <i class="fa fa-caret-down"></i></a>

                <ul>
                    <li><a href="views/IIUC/RHYTHM/User/Profile/website_main_index.php?workingfield=Medicine"><i class="fa fa-briefcase"></i> Medicine</a></li>
                    <li><a href="views/IIUC/RHYTHM/User/Profile/website_main_index.php?workingfield=Child Specialist"><i class="fa fa-child"></i> Child Specialist</a></li>
                    <li><a href="views/IIUC/RHYTHM/User/Profile/website_main_index.php?workingfield=Dentist"><i class="fa fa-pencil"></i> Dentist</a></li>
                    <li><a href="views/IIUC/RHYTHM/User/Profile/website_main_index.php?workingfield=ENT Specialist"><i class="fa fa-wrench"></i> ENT Specialist</a></li>
                    <li><a href="views/IIUC/RHYTHM/User/Profile/website_main_index.php?workingfield=Cardiologist"><i class="fa fa-heart"></i> Cardiologist</a></li>
                    <li><a href="views/IIUC/RHYTHM/User/Profile/website_main_index.php?workingfield=Neurologist"><i class="fa fa-user"></i> Neurologist</a></li>
                    <li><a href="views/IIUC/RHYTHM/User/Profile/website_main_index.php?workingfield=Eye Specialist"><i class="fa fa-eye"></i> Eye Specialist</a></li>
                    <li><a href="views/IIUC/RHYTHM/User/Profile/website_main_index.php?workingfield=Gynaecologist"><i class="fa fa-gift"></i> Gynaecologist</a></li>
                    <li><a href="views/IIUC/RHYTHM/User/Profile/website_main_index.php?workingfield=Skin & Venereal diseases"><i class="fa fa-gift"></i> Skin & Venereal diseases</a></li>
                    <li><a href="views/IIUC/RHYTHM/User/Profile/website_main_index.php?workingfield=Chest and Respiratory Medicine"><i class="fa fa-gift"></i> Chest and Respiratory Medicine</a></li>
                    <li><a href="views/IIUC/RHYTHM/User/Profile/website_main_index.php?workingfield=General Surgery"><i class="fa fa-gift"></i> General Surgery</a></li>
                    <li><a href="views/IIUC/RHYTHM/User/Profile/website_main_index.php?workingfield=Urology"><i class="fa fa-gift"></i> Urology</a></li>
                    <li><a href="views/IIUC/RHYTHM/User/Profile/website_main_index.php?workingfield=Nephrology"><i class="fa fa-gift"></i> Nephrology</a></li>
                </ul>
            </li>
            <li><a href="views/IIUC/RHYTHM/User/Profile/mobile.php"><i class="fa fa-mobile"></i> Mobile Services</a></li>
            <li><a href="index.php"><i class="fa fa-key"></i> Doctor login</a></li>
            <li><a href="views/IIUC/RHYTHM/User/Profile/about.php"><i class="fa fa-info"></i> About</a></li>
            <li><a href="views/IIUC/RHYTHM/User/Profile/contact_us.php"><i class="fa fa-phone"></i> Contact us</a></li>
        </ul>
    </div>
</header>
<div class="container" >
    <div class="text-center">

        <?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>

            <div  id="message" class="form button"   style="font-size: smaller  " >
                <center>
                    <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                        echo "&nbsp;".Message::message();
                    }
                    Message::message(NULL);
                    ?></center>
            </div>
        <?php } ?>
    </div>
<div class="text-center"><h1  class="btn-info" style="font-family: 'Monotype Corsiva';font-weight: bold">Admin Login</h1></div>
<div class="text-center bg-success">

    <form action="views/IIUC/RHYTHM/Admin/Authentication/login.php" method="post" class="form-horizontal" style="border-top: 2px solid #2e6da4;padding-top: 100px;padding-bottom: 200px">
        <i class="fa fa-user-circle-o fa-5x text-center" aria-hidden="true"></i><br><br>
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
                    </div>
                </div>
            </div>


            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Password</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input name="password" placeholder="Enter password" class="form-control" type="password">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-info" >Log In <span class="glyphicon glyphicon-log-in"></span></button>
                </div>

</div>
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
        <p> Copyright &copy; <?php echo date('Y');?> DOCTOR MANAGEMENT SYSTEM. Powered by Shakil & Touhid .</p>
    </footer>
    <script type="text/javascript" src="resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script>
        $('.something').fadeIn(6000).delay(3000);
        $('.something').fadeOut(2000);
    </script>
</body>
</html>