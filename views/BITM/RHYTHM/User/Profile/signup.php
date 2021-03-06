<?php
include_once('../../../../../vendor/autoload.php');

if(!isset($_SESSION) )session_start();

use App\Message\Message;


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <title>Doctor Registration form</title>
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
            <li><a href="../../../RHYTHM/index.php"><i class="fa fa-key"></i> Doctor login</a></li>
            <li><a href="../../../RHYTHM/User/Profile/about.php"><i class="fa fa-info"></i> About</a></li>
            <li><a href="../../../RHYTHM/User/Profile/contact_us.php"><i class="fa fa-phone"></i> Contact us</a></li>
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
    <form id="defaultForm" action="registration.php" method="post" class="form-horizontal">

       <div class="wizards">
            <div class="progressbar">
                <div class="progress-line" data-now-value="12.11" data-number-of-steps="5" style="width: 12.11%;"></div>
            </div>
            <div class="form-wizard active">
                <div class="wizard-icon"><i class="fa fa-file-text-o"></i></div>
                <p>License</p>
            </div>
            <div class="form-wizard">
                <div class="wizard-icon"><i class="fa fa-key"></i></div>
                <p>Account</p>
            </div>
            <div class="form-wizard">
                <div class="wizard-icon"><i class="fa fa-user"></i></div>
                <p>About</p>
            </div>
            <div class="form-wizard">
                <div class="wizard-icon"><i class="fa fa-info"></i></div>
                <p>Working Info</p>
            </div>
            <div class="form-wizard">
                <div class="wizard-icon"><i class="fa fa-warning"></i></div>
                <p>Finish</p>
            </div>
        </div>
        <fieldset>
            <iframe src="license.txt"></iframe>
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="yes"> I agree with this license
            </label>
            <div class="wizard-buttons">
                <button type="button" class="btn btn-next">Next</button>
            </div>
        </fieldset>




        <fieldset>
            <div class="form-group">
                <label class="col-lg-3 control-label">Full name</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="firstName" placeholder="First name" />
                </div>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="lastName" placeholder="Last name" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-5">
                    <input type="hidden" class="form-control" name="id" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Email address</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control" name="email" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Password</label>
                <div class="col-lg-5">
                    <input type="password" class="form-control" name="password" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Retype password</label>
                <div class="col-lg-5">
                    <input type="password" class="form-control" name="confirmPassword" />
                </div>
            </div>
            <div class="wizard-buttons">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="button" class="btn btn-next">Next</button>
            </div>
        </fieldset>
        <fieldset>

            <div class="form-group">
                <label class="col-lg-3 control-label" for="exampleFormControlSelect1">Working Field</label>
                <div class="col-lg-5">
                <select class="form-control" name="workingfield" id="exampleFormControlSelect1">
                    <option>Medicine</option>
                    <option>Child Specialist</option>
                    <option>Dentist</option>
                    <option>ENT Specialist</option>
                    <option>Cardiologist</option>
                    <option>Neurologist</option>
                    <option>Eye Specialist</option>
                    <option>Gynaecologist</option>
                    <option>Skin & Venereal diseases</option>
                    <option>Chest and Respiratory Medicine</option>
                    <option>General Surgery</option>
                    <option>Urology</option>
                    <option>Nephrology</option>
                    
                </select>
                </div>
            </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Designation</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="designation" /><br>
                        <small id="help" class="form-text text-muted">Put you designations using(',') format</small>
                    </div>
                </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">BMDC NUMBER</label>
                <div class="col-lg-5">
                    <input type="number" class="form-control" name="Bmdc" />
                </div>
            </div>




            <div class="wizard-buttons">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="button" class="btn btn-next">Next</button>
            </div>

</fieldset>
        <fieldset>
            <div class="form-group">
                <label class="col-lg-3 control-label">Fees</label>
                <div class="col-lg-5">
                    <input type="number" class="form-control" name="fees" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Working Experience</label>
                <div class="col-lg-5">
                    <input type="number" class="form-control" name="experienceyear" /><br>
                    <small id="help" class="form-text text-muted">Amount in year</small>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Discounted Fees</label>
                <div class="col-lg-5">
                    <input type="number" class="form-control" name="discounter_fees" />
                </div>
            </div>


            <div class="wizard-buttons">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="button" class="btn btn-next">Next</button>
            </div>
        </fieldset>
        <fieldset>
            <div class="text-center">
               <h1 class="alert-success">Please re-check the whole input field.</h1>
                <h2 class="alert-info">We will review your request and post our website if your given information is correct</h2>
            </div>

            <div class="wizard-buttons">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="submit" name="save" class="btn btn-primary btn-submit">Submit</button>
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
    <p> Copyright &copy; <?php echo date('Y');?> DOCTOR MANAGEMENT SYSTEM. Powered by BITM TEAM RHYTHM all rights reserved.</p>
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
                firstName: {
                    group: '.col-lg-4',
                    validators: {
                        notEmpty: {
                            message: 'The first name is required and cannot be empty'
                        }
                    }
                },
                lastName: {
                    group: '.col-lg-4',
                    validators: {
                        notEmpty: {
                            message: 'The last name is required and cannot be empty'
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
                password: {
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
                confirmPassword: {
                    validators: {
                        notEmpty: {
                            message: 'The confirm password is required and cannot be empty'
                        },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        },
                        different: {
                            field: 'username',
                            message: 'The password cannot be the same as username'
                        }
                    }
                },
                designation: {
                    validators: {
                        notEmpty: {

                            message: 'This field cannot be empty'
                        }
                    }
                },
                Bmdc: {
                    validators: {
                        notEmpty: {

                            message: 'This field cannot be empty'
                        }
                    }
                },
                fees: {
                    validators: {
                        notEmpty: {

                            message: 'This field cannot be empty'
                        }
                    }
                },
                experienceyear: {
                    validators: {
                        notEmpty: {

                            message: 'this field cannot be empty'
                        }
                    }
                },
                captcha: {
                    validators: {
                        callback: {
                            message: 'Wrong answer',
                            callback: function(value, validator) {
                                var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                                return value == sum;
                            }
                        }
                    }
                }
            }
        });

        // Validate the form manually
        $('#validateBtn').click(function() {
            $('#defaultForm').bootstrapValidator('validate');
        });

        $('#resetBtn').click(function() {
            $('#defaultForm').data('bootstrapValidator').resetForm(true);
        });
    });
    </script>
<script type="text/javascript" src="../../../../../resources/js/popmsg.js"></script>
<script>
    $('.something').fadeIn(6000).delay(3000);
    $('.something').fadeOut(2000);
</script>
</body>
</html>