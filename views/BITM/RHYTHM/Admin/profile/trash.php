<?php

require_once ("../../../../../vendor/autoload.php");

use App\Message\Message;
use App\Utility\Utility;

use App\User\User;

$obj = new User();
$obj->setData($_GET);

$oneData = $obj->trash();

Utility::redirect("../../adminindex.php");