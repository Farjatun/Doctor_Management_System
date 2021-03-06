<?php
include_once ('../../../../../vendor/autoload.php');

use App\Utility\Utility;
use App\User\User;

$obj  = new User();



$obj->setData($_POST);


$obj->update_from_single_profile();

Utility::redirect('../../index.php');