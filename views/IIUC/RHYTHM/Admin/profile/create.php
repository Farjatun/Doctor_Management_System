<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');
use App\Admin\Admin;
use App\Message\Message;
use App\Utility\Utility;

$auth= new Admin();
$status = $auth->setData($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('../../../../../admin.php');
    return;
}


?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Create</title>
    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../../resources/font-awesome-4.7.0/css/font-awesome.min.css">
    <style>
        .fa{color: white}
    </style>
</head>
<body style="background: url('../../../../../resources/image/69096361-medical-wallpapers.jpg')no-repeat;background-size:cover">
<div class="container">
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
        <div class="text-center"><h1  class="btn-info" style="font-family: 'Monotype Corsiva';font-weight: bold">Create Admin</h1></div>
        <div class="text-center bg-success">
    <form action="store.php" method="post" class="form-horizontal" style="border-top: 2px solid #2e6da4;padding-top: 100px;padding-bottom: 200px">
        <i class="fa fa-user-circle-o fa-5x text-center" aria-hidden="true"></i><br><br>
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
                    </div>
                </div>
            </div>


            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label">Password</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input name="password" placeholder="Enter password" class="form-control" type="password">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-info" >Create <span class="glyphicon glyphicon-log-in"></span></button>
                </div>

            </div>
        </fieldset>
    </form>
        </div>
</div>
<script type="text/javascript" src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('.something').fadeIn(6000).delay(3000);
    $('.something').fadeOut(2000);
</script>
</body>
</html>