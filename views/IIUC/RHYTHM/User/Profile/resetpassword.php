<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../../vendor/autoload.php');
use App\User\User;
use App\Message\Message;
use App\Utility\Utility;

if(isset($_POST['new_password']) &&  isset($_POST['confirm_new_password'])) {

    if($_POST['new_password'] ==  $_POST['confirm_new_password']) {

        $obj = new User();
        $_POST['password'] = $_POST['new_password'];
        $obj->setData($_POST);
        $obj->change_password();
        Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Password reset has been completed, Please login!
                </div>");
        Utility::redirect('../../../../../views/IIUC/RHYTHM/User/Profile/login.php');
        return;
    }
    else{
        Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Error!</strong> Password doesn't match!
                </div>");
    }
}

if(isset($_GET['email'])) {
    $obj= new User();
    $obj->setData($_GET);
    $singleUser = $obj->view();

    if($singleUser->password != $_GET['code']   ){

        Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Error!</strong> Invalid Password Reset Link.
                </div>");
        Utility::redirect('login.php');
        return;
    }

}
else{
    Utility::redirect('login.php');
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>resetpassword</title>
    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../../resources/validator/css/bootstrapValidator.min.css">
    
    
    

</head>
<body>
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
<div class="container" style="padding-top: 50px;text-align: center">
    <h1>Reset Year New Password</h1>
    <div class="text-center" style="margin-top: 50px;padding-top: 50px;border-top: 2px solid #204d74">
<form role="form" id="defaultForm" method="post" action=""  class="form-horizontal login-form">
    <fieldset>

        <input type="hidden" name="email" value="<?php echo $_GET['email']?>">

        <div class="form-group">
            <label class=" col-lg-3" for="new_password">New Password</label>
            <div class="col-lg-5 inputGroupContainer">
                <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" name="new_password" placeholder="New Password" class="form-password form-control" id="form-password">
            </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3" for="new_password">Confirm New Password</label>
            <div class="col-lg-5 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-apple"></i></span>
            <input type="password" name="confirm_new_Password" placeholder="Confirm New Password" class="form-password form-control" id="form-password">
        </div>
        </div>
        </div>
        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Reset Password</button>
    </fieldset>
</form>
    </div>
</div>
<script type="text/javascript" src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../../../../resources/validator/js/bootstrapValidator.min.js"></script>
<script>
    $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            new_password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            confirm_new_Password: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            }
        }
    }

    })
    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
</script>

<script>
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>
</body>
</html>