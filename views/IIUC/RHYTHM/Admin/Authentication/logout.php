<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');
use App\Admin\Admin;
use App\Message\Message;
use App\Utility\Utility;


$auth= new Admin();
$status= $auth->log_out();

session_destroy();
session_start();

Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background: linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> You have looged out successfully. </div>");
return Utility::redirect('../../../../../admin.php');