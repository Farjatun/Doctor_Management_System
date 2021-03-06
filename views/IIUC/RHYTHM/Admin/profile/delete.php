<?php

require_once ("../../../../../vendor/autoload.php");

use App\Message\Message;
use App\Utility\Utility;

use App\User\User;

$obj = new User();
$obj->setData($_GET);

$oneData = $obj->admin_delete_user();

$path = $_SERVER['HTTP_REFERER'];

Utility::redirect($path);
