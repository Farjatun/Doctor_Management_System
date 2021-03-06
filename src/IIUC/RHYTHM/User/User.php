<?php
namespace App\User;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class User extends DB{
    public $table="doctor";
    public $firstName="";
    public $lastName="";
    public $email="";
    public $password="";
    public $workingField="";
    public $designation="";
    public $bmdc="";
    public $fees="";
    public $discounted_fees="";
    public $workingExperience="";
    public $id="";
    public $email_token="";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data=array()){
        if(array_key_exists('firstName',$data)){
            $this->firstName=$data['firstName'];
        }
        if(array_key_exists('lastName',$data)){
            $this->lastName=$data['lastName'];
        }
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }

        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }
        if(array_key_exists('workingfield',$data)){
            $this->workingField=$data['workingfield'];
        }
        if(array_key_exists('Bmdc',$data)){
            $this->bmdc=$data['Bmdc'];
        }
        if(array_key_exists('designation',$data)){
            $this->designation=$data['designation'];
        }
        if(array_key_exists('experienceyear',$data)){
            $this->workingExperience=$data['experienceyear'];
        }
        if(array_key_exists('fees',$data)){
            $this->fees=$data['fees'];
        }

        if(array_key_exists('discounter_fees',$data)){
            $this->discounted_fees=$data['discounter_fees'];
        }

        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }

        if(array_key_exists('email_token',$data)){
            $this->email_token=$data['email_token'];
        }


        return $this;
    }





    public function store() {


       $dataArray= array(':firstName'=>$this->firstName,':lastName'=>$this->lastName,':email'=>$this->email,':password'=>$this->password,
            ':bmdc'=>$this->bmdc,':working'=>$this->workingField,':designation'=>$this->designation,':experience'=>$this->workingExperience,':fees'=>$this->fees,':discountedfees'=>$this->discounted_fees,':email_token'=>$this->email_token);


        $query="INSERT INTO `doctor_management_system`.`doctor` (`first_name`, `last_name`, `email`, `password`, `bmdc`,`working_field`, `designation`,`experience`,`fees`,`discounted_fees`,`email_verified`) 
VALUES (:firstName, :lastName, :email, :password, :bmdc, :working, :designation, :experience, :fees, :discountedfees, :email_token)";

        $sth=$this->conn->prepare($query);

        $result = $sth->execute($dataArray);

        if ($result) {
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background: linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> Doctor created successfully. Check your email to varify your account </div>");
            return Utility::redirect('login.php');
        } else {
            Message::message("
                <div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5);color: white ;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'>
                            <strong>Failed!</strong> Doctor has not been created successfully.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function change_password(){
        $query="UPDATE `doctor_management_system`.`doctor` SET `password`=:password  WHERE `doctor`.`email` =:email";
        $sth=$this->conn->prepare($query);
        $result = $sth->execute(array(':password'=>$this->password,':email'=>$this->email));

        if($result){
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background: linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> Password updated successfully. </div>");
        }
        else {
            echo "Error";
        }

    }


    public function view(){
        $query=" SELECT * FROM doctor WHERE email = '$this->email' ";
       // Utility::dd($query);
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();

    }// end of view()

    
    public function validTokenUpdate(){
        $query="UPDATE `doctor_management_system`.`doctor` SET  `email_verified`='".'Yes'."' WHERE `doctor`.`email` ='$this->email'";
        $sth=$this->conn->prepare($query);
        $result = $sth->execute();

        if($result){
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background: linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> Email verified successfully. </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('../../../../../views/IIUC/RHYTHM/User/Profile/login.php');
    }


    public function update_from_single_profile(){
        $dataArray=[$this->firstName,$this->lastName,$this->designation, $this->workingExperience,$this->fees,$this->discounted_fees];

       // Utility::dd($dataArray);
        $query="UPDATE doctor SET first_name=?,last_name =?,designation=?,experience=?,fees=?,discounted_fees=?  WHERE email='".$this->email."'";
//Utility::dd($query);

        $sth=$this->conn->prepare($query);
        $result = $sth->execute($dataArray);

        if ($result) {
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background: linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> Profile updated successfully. </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5);color: white ;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'>
                            <strong>Failed!</strong> Profile has not been updated successfully.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }

    }


    public function website_main_index(){

        $query="SELECT * FROM `doctor_management_system`.`doctor` WHERE is_real<>'NO' && `working_field`='$this->workingField'";
        //Utility::dd($query);
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allIndex=  $STH->fetchAll();
        return $allIndex;

    }
    public function website_main_view(){

        $query="SELECT * FROM `doctor_management_system`.`doctor` WHERE is_real<>'NO' && `working_field`='$this->workingField'";
        // Utility::dd($query);
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $someIndex=  $STH->fetch();
        return $someIndex;

    }

    public function admin_index(){
        $query="SELECT * FROM `doctor_management_system`.`doctor`  WHERE is_real<>'NO' ORDER BY id DESC";
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $adminIndex=  $STH->fetchAll();
        return $adminIndex;


    }
    public function admin_view_index(){
        $query="SELECT * FROM `doctor_management_system`.`doctor` WHERE is_real<>'NO'";
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $adminViewIndex=  $STH->fetch();
        return $adminViewIndex;


    }

    public function admin_delete_user(){

        $sqlQuery = "DELETE FROM doctor where id=".$this->id;

        $status = $this->conn->exec($sqlQuery);


        if ($status) {
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background: linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> User deleted successfully. </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5);color: white ;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'>
                            <strong>Failed!</strong> User has not been deleted.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function trash(){


        $sqlQuery = "UPDATE `doctor_management_system`.`doctor` SET is_real='NO' WHERE id=".$this->id;


        $status = $this->conn->exec($sqlQuery);

        if ($status) {
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background: linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> User trashed successfully. </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5);color: white ;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'>
                            <strong>Failed!</strong> User has not been trashed.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }


    }// end of trash()


    public function recover(){


        $sqlQuery = "UPDATE `doctor_management_system`.`doctor` SET is_real=NOW() WHERE id=".$this->id;


        $status = $this->conn->exec($sqlQuery);

        if ($status) {
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background: linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> User recovered successfully. </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5);color: white ;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'>
                            <strong>Failed!</strong> User has not been recovered.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }


    }// end of recover()


    public function admin_trashed(){
        $query="SELECT * FROM `doctor_management_system`.`doctor`  WHERE is_real='NO' ORDER BY id DESC";
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $adminIndex=  $STH->fetchAll();
        return $adminIndex;


    }
    public function admin_view_trashed(){
        $query="SELECT * FROM `doctor_management_system`.`doctor` WHERE is_real='NO'";
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $adminViewIndex=  $STH->fetch();
        return $adminViewIndex;


    }


    public function trashMultiple($selectedIDs)
    {


        if( count($selectedIDs) == 0 ){
            Message::message("Empty Selection! Please Select Some Records.<br>");
            return Utility::redirect($_SERVER['HTTP_REFERER']) ;
        }

        $status = true;

        foreach ($selectedIDs as $id){

            $sqlQuery = "UPDATE doctor SET is_real='NO' WHERE id=$id";
            if( !  $this->conn->exec($sqlQuery)  )   $status = false;
        }

        if ($status) {
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background: linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> Success! All Selected Data Has Been Trashed Successfully. </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5);color: white ;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'>
                            <strong>Failed!</strong> Failed! All Selected Data Has Not Been Trashed
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }


    }//end of function trashMultiple()


    public function deleteMultiple($selectedIDs)
    {


        if( count($selectedIDs) == 0 ){
            Message::message("Empty Selection! Please Select Some Records.<br>");
            return Utility::redirect($_SERVER['HTTP_REFERER']) ;
        }

        $status = true;

        foreach ($selectedIDs as $id){
            
            $sqlQuery = "DELETE FROM doctor  WHERE id=$id";
            if( !  $this->conn->exec($sqlQuery)  )   $status = false;
        }

        if ($status) {
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background: linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> Success! All Selected Data Has Been Deleted Successfully. </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5);color: white ;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'>
                            <strong>Failed!</strong> Failed! All Selected Data Has Not Been deleted
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }


    }//end of function deleteMultiple()


    public function recoverMultiple($selectedIDs)
    {


        if( count($selectedIDs) == 0 ){
            Message::message("Empty Selection! Please Select Some Records.<br>");
            return Utility::redirect($_SERVER['HTTP_REFERER']) ;
        }

        $status = true;

        foreach ($selectedIDs as $id){



            $sqlQuery = "UPDATE `doctor_management_system`.`doctor` SET is_real=NOW() WHERE id=$id";
            
            if( !  $this->conn->exec($sqlQuery)  )   $status = false;
        }

        if ($status) {
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background: linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> Success! All Selected Data Has Been Recovered Successfully. </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5);color: white ;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'>
                            <strong>Failed!</strong> Failed! All Selected Data Has Not Been Recovered
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }


    }//end of function recoverMultiple()




    public function indexPaginator($page=1,$itemsPerPage=3){


        $start = (($page-1) * $itemsPerPage);  // start means offset
        if($start<0) $start = 0;
        $sql = "SELECT * FROM `doctor_management_system`.`doctor`  WHERE is_real<>'NO'LIMIT $start,$itemsPerPage";


        $STH = $this->conn->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }// end of indexPaginator() Method



    public function trashedPaginator($page=1,$itemsPerPage=3){


        $start = (($page-1) * $itemsPerPage);  // start means offset
        if($start<0) $start = 0;
        $sql = "SELECT * FROM `doctor_management_system`.`doctor`  WHERE is_real='NO'LIMIT $start,$itemsPerPage";


        $STH = $this->conn->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;


    }// end of trashPaginator() Method









}

