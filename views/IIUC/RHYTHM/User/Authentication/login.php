<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');
use App\User\Auth;
use App\Message\Message;
use App\Utility\Utility;


$auth= new Auth();
$status= $auth->setData($_POST)->is_registered();

if($status){
    $_SESSION['email']=$_POST['email'];
    Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background: linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> Logged in successfully. </div>");

     Utility::redirect('../../index.php');

}else{
    Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background: linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Wrong info!</strong> Login again </div>");

    Utility::redirect('../Profile/login.php');

}


