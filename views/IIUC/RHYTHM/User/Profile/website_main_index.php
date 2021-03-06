<?php
if(!isset($_SESSION) )session_start();
include_once ('../../../../../vendor/autoload.php');

use App\Message\Message;
use App\User\User;
use App\User\Chamber;
$obj = new User();
$object = new User();
$obj->setData($_GET);
$allIndex = $obj->website_main_index();
$object->setData($_GET);
$someIndex = $object->website_main_view();
$contents = new Chamber();
$content =new Chamber();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor Management System/Find doctor</title>
    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../../resources/jquery-ui-1.12.1.custom/jquery-ui.min.css">

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
<div class="container">
<div class="text-center"><h4>Find Your Doctor</h4></div>
    <div class="text-lowercase text-left text-muted">result found <?php echo count($allIndex);?></div>
    <div>
        <div class="col-lg-2"></div>
        <div class="col-lg-6">

<?php
foreach ($allIndex as $someIndex)
{
    $allChamber = $contents->index_chamber($someIndex->id);
    $oneChamber = $content->chamber_view($someIndex->id);

    echo "
    <div style='margin: 20px;color: white;padding: 5px;padding-left: 15px;background-color:#aed0ea;border: 2px solid #31b0d5;border-radius: 5px;box-shadow: 2px 4px 6px 2px #000000'>
    <h4>$someIndex->first_name</h4>
    <div >$someIndex->working_field</div>
    <div >$someIndex->designation</div>
    <div >$someIndex->fees</div>
    
   
    
    ";
foreach ($allChamber as $oneChamber){

    $dayGet = explode(", ",$oneChamber->day);
    echo "
<div class='accordion' style=' '>
    <h5 style='text-decoration: underline'>Chamber</h5>
    <div>
    <div>Name:$oneChamber->chamber_name; $someIndex->first_name</div>
    <div>Time: from $oneChamber->timeto to $oneChamber->time;</div> 
    <div>Location: <br>
    <iframe width=\"230\" height=\"150\" frameborder=\"2\" scrolling=\"yes\" marginheight=\"0\" marginwidth=\"0\" src=\"https://maps.google.co.za/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php $oneChamber->chamber_location ?>&amp;aq=&amp;sll=-26.178375,28.033719&amp;ie=UTF8&amp;hq=&amp;hnear=&amp;radius=15000&amp;t=m&amp;output=embed\"></iframe>
    </div>
    <div class='accordion'><h5>Get Appointment</h5><div>
    

    ";
    if(in_array("Sunday",$dayGet)){
       $sunDay= date("d-m-Y",strtotime('Sunday'));
       echo "<form method='post' action='create_appointment.php'>
<input type='hidden' name='C_id' value='$oneChamber->c_id'>
<input type='hidden' name='Date' value='$sunDay'>
<input type='hidden' name='first_Name' value='$someIndex->first_name'>
<input type='hidden' name='last_Name' value='$someIndex->last_name'>
<input type='hidden' name='location' value='$oneChamber->chamber_location'>
<input type='hidden' name='fees' value='$someIndex->fees'>
<button type='submit' class='btn btn-primary' name='Button'>$sunDay</button>
<br>
</form><br>";
    }
    if(in_array("Monday",$dayGet)){
        $monDay= date("d-m-Y",strtotime('Monday'));
        echo "<form method='post' action='create_appointment.php'>
<input type='hidden' name='C_id' value='$oneChamber->c_id'>
<input type='hidden' name='Date' value='$monDay'>
<input type='hidden' name='first_Name' value='$someIndex->first_name'>
<input type='hidden' name='last_Name' value='$someIndex->last_name'>
<input type='hidden' name='location' value='$oneChamber->chamber_location'>
<input type='hidden' name='fees' value='$someIndex->fees'>
<button type='submit' class='btn btn-primary' name='Button'>$monDay</button><br>
</form><br>";
    }
    if(in_array("Tuesday",$dayGet)){
        $tuesDay= date("d-m-Y",strtotime('Tuesday'));
        echo "<form method='post' action='create_appointment.php'>
<input type='hidden' name='C_id' value='$oneChamber->c_id'>
<input type='hidden' name='Date' value='$tuesDay'>
<input type='hidden' name='first_Name' value='$someIndex->first_name'>
<input type='hidden' name='last_Name' value='$someIndex->last_name'>
<input type='hidden' name='location' value='$oneChamber->chamber_location'>
<input type='hidden' name='fees' value='$someIndex->fees'>
<button type='submit' class='btn btn-primary' name='Button'>$tuesDay</button><br>
</form><br>";
    }

    if(in_array("Wednesday",$dayGet)){
        $wednesDay= date("d-m-Y",strtotime('Wednesday'));
        echo "<form method='post' action='create_appointment.php'>
<input type='hidden' name='C_id' value='$oneChamber->c_id'>
<input type='hidden' name='Date' value='$wednesDay'>
<input type='hidden' name='first_Name' value='$someIndex->first_name'>
<input type='hidden' name='last_Name' value='$someIndex->last_name'>
<input type='hidden' name='location' value='$oneChamber->chamber_location'>
<input type='hidden' name='fees' value='$someIndex->fees'>
<button type='submit' class='btn btn-primary' name='Button'>$wednesDay</button><br>
</form><br>";
    }
    if(in_array("Thursday",$dayGet)){
        $thursDay= date("d-m-Y",strtotime('Thursday'));
        echo "<form method='post' action='create_appointment.php'>
<input type='hidden' name='C_id' value='$oneChamber->c_id'>
<input type='hidden' name='Date' value='$thursDay'>
<input type='hidden' name='first_Name' value='$someIndex->first_name'>
<input type='hidden' name='last_Name' value='$someIndex->last_name'>
<input type='hidden' name='location' value='$oneChamber->chamber_location'>
<input type='hidden' name='fees' value='$someIndex->fees'>
<button type='submit' class='btn btn-primary' name='Button'>$thursDay</button>
</form><br>";
    }
    if(in_array("Friday",$dayGet)){
        $friDay= date("d-m-Y",strtotime('Friday'));
        echo "<form method='post' action='create_appointment.php'>
<input type='hidden' name='C_id' value='$oneChamber->c_id'>
<input type='hidden' name='Date' value='$friDay'>
<input type='hidden' name='first_Name' value='$someIndex->first_name'>
<input type='hidden' name='last_Name' value='$someIndex->last_name'>
<input type='hidden' name='location' value='$oneChamber->chamber_location'>
<input type='hidden' name='fees' value='$someIndex->fees'>
<button type='submit' class='btn btn-primary' name='Button'>$friDay</button>
</form><br>";
    }
    if(in_array("Saturday",$dayGet)){
        $saturDay= date("d-m-Y",strtotime('Saturday'));
        echo "<form method='post' action='create_appointment.php'>
<input type='hidden' name='C_id' value='$oneChamber->c_id'>
<input type='hidden' name='Date' value='$saturDay'>
<input type='hidden' name='first_Name' value='$someIndex->first_name'>
<input type='hidden' name='last_Name' value='$someIndex->last_name'>
<input type='hidden' name='location' value='$oneChamber->chamber_location'>
<input type='hidden' name='fees' value='$someIndex->fees'>
<button type='submit' class='btn btn-primary' name='Button'>$saturDay</button>
</form><br>";
    }
    echo "
</div></div>
    </div>
    </div>
    ";
}
echo "</div>";
}

?>
        </div>
        <div class="col-lg-6"></div>
    </div>
</div>
koi


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





<script type="text/javascript" src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
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
