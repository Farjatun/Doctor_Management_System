<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\User\User;
use App\User\Auth;
use App\User\chamber;
use App\Message\Message;
use App\Utility\Utility;

$obj= new User();
$obj->setData($_SESSION);
$singleUser = $obj->view();

$auth= new Auth();
$status = $auth->setData($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('User/Profile/login.php');
    return;
}
$object = new chamber();

$allData = $object->indexc($singleUser->id);

?>


<!DOCTYPE html>
<html>
<head>
    <meta ln="en">
    <title><?php echo "$singleUser->first_name"?> Profile</title>
    <link rel="stylesheet" href="../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resources/jquery-ui-1.12.1.custom/jquery-ui.css">

    <link rel="shortcut icon" href="../../../resources/image/android-icon-192x192.png" type="image/x-icon">
    <link rel="icon" href="../../../resources/image/android-icon-192x192.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../resources/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../resources/animate.css-master/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../../../resources/css/commonnav.css">
    <link rel="stylesheet" type="text/css" href="../../../resources/css/commonfooter.css">
    <link rel="stylesheet" type="text/css" href="../../../resources/css/frontpagestyle.css">
    <script type="text/javascript" src="../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <style>
        h1{font-weight: bold;font-family: "Monotype Corsiva";color: #0070a3}
    </style>

</head>

<body style="background: radial-gradient(#ffffff,#aed0ea)">






<header>
    <div class="container">
        <div class="col-lg-10"><img src="../../../resources/image/headlogo.png" alt="header_logo"></div>
        
    </div>

    <div class="navigation">
        <ul>
            <li><a href="../../../index.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href=""><i class="fa fa-search"></i> Find doctor <i class="fa fa-caret-down"></i></a>

                <ul>
                    <li><a href="User/Profile/website_main_index.php?workingfield=Medicine"><i class="fa fa-briefcase"></i> Medicine</a></li>
                    <li><a href="User/Profile/website_main_index.php?workingfield=Child Specialist"><i class="fa fa-child"></i> Child Specialist</a></li>
                    <li><a href="User/Profile/website_main_index.php?workingfield=Dentist"><i class="fa fa-pencil"></i> Dentist</a></li>
                    <li><a href="User/Profile/website_main_index.php?workingfield=ENT Specialist"><i class="fa fa-wrench"></i> ENT Specialist</a></li>
                    <li><a href="User/Profile/website_main_index.php?workingfield=Cardiologist"><i class="fa fa-heart"></i> Cardiologist</a></li>
                    <li><a href="User/Profile/website_main_index.php?workingfield=Neurologist"><i class="fa fa-user"></i> Neurologist</a></li>
                    <li><a href="User/Profile/website_main_index.php?workingfield=Eye Specialist"><i class="fa fa-eye"></i> Eye Specialist</a></li>
                    <li><a href="User/Profile/website_main_index.php?workingfield=Gynaecologist"><i class="fa fa-gift"></i> Gynaecologist</a></li>
                    <li><a href="User/Profile/website_main_index.php?workingfield=Skin & Venereal diseases"><i class="fa fa-gift"></i> Skin & Venereal diseases</a></li>
                    <li><a href="User/Profile/website_main_index.php?workingfield=Chest and Respiratory Medicine"><i class="fa fa-gift"></i> Chest and Respiratory Medicine</a></li>
                    <li><a href="User/Profile/website_main_index.php?workingfield=General Surgery"><i class="fa fa-gift"></i> General Surgery</a></li>
                    <li><a href="User/Profile/website_main_index.php?workingfield=Urology"><i class="fa fa-gift"></i> Urology</a></li>
                    <li><a href="User/Profile/website_main_index.php?workingfield=Nephrology"><i class="fa fa-gift"></i> Nephrology</a></li>
                </ul>
            </li>
            <li><a href="User/Profile/mobile.php"><i class="fa fa-mobile"></i> Mobile Services</a></li>
            <li><a href="index.php"><i class="fa fa-key"></i> Doctor login</a></li>
            <li><a href="User/Profile/about.php"><i class="fa fa-info"></i> About</a></li>
            <li><a href="User/Profile/contact_us.php"><i class="fa fa-phone"></i> Contact us</a></li>
        </ul>
    </div>
</header>


<div class="container">
    <header class="tab-content">
        <div style="width: 100%;height: 35px;background-color:#9acfea ">
            <div class="content" style="text-align: right;height: 35px;color: #0070a3;font-weight: bold ">
                Hello <?php echo "$singleUser->first_name"?>! &nbsp;
                <div style="float: right">&nbsp<a style="list-style-type: none;color: #0070a3;font-weight: bold" href= "User/Authentication/logout.php" > LOGOUT </a></div>
            </div>


        </div>

    </header>

    <div class="text-center">
        <?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>
        <div id="message" >

            <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                echo "&nbsp;".Message::message();
            }
            Message::message(NULL);

            ?>
        </div>
        <?php } ?>
    </div>
    <div class="text-center" style="padding-top: 5px;">
        <form action="User/Profile/chamber.php" method="post" style="display: inline-block">
            <input type="hidden" name="d_Id" value="<?php echo "$singleUser->id" ?>">
            <button type="submit" name="bton" class="btn btn-primary">Create Chamber</button>
        </form>
        <a href="User/Profile/edit_single_doctor.php?email=<?php echo $singleUser->email ?>" class="btn btn-primary">Edit Info</a>

    </div>

    <h1 class="bg-info">Name</h1>
    <div>
        <?php echo "$singleUser->first_name"?>&nbsp;<?php echo "$singleUser->last_name"?><br>

    </div>
