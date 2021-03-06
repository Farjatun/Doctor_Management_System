<?php
require_once ('../../../../../vendor/autoload.php');

use App\Utility\Utility;
use App\Admin\Admin;
$obj = new Admin();
$obj->setData($_POST);

$obj->store();


Utility::redirect('../../adminindex.php');