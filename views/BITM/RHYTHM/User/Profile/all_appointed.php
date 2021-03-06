<?php
if(!isset($_SESSION) )session_start();
include_once ('../../../../../vendor/autoload.php');

use App\Message\Message;
use App\User\Appointment;
$obj = new Appointment();
$obj->setData($_GET);
$allPatients = $obj->all_appointed_list();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor Management System/Find patients appointment</title>
    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../../resources/jquery-ui-1.12.1.custom/jquery-ui.min.css">


    <link rel="shortcut icon" href="../../../../../resources/image/android-icon-192x192.png" type="image/x-icon">
    <link rel="icon" href="../../../../../resources/image/android-icon-192x192.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/animate.css-master/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/css/commonnav.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/css/commonfooter.css">
    <link rel="stylesheet" type="text/css" href="../../../../../resources/css/frontpagestyle.css">
    <script type="text/javascript" src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../../../../resources/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../../../../resources/media/js/dataTables.bootstrap.min.js"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>



</head>
<body class="text-center">
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



<div class="container">
    <div class="text-center"><h4>Find Your Patients</h4></div>
    <div class="text-lowercase text-left text-muted">result found <?php echo count($allPatients);?></div>
    <div>
        <div class="col-lg-2"></div>
        <div class="col-lg-6">
            <table border="1px" class="table table-bordered table-striped" id="table_id">

                <tr>
                    <th> Serial </th>
                    <th> Name </th>
                    <th> Mobile No </th>
                    <th>Email</th>
                    <th> Age </th>
                    <th> Gender </th>
                    <th> Address </th>
                    <th>Date</th>

                </tr>
                <?php
                $serial=1;
                foreach ($allPatients as $onePatients)
                {
                    echo "
                                  <tr>
                                     <td style='width: 10%; text-align: center'>$serial</td>
                                     <td style='width: 10%; text-align: center;color: black'>$onePatients->name</td>
                                     <td style='width: 20%;'>$onePatients->mobile_no</td>
                                     <td>$onePatients->email</td>
                                     <td>$onePatients->age</td>
                                     <td>$onePatients->gender</td>
                                     <td>$onePatients->address</td>
                                     <td>$onePatients->date</td>
                                    
                                  </tr>
                                 
                ";
                    $serial++;
                }

                ?>
            </table>
        </div>
        <div class="col-lg-6"></div>
    </div>
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
<script type="text/javascript">
    function printFunction(){
        window.print();
    }
</script>
<script type="text/javascript" src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
<script type="text/javascript" src="../../../../../resources/js/popmsg.js"></script>
<script type="text/javascript" src="../../../../../resources/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script type="text/javascript">
    $( ".accordion" ).accordion({
        active:false,
        collapsible: true,
        heightStyle: 'content'

    })
</script>
<script>
    $('.something').fadeIn(6000).delay(3000);
    $('.something').fadeOut(2000);
</script>
</body>
</html>