<h1 class="bg-info">Designations</h1>
<div>
    <?php echo "$singleUser->designation"?><br>

</div>
    <h1 class="bg-info">Working Field</h1>
    <div>
        <?php echo "$singleUser->working_field"?><br>

    </div>
    <h1 class="bg-info">Experience</h1>
    <div>
        <?php echo "$singleUser->experience"?><br>


    </div>
    <h1 class="bg-info">Fees</h1>
    <div>
        <?php echo "$singleUser->fees"?><br>

    </div>

<h1 class="bg-info">Discounted Fees</h1>
<div>
    <?php echo "$singleUser->discounted_fees"?><br>




    <?php
    foreach ($allData as $singleUser){
        $dayGet = explode(", ",$singleUser->day);
        echo"
                <div class='bg-primary' style='padding: 15px;margin-bottom: 5px;border-radius: 5px;'>
                        <h3>Chamber</h3>
                        <div>Name: $singleUser->chamber_name</div>
                        <div>Location: $singleUser->chamber_location</div>
                        <div>Phone: $singleUser->phone_no</div>
                        <a href='User/Profile/all_appointed.php?c_id=$singleUser->c_id'  class='btn btn-success'>Check Previous record</a>
                        <a href='User/Profile/edit_single_chamber.php?c_id=$singleUser->c_id'  class='btn btn-success'>Edit</a>
                        <a href='User/Profile/delete_single_chamber.php?c_id=$singleUser->c_id'  onclick='return doConfirm();' class='btn btn-warning'>Delete</a>
                        <div class='accordion'>
                        <h3>Dates</h3>
            <div>            

        ";
        if(in_array("Sunday",$dayGet)){
            $sunDay= date("d-m-Y",strtotime('Sunday'));
            echo "<a class='btn btn-primary btn-sm' href='User/Profile/appointed_patients.php?c_id=$singleUser->c_id&date=$sunDay'>$sunDay</a><br>";
        }
        if(in_array("Monday",$dayGet)){
            $monDay= date("d-m-Y",strtotime('Monday'));
            echo "<a class='btn btn-primary btn-sm' href='User/Profile/appointed_patients.php?c_id=$singleUser->c_id&date=$monDay'>$monDay</a><br>";
        }
        if(in_array("Tuesday",$dayGet)){
            $tuesDay= date("d-m-Y",strtotime('Tuesday'));
            echo "<a class='btn btn-primary btn-sm' href='User/Profile/appointed_patients.php?c_id=$singleUser->c_id&date=$tuesDay'>$tuesDay</a><br>";
        }

        if(in_array("Wednesday",$dayGet)){
            $wednesDay= date("d-m-Y",strtotime('Wednesday'));
            echo "<a class='btn btn-primary btn-sm' href='User/Profile/appointed_patients.php?c_id=$singleUser->c_id&date=$wednesDay'>$wednesDay</a><br>";
        }
        if(in_array("Thursday",$dayGet)){
            $thursDay= date("d-m-Y",strtotime('Thursday'));
            echo "<a class='btn btn-primary btn-sm' href='User/Profile/appointed_patients.php?c_id=$singleUser->c_id&date=$thursDay'>$thursDay</a><br>";
        }
        if(in_array("Friday",$dayGet)){
            $friDay= date("d-m-Y",strtotime('Friday'));
            echo "<a class='btn btn-primary btn-sm' href='User/Profile/appointed_patients.php?c_id=$singleUser->c_id&date=$friDay'>$friDay</a><br>";
        }
        if(in_array("Saturday",$dayGet)){
            $saturDay= date("d-m-Y",strtotime('Saturday'));
            echo "<a class='btn btn-primary btn-sm' href='User/Profile/appointed_patients.php?c_id=$singleUser->c_id&date=$saturDay'>$saturDay</a><br>";
        }
echo "
</div>
</div>
</div>";
    }
    ?>


</div>
    <footer class="text-center" style="background-color: #204d74;color: white;padding: 5px">Copyright &copy; <?php echo date("Y"); ?>&nbsp; Dr Management System Powered By Shakil & Touhidm.</footer>

<script type="text/javascript" src="../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../../resources/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script>

        $( ".accordion" ).accordion({
            active:false,
            collapsible: true,
            heightStyle: 'content'

        })

</script>
<script type="text/javascript">
    function doConfirm(){

        return  confirm("Are you sure you want to delete?");
    }
</script>
<script>
    $('.something').fadeIn(6000).delay(3000);
    $('.something').fadeOut(2000);



</script>
</body>
</html>
