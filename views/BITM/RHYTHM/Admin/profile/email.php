<?php

######## PLEASE PROVIDE Your Gmail Info. -  (ALLOW LESS SECURE APP ON GMAIL SETTING ) ########

$gmailAddress = "teamrhythmbitm@gmail.com";
$gmailPassword = "teamrhythmbitm6";


##############################################################################################

session_start();
include_once('../../../../../vendor/autoload.php');
 include_once('../../../../../vendor/phpmailer/phpmailer/src/PHPMailer.php');

use App\User\User;
use App\Message\Message;

$obj = new User();
$th = "

          Nothing

    ";
$fileResource=fopen("content.html","w+");

if(!isset($_REQUEST['id'])) {
    $list = 1;
    $allData = $obj->admin_index();
    $serial = 1;

    $th = "

         Nothiing
    ";

    fwrite($fileResource,$th);


    foreach($allData as $oneData){ ########### Traversing $someData is Required for pagination  #############

        if($serial%2) $bgColor = "AZURE";
        else $bgColor = "#ffffff";

        $tr= "

                  Nothing
              ";

        fwrite($fileResource,$tr);

        $serial++;
    }


}
else {
    $list= 0;
    $obj->setData($_REQUEST);
    $oneData = $obj->view();
    $serial =1;
    $tr= "

                 You Advices
              ";

    fwrite($fileResource,$tr);
}









?>



<!DOCTYPE html>
<html>
<head>
    <title>Email This To A Friend</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../../../resources/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="../../../../../resources/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="../../../../../resources/bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>


    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>tinymce.init({
            selector: 'textarea',  // change this value according to your HTML

            menu: {
                table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
                tools: {title: 'Tools', items: 'spellchecker code'}

            }
        });


    </script>


</head>

<body>

<div class="container">
    <h2>Email This To A Friend</h2>
    <form  role="form" method="post" action="email.php<?php if(isset($_REQUEST['id'])) echo "?id=".$_REQUEST['id']; else echo "?list=1";?>">
        <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text"  name="name"  class="form-control" id="name" placeholder="Enter name of the recipient ">
            <label for="Email">Email Address:</label>
            <input type="text"  name="email"  class="form-control" id="email" placeholder="Enter recipient email address here...">

            <label for="Subject">Subject:</label>
            <input type="text"  name="subject"  class="form-control" id="subject" >
            <label for="body">Body:</label>

            <textarea   rows="8" cols="160"  name="body" >

            </textarea>

        </div>

        <input class="btn-lg btn-primary" type="submit" value="Send Email">

    </form>


    <?php


    if(isset($_REQUEST['email'])&&isset($_REQUEST['subject'])) {

        date_default_timezone_set('Etc/UTC');

        //Create a new PHPMailer instance
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587; //587
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls'; //tls
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = $gmailAddress;
        //Password to use for SMTP authentication
        $mail->Password = $gmailPassword;
        //Set who the message is to be sent from
        $mail->setFrom($gmailAddress, 'TEAM RHYTHM');
        //Set an alternative reply-to address
        $mail->addReplyTo($gmailAddress, 'TEAM RHYTHM');
        //Set who the message is to be sent to

        //echo $_REQUEST['email']; die();

        $mail->addAddress($_REQUEST['email'], $_REQUEST['name']);
        //Set the subject line
        $mail->Subject = $_REQUEST['subject'];
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
        //Replace the plain text body with one created manually
        //   $mail->AltBody = 'This is a plain-text message body';

        // $mail->Body = $_REQUEST['body'];

        $html = file_get_contents("content.html");
        $mail->msgHTML($html, dirname(__FILE__));

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5);color: white ;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'>
                            <strong>Success!</strong> Mail Sent successfully.
                </div>");

            ?>
            <script type="text/javascript">
                window.location.href = '../../adminindex.php';
            </script>
            <?php


        }

    }




    ?>



</div>
</body>


</html>