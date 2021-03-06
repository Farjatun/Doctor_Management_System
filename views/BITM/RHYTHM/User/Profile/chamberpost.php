<?php
require_once ('../../../../../vendor/autoload.php');

use App\Utility\Utility;
use App\User\Chamber;

$obj  = new Chamber();

$strDay = implode(", ",$_POST["Day"]);

$_POST["Day"] = $strDay;

$obj->setData($_POST)->storec();


Utility::redirect('../../index.php');