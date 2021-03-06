<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\Admin\Admin;
use App\User\User;
use App\Message\Message;
use App\Utility\Utility;
use App\User\chamber;

$auth= new Admin();
$status = $auth->setData($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('../../../admin.php');
    return;
}

$obj = new User();
$obj->setData($_GET);
$adminIndex = $obj->admin_trashed();
$object = new User();
$object->setData($_GET);
$adminViewIndex = $object->admin_view_trashed();
$chamber = new chamber();
$chamber->setData($_GET);
$chamber_view = new chamber();



######################## pagination code block#1 of 2 start ######################################
$recordCount= count($adminIndex);


if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;
$_SESSION['Page']= $page;

if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 3;
$_SESSION['ItemsPerPage']= $itemsPerPage;

$pages = ceil($recordCount/$itemsPerPage);
$someData = $obj->trashedPaginator($page,$itemsPerPage);
$adminIndex= $someData;
$serial = (($page-1) * $itemsPerPage) +1;

####################### pagination code block#1 of 2 end #########################################



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin trashed</title>
    <link rel="stylesheet" href="../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">

    <link rel="shortcut icon" href="../../../resources/image/android-icon-192x192.png" type="image/x-icon">
    <link rel="icon" href="../../../resources/image/android-icon-192x192.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../../resources/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../resources/animate.css-master/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../../../resources/css/commonnav.css">
    <link rel="stylesheet" type="text/css" href="../../../resources/css/commonfooter.css">
    <link rel="stylesheet" href="../../../resources/jquery-ui-1.12.1.custom/jquery-ui.min.css">

</head>

<body style="background: radial-gradient(#ffffff,#aed0ea)">
<div class="header">
    <div class="container">
        <div class="col-lg-10"><img src="../../../resources/image/headlogo.png" alt="header_logo"></div>
        <div class="col-lg-2" style="padding-top: 10px"><a href="User/Profile/signup.php">Register as a DOCTOR</a></div>
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
</div>

<div class="text-center"><h4>Admin panel</h4></div>

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


<div class="container" style="margin-top:50px ">
    
    <div class="col-lg-2"></div>
    
    
    <div class="col-lg-8">



        <div class="nav navbar-default" style="float: right;margin: 15px;margin-bottom:5px">
            <a class="btn btn-danger" href= "Admin/Authentication/logout.php" > LOGOUT </a>
            <a class="btn btn-primary" href="adminindex.php">Main List</a>

            <button id="RecoverSelected" class='btn bg-success'>Recover Selected</button>

            <button id="DeleteSelected" class='btn btn-danger'>Delete Selected</button>



        </div>


        <div class="text-center"><h4>Admin panel - Trashed List</h4></div>


        <div >Select all  <input id='select_all' type='checkbox' value='select all'> </div>


        <form id="multiple"  method="post">



        <?php

        $serial=1;
        foreach ($adminIndex as $adminViewIndex){

            $adminChamberIndex = $chamber->admin_index_chamber($adminViewIndex->id);
            $adminChamberView =  $chamber_view->admin_index_chamber_view($adminViewIndex->id);
            
            
            echo "
            
            
            <div style='background-color:#aed0ea;color: white;padding: 5px;padding-left: 10px;border: 2px solid #5bc0de;border-radius: 10px;box-shadow: 2px 4px 6px 2px #000000;margin: 25px'>
            
             <div style='align-content: center'>Select this doctor<input type='checkbox' class='checkbox' name='mark[]' value='$adminViewIndex->id'></div>
              <div style= ' text-align: center'>Serial no. $serial </div>
    
            
            <div>Name: $adminViewIndex->first_name $adminViewIndex->last_name</div>
            <div>Email: $adminViewIndex->email</div>
            <div>BMDC Number: $adminViewIndex->bmdc</div>
            <div>Woking Field: $adminViewIndex->working_field</div>
            <div>Designation: $adminViewIndex->designation</div>
            <div> <a href='Admin/profile/delete.php?id=$adminViewIndex->id' class='btn btn-primary' onclick='return warning()'>Delete User</a>
            <a class='btn btn-primary' href='Admin/profile/recover.php?id=$adminViewIndex->id'>Recover</a>
            </div>
            
        
            ";


            $serial++;
            
            foreach ($adminChamberIndex as $adminChamberView){

                echo "
                <div class='accordion'>
                <h3>Chamber</h3>
                <div>
                <div>Name: $adminChamberView->chamber_name</div>
                <div>Location: $adminChamberView->chamber_location</div>
                <div>Day:$adminChamberView->day </div>
                <div>Time: from $adminChamberView->timeto to $adminChamberView->time</div>
                </div>
                </div>
                ";
            }

            echo "</div>";
        }

        ?>

        </form>



        <!--  ######################## pagination code block#2 of 2 start ###################################### -->
        <div align="left" class="container">
            <ul class="pagination">

                <?php

                $pageMinusOne  = $page-1;
                $pagePlusOne  = $page+1;

                if($page>$pages) Utility::redirect("admintrashed.php?Page=$pages");

                if($page>1)  echo "<li><a href='admintrashed.php?Page=$pageMinusOne'>" . "Previous" . "</a></li>";
                for($i=1;$i<=$pages;$i++)
                {
                    if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
                    else  echo "<li><a href='admintrashed.php?Page=$i'>". $i . '</a></li>';

                }
                if($page<$pages) echo "<li><a href='admintrashed.php?Page=$pagePlusOne'>" . "Next" . "</a></li>";

                ?>

                <select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
                    <?php
                    if($itemsPerPage==3 ) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';

                    if($itemsPerPage==4 )  echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
                    else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';

                    if($itemsPerPage==5 )  echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

                    if($itemsPerPage==6 )  echo '<option  value="?ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';

                    if($itemsPerPage==10 )   echo '<option  value="?ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
                    else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

                    if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
                    else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
                    ?>
                </select>
            </ul>
        </div>
        <!--  ######################## pagination code block#2 of 2 end ###################################### -->









    </div>
    <div class="col-lg-2"></div></div>
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
<script type="text/javascript" src="../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../../resources/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script type="text/javascript">
    $( ".accordion" ).accordion({
        active:false,
        collapsible: true,
        heightStyle: 'content'

    })
</script>
<script type="text/javascript">
    function warning() {
        return confirm("Are you really want to delete this user?");
    }
</script>
<script type="text/javascript">
    $('.something').fadeIn(6000).delay(3000);
    $('.something').fadeOut(2000);



    //select all checkboxes
    $("#select_all").change(function(){  //"select all" change
        var status = this.checked; // "select all" checked status
        $('.checkbox').each(function(){ //iterate all listed checkbox items
            this.checked = status; //change ".checkbox" checked status
        });
    });

    $('.checkbox').change(function(){ //".checkbox" change
//uncheck "select all", if one of the listed checkbox item is unchecked
        if(this.checked == false){ //if this item is unchecked
            $("#select_all")[0].checked = false; //change "select all" checked status to false
        }

//check "select all" if all checkbox items are checked
        if ($('.checkbox:checked').length == $('.checkbox').length ){
            $("#select_all")[0].checked = true; //change "select all" checked status to true
        }
    });




    $(document).ready(function () {


        $("#RecoverSelected").click(function () {
            $("#multiple").attr('action', 'Admin/profile/recover_selected_doctor.php');
            $("#multiple").submit();
        });




        $("#DeleteSelected").click(function () {
            $("#multiple").attr('action', 'Admin/profile/delete_selected_doctor.php');
            $("#multiple").submit();
        });


    });

    
</script>
</body>
</html>