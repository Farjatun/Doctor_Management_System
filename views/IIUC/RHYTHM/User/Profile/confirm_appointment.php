<?php
require_once ('../../../../../vendor/autoload.php');

use App\User\Appointment;

$obj = new Appointment();

$obj->setData($_GET);

$appointment = $obj->confirm_patient_appointment();

echo "
<div>
$appointment->first_name;
</div>
";