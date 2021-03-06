<?php
include_once ('vendor/autoload.php');
use App\Utility\Utility;
use App\Message\Message;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor Management System</title>
    <link rel="shortcut icon" href="resources/image/android-icon-192x192.png" type="image/x-icon">
    <link rel="icon" href="resources/image/android-icon-192x192.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="resources/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="resources/animate.css-master/animate.min.css">
    <link rel="stylesheet" type="text/css" href="resources/css/commonnav.css">
    <link rel="stylesheet" type="text/css" href="resources/css/commonfooter.css">
    <link rel="stylesheet" type="text/css" href="resources/css/frontpagestyle.css">
    <script type="text/javascript" src="resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        jQuery(document).ready(function( $ ) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script>

</head>
<body>
<div class="text-center">
    <?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>
        <div id="message" >


            <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                echo "&nbsp;".Message::message();
            }
            else
                Message::message(NULL);

            ?>
        </div>
    <?php } ?>
</div>
<header class="header">
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
            <li><a href="views/IIUC/RHYTHM/index.php"><i class="fa fa-key"></i> Doctor login</a></li>
            <li><a href="views/IIUC/RHYTHM/User/Profile/about.php"><i class="fa fa-info"></i> About</a></li>
            <li><a href="views/IIUC/RHYTHM/User/Profile/contact_us.php"><i class="fa fa-phone"></i> Contact us</a></li>
        </ul>
    </div>
</header>
<div class="slider">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="resources/image/f2.png" width="1500px" height="500px" alt="Chania">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="animated bounceInRight">Welcome to Doctor Management System</h1>
                    <p class="animated fadeInRightBig">We are here to create an easy communication between Doctor and Patients</p>
                </div>
            </div>

            <div class="item">
                <img src="resources/image/f3.jpg" width="1500px" height="500px" alt="Chania">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="animated bounceInRight">Get Your Appointment</h1>
                    <p class="animated fadeInRightBig">Now you can take online Appointment for a DOCTOR</p>
                </div>
            </div>

            <div class="item">
                <img src="resources/image/f4.jpg" width="1500px" height="500px" alt="Flower">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="animated bounceInRight">Doctors can create Profile and Chamber</h1>
                    <p class="animated fadeInRightBig">Create you career from here as a Doctor and increate your patients</p>
                </div>
            </div>
            <div class="item">
                <img src="resources/image/f7.jpg" width="1500px" height="500px" alt="Flower">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="animated bounceInRight">We ensure best health treatment for you</h1>
                    <p class="animated fadeInRightBig">Find the right doctor for you according to their skills</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div class="container text-center">
 <h1 class="headone animated">We are here to help</h1>
    <div class="downarrow"><i class="fa fa-angle-double-down"></i></div>
        <div class="col-lg-12">
        <div class="col-lg-5 doctors animated">
            <h3>For Doctors</h3>
            <div class="websiteFeature"><i class="fa fa-heartbeat"></i> As a doctor you can start you career from here. Built your profile and define your chamber so that patients can communicate with you easily</div>
            <div class="websiteFeature"><i class="fa fa-heartbeat"></i> We offer maximum 7 days advance appointment system so that you show your upcoming patients details</div>
            <div class="websiteFeature"><i class="fa fa-heartbeat"></i>You can get your patients online or you can simply disable this system by removing the chamber details</div>
            <div class="websiteFeature"><i class="fa fa-heartbeat"></i>As a doctor you can choose the Required days from a week while you are available for giving treatment</div>
            <div class="websiteFeature"><i class="fa fa-heartbeat"></i>By maintaining our Business Policies you can built your business Perfect.Your business will be more productive then before</div>
        </div>
            <div class="col-lg-2 middlesite"></div>
        <div class="col-lg-5 patients animated">
            <h3>For Patients</h3>
            <div class="websiteFeature"><i class="fa fa-heartbeat"></i>As a patient you can choose the right doctor for your treatment. We offer 24 hour service. So you can communicate with us anytime</div>
            <div class="websiteFeature"><i class="fa fa-heartbeat"></i>As a patient if you face any kind of miss guide or wrong information you can tell us. So that we can take action against the Doctor who did this</div>
            <div class="websiteFeature"><i class="fa fa-heartbeat"></i>As a patient you can get online doctor appoinment so that you dont have to worry about the doctor schedule</div>
            <div class="websiteFeature"><i class="fa fa-heartbeat"></i>As a patient you can take mobile services(diagonistic center phone number, Ambulance phone number,Clinic Phone number) from this website so that you can get best service from our website</div>
            <div class="websiteFeature"><i class="fa fa-heartbeat"></i>Our goal is to make your best satisfaction. If you feel any find of difficulty from our system just contact. We will happy to moderate the feature for your best experience</div>
        </div>
    </div>
</div>

<section class="patient-manuals text-center">
    <div class="animated patients-manual-header">
    <i class="fa fa-heartbeat display-block"></i><h3 class="display-block">Patients Manual</h3><i class="fa fa-heartbeat display-block"></i></div>
    <div class="container patient-manuals-directory">
        <div class="col-lg-3 animated patients-manual-animation"><h3>Find Doctor</h3>
        <p>Find the right doctor for your treatment. We owe you so many options. It is almost easy for you to choose the right doctor.Simply just go to the navigation button named Find doctors and there you will find so many suitable fiels which you can use</p>
        </div>
        <div class="col-lg-3 animated patients-manual-animation"><h3>Justify Quality</h3>
        <p>In doctors list we show you doctors designation, quality and so many things by which you can justify doctors according to their quality and also other things(fees,working experience,chamber). All the members of our community is trusted.</p>
        </div>
        <div class="col-lg-3 animated patients-manual-animation"><h3>Check Locations</h3>
        <p>We have given you dynamic location views of the doctor chamber. By this location map you can find the correct location of the doctors. There are multiple chambers and also multiple available time. So you should check before taking appointment</p>
        </div>
        <div class="col-lg-3 animated patients-manual-animation"><h3>Check Available dates</h3>
        <p>Since Doctors has multiple dates which is their available schedule so that you have to take their appointment according to their available dates. There wont be any different for a single doctors</p>
        </div>
    </div>
</section>
<section class="doctors-manuals">
    <div class="container">
        <div class="col-lg-7 animated doctors-java"><h2>Doctors Manual</h2><div>
                <ul>
                    <li><i class="fa fa-stethoscope plane"></i>Doctors are our real customer. Their desires is our first observation</li>
                    <li><i class="fa fa-stethoscope plane"></i>During Account creation doctors need to varify their email through an email token. Without varification they can not log in their their account.</li>
                    <li><i class="fa fa-stethoscope plane"></i>As a doctor create your multiple chambers according to locations and time</li>
                    <li><i class="fa fa-stethoscope plane"></i>Give your available weekly days. We will show your patients your dates according to your available days</li>
                    <li><i class="fa fa-stethoscope plane"></i>If you want to cancel your menbership just contact us.Admin will delete your account after review.</li>
                    <li><i class="fa fa-stethoscope plane"></i>If you feel any kind of problem using this website just contact us</li>
                </ul></div></div>
        <div class="col-lg-5"><img src="resources/image/womendoctor.png" alt="women doctor" height="300px" width="300px"></div>
    </div>
</section>
<section id="counting_sec">
    <div class="container text-center">
        <h3>Our Application Success Rate</h3>
        <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="counting_sl">
                    <i class="fa fa-user fa-5x"></i>
                    <h2 class="counter">43,753</h2>
                    <h4>Happy Clients</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="counting_sl">
                    <i class="fa fa-desktop fa-5x"></i>
                    <h2 class="counter">20,210</h2>
                    <h4>Doctor Added</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="counting_sl">
                    <i class="fa fa-ticket fa-5x"></i>
                    <h2 class="counter">43,753</h2>
                    <h4>Appointment Completed</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="counting_sl">
                    <i class="fa fa-clock-o fa-5x"></i>
                    <h2 class="counter">45,105</h2>
                    <h4>Appointment Hours</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="happy-life">
    <div class="content-box text-center animated"><div>
        <h2>Make your life easier then before</h2>
        <p>Our only goal is to make your life easier then before. Simply use our website and find the right selection for your health. We are forwarding our services free for the patients. You don't need to give us any money or service massage</p>
        </div>
        </div>
    <div class="image-box animated"></div>
</section>
<section class="happening-life">
    <div class="contents-box animated"></div>
    <div class="images-box"><div><h3>Start your career as a professional doctor from here</h3><p>Doctor Management system Website is the best solution for online appointment. We have over 10000 Doctors working for our community. You can also start your career from here. </p><a href="views/IIUC/RHYTHM/User/Profile/signup.php" class="btn btn-info">Sign up as a Doctor</a></div></div>

</section>
<section class="admin-manual">
    <div class="container text-center">
        
        <div>
        <div class="col-lg-6">
            <img src="resources/image/second%20doctor.png" alt="doctor management system">
        </div>
        <div class="col-lg-6 animated admin">
            <h2>Admin Activity</h2>
            <div>
                <ul>
                    <li>Admin has a big task on this website. Normally he can verify the The doctors according to their
                        doctor BMDC number
                    </li>
                    <li>After doctor registration an admin will review doctor account if they found anything dangerous they will delete doctors ID</li>
                    <li>Website Admin will give review of the doctors form the top list. So the popular once will get the most priority.</li>
                    <li>Admin will notify all the users if there are any kind of Problem on the Website occured</li>
                    <li>Admin has the right to take any changes of this website so if you have any kind of problem just communicate with them</li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</section>
<section class="business-Partner">
    <div class="container text-center">
    <h2>Our Business Partners</h2>
        <div>
            <i class="fa fa-apple fa-5x logoes-business"></i>
            <i class="fa fa-amazon fa-5x logoes-business"></i>
            <i class="fa fa-500px fa-5x logoes-business"></i>
            <i class="fa fa-adn fa-5x logoes-business"></i>
            <i class="fa fa-android fa-5x logoes-business"></i>
            <i class="fa fa-behance fa-5x logoes-business"></i>
            <i class="fa fa-bitbucket fa-5x logoes-business"></i>
            <i class="fa fa-bitcoin fa-5x logoes-business"></i>
            <i class="fa fa-cc-amex fa-5x logoes-business"></i>
            <i class="fa fa-cc-diners-club fa-5x logoes-business"></i>
            <i class="fa fa-cc-discover fa-5x logoes-business"></i>
            <i class="fa fa-cc-jcb fa-5x logoes-business"></i>
            <i class="fa fa-cc-mastercard fa-5x logoes-business"></i>
            <i class="fa fa-cc-paypal fa-5x logoes-business"></i>
            <i class="fa fa-cc-visa fa-5x logoes-business"></i>
            <i class="fa fa-codiepie fa-5x logoes-business"></i>
            <i class="fa fa-codepen fa-5x logoes-business"></i>
            <i class="fa fa-chrome fa-5x logoes-business"></i>
            <i class="fa fa-gitlab fa-5x logoes-business"></i>
            <i class="fa fa-github fa-5x logoes-business"></i>
            <i class="fa fa-html5 fa-5x logoes-business"></i>
        </div>
    </div>
</section>
<div class="container text-center moderate">
    <h2 style="color: #31b0d5;font-weight: bold"> Meet Our team</h2>
    <div class="row">
        <div class="col-xs-12">

            <div id="imageCarousel" class="carousel slide" data-interval="2000"
                 data-ride="carousel" data-pause="hover" data-wrap="true">

                

                <div class="carousel-inner">
                    
                    <div class="item active">
                        <div class="row">
                            <div class="col-xs-6">
                                <img src="resources/image/Shakil Ahmed Reza.png" class="img-responsive">
                            </div>
                            
                            <div class="col-xs-6">
                                <img src="resources/image/Touhid.png" class="img-responsive">
                            </div>
                        </div>
                    </div>

                    
                </div>

                
            </div>

        </div>
    </div>
</div>
<section class="newsletter-section"><div class="container text-center"><h2>NewsLetter</h2><p>To get our upcoming updates and extra medical features <br>Subscribe our website and keep in touch</p><div>
            <form action="" method="post" class="form-inline"><div class="form-group"><input type="email" class="form-control" placeholder="Enter you Email"></div>
                <div class="form-group"><input type="submit" class="btn btn-info form-control" value="Subscribe"></div>
            </form></div></div></section>
<a id="back-to-top" href="#" class="btn btn-info btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
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

<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="resources/js/jquery.counterup.min.js"></script>
<script type="text/javascript" src="resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="resources/js/frontpage.js"></script>
<script>
    $(document).ready(function(){
        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

        $('#back-to-top').tooltip('show');

    });
</script>

<script type="text/javascript">

    $('.something').fadeIn(6000).delay(3000);
    $('.something').fadeOut(2000);



</script>
</script>
<script type="text/javascript" src="resources/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
</body>
</html>