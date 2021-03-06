<?php

require_once ("../../../../../vendor/autoload.php");

use App\Message\Message;
use App\Utility\Utility;

use App\User\User;

$obj = new User();

$selectedIDs =   $_POST["mark"];


$obj->recoverMultiple($selectedIDs);

Utility::redirect("../../adminindex.php");