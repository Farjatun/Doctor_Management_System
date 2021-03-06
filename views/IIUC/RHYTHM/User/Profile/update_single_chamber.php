<?php
include_once ('../../../../../vendor/autoload.php');

use App\Utility\Utility;
use App\User\chamber;

$obj  = new chamber();

$strDays =  implode(", ", $_POST["Day"]);

$_POST["Day"] = $strDays;

$obj->setData($_POST);


$obj->update_from_single_chamber();

Utility::redirect('../../index.php');