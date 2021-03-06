<?php
include_once ('../../../../../vendor/autoload.php');
use App\Utility\Utility;
use App\Message\Message;
if(!isset($_SESSION)) session_start();
if(isset($_POST['Button'])){
    $c_Id = $_POST['C_id'];
    $date = $_POST['Date'];
    $first_Name = $_POST['first_Name'];
    $last_Name = $_POST['last_Name'];
    $location = $_POST['location'];
    $fees = $_POST['fees'];
}
else{
    Utility::redirect('../../../../../index.php');// ekhane add korbo
    return;
}
?>




<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link href="../../../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../../../../../resources/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="../../../../../resources/css/signupform.css" rel="stylesheet"/>
    <link href="../../../../../resources/validator/css/bootstrapValidator.min.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="../../../../../resources/image/android-icon-192x192.png" type="image/x-icon">
    <link rel="icon" href="../../../../../resources/image/android-icon-192x192.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/animate.css-master/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/css/commonnav.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/css/commonfooter.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/css/frontpagestyle.css">
    <script type="text/javascript" src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <style> .error {color: #FF0000;} </style>

</head>

    <body style="background: radial-gradient(#ffffff,#aed0ea)">
    <header>
        <div class="container">
            <div class="col-lg-10"><img src="../../../../../resources/image/headlogo.png" alt="header_logo"></div>
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
                <li><a href="../../index.php"><i class="fa fa-key"></i> Doctor login</a></li>
                <li><a href="about.php"><i class="fa fa-info"></i> About</a></li>
                <li><a href="contact_us.php"><i class="fa fa-phone"></i> Contact us</a></li>
            </ul>
        </div>
    </header>

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

<div class="container">

    <form class="well form-horizontal"  action="create_appointment_post.php"   method="post" id="contact_form">

        <fieldset>
            <legend class="text-center">Create Appointent here!</legend>

            <input type="hidden" name="appointment_id">


            <input type="hidden" name="c_id" value="<?php echo $c_Id?>">
            <input type="hidden" name="first_Name" value="<?php echo $first_Name?>">
            <input type="hidden" name="last_Name" value="<?php echo $last_Name?>">
            <input type="hidden" name="location" value="<?php echo $location?>">
            <input type="hidden" name="fees" value="<?php echo $fees?>">


            <div class="input-group">
                <input  name="date"  class="form-control"  type="hidden" value="<?php echo $date?>">
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  name="name"  class="form-control"  type="text" required="">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label">Age</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-adjust"></i></span>
                        <input name="age" class="form-control"  type="number" required="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Gender</label>
                <div class="col-md-4">
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" value="male" /> Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" value="female" /> Female
                        </label>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="example@gmail.com" class="form-control"  type="text" required="">
                    </div>
                </div>
            </div>




            <div class="form-group">
                <label class="col-md-4 control-label">Phone number</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="mobile_no"  class="form-control" type="number" required="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Address</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="address" placeholder="Address" class="form-control" type="text" required="">
                    </div>
                </div>
            </div>




            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" name="something" class="btn btn-warning" >Submit <span class="glyphicon glyphicon-send"></span></button>
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
<script src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
<script src="../../../../../resources/js/popper.min.js"></script>
<script src="../../../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="../../../../../resources/js/signup.js"></script>
<script type="text/javascript" src="../../../../../resources/validator/js/bootstrapValidator.min.js"></script>




<script type="text/javascript">
    $(document).ready(function() {
        // Generate a simple captcha
        function randomNumber(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        };
        $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

        $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {


                name: {
                    group: '.col-lg-4',
                    validators: {
                        notEmpty: {
                            message: 'The first name is required and cannot be empty'
                        }
                    }
                },


                age: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required and cannot be empty'
                        },
                        identical: {
                            field: 'confirmPassword',
                            message: 'The password and its confirm are not the same'
                        },
                        different: {
                            field: 'username',
                            message: 'The password cannot be the same as username'
                        }
                    }
                },


                gender: {
                    validators: {
                        notEmpty: {

                            message: 'This field cannot be empty'
                        }
                    }
                },




                email: {
                    validators: {
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        }
                    }
                },

                mobile_no: {
                    validators: {
                        notEmpty: {

                            message: 'This field cannot be empty'
                        }
                    }
                }

            });

        $('#resetBtn').click(function() {
            $('#defaultForm').data('bootstrapValidator').resetForm(true);
        });
    </script>
<script>
    $('.something').fadeIn(6000).delay(3000);
    $('.something').fadeOut(2000);
</script>
</body>

</html>