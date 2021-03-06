<?php
include_once ('../../../../../vendor/autoload.php');

use App\Utility\Utility;
use App\User\chamber;

$obj  = new chamber();

$obj->setData($_GET);

$obj->delete_single_chamber();

Utility::redirect('../../index.php');