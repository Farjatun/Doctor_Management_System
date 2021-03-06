<?php
$gmailAddress = "teamrhythmbitm@gmail.com";
$gmailPassword = "teamrhythmbitm6";


if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');
use App\User\User;
use App\Message\Message;
use App\Utility\Utility;


if(isset($_POST['email'])) {
    $obj= new User();

    $myHostIP= gethostbyname(gethostname());

    $singleUser =  $obj->setData($_POST)->view();


    $passwordResetLink= $singleUser->password ;

    require '../../../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    $mail = new \PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->addAddress($_POST['email']);
    $mail->Username=$gmailAddress;
    $mail->Password=$gmailPassword;
    $mail->setFrom($gmailAddress,'User Management');
    $mail->addReplyTo($gmailAddress,"User Management");
    $mail->Subject    = "Your Password Reset Link";
    $message =  "Please click this link to reset your password: 
       http://$myHostIP/Doctor_Management_System/views/BITM/RHYTHM/User/Profile/resetpassword.php?email=".$_POST['email']."&code=".$singleUser->password;
    $mail->msgHTML($message);
    if($mail->send()){

        Message::message("
                <div class=\"alert alert-success\">
                            <strong>Email Sent!</strong> Please check your email for password reset link.
                </div>");
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body style="padding-top: 100px">
<div class="text-center">
    <?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>

        <div  id="message" class="form button"   style="font-size: smaller  " >
            <center>
                <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                    echo "&nbsp;".Message::message();
                }
                Message::message(NULL);
                ?></center>
        </div>
    <?php } ?>
</div>
<div class="container" style="text-align: center">
    <h1 style="color: #2e6da4">Recover Acount</h1>
    <form role="form" action="" class="form-horizontal login-form" method="post" style="border-top: 2px solid #28a4c9;text-align: left;padding-top: 20px">
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="E-Mail Address" class="form-email form-control" id="form-email" type="text">
                    </div>
                    <small id="emailHelp" class="form-text text-muted">We will send a recovery link to your email</small>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success" > Submit <span class="glyphicon glyphicon-log-in"></span></button>
                </div>
            </div>
        </fieldset>

    </form>

</div>
<script type="text/javascript" src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script>
    $('.alert').slideDown("slow").delay(10000).slideUp("slow");
</script>
</body>
</html>