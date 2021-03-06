<?php


namespace App\User;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class chamber extends DB
{
    public $table = "chamber";
    public $chamber_Name = "";
    public $chamber_location = "";
    public $phone_no = "";
    public $day = "";
    public $max_App_Day = "";
    public $max_P_Limit = "";
    public $time_To = "";
    public $time = "";
    public $d_Id = "";
    public $c_Id = "";

    public function __construct(){
        parent::__construct();
    }


    public function setData($data = array())
    {
        if (array_key_exists('chamber_name', $data)) {
            $this->chamber_Name = $data['chamber_name'];
        }
        if (array_key_exists('chamber_location', $data)) {
            $this->chamber_location = $data['chamber_location'];
        }
        if (array_key_exists('phone_number', $data)) {
            $this->phone_no = $data['phone_number'];
        }

        if (array_key_exists('Day', $data)) {
            $this->day = $data['Day'];
        }
        if (array_key_exists('max_appointment_day', $data)) {
            $this->max_App_Day = $data['max_appointment_day'];
        }
        if (array_key_exists('patient_limit', $data)) {
            $this->max_P_Limit = $data['patient_limit'];
        }
        if (array_key_exists('timeto', $data)) {
            $this->time_To = $data['timeto'];
        }
        if (array_key_exists('time', $data)) {
            $this->time = $data['time'];
        }
        if (array_key_exists('d_id', $data)) {
            $this->d_Id = $data['d_id'];
        }
        if (array_key_exists('c_id', $data)) {
            $this->c_Id = $data['c_id'];
        }


        return $this;
    }

    public function storec()
    {


        $dataArray = array( ':chamber_name' => $this->chamber_Name, ':location' => $this->chamber_location, ':phone_no' => $this->phone_no,
            ':doctor_id' => $this->d_Id, ':days' => $this->day, ':max_app_day' => $this->max_App_Day, ':max_p_limit' => $this->max_P_Limit, ':time_to' => $this->time_To, ':times' => $this->time);


        $query = "INSERT INTO `doctor_management_system`.`chamber` (`chamber_name`, `chamber_location`, `phone_no`, `d_id`, `day`, `max_app_day`, `max_p_limit`, `timeto`, `time`) 
VALUES ( :chamber_name, :location, :phone_no, :doctor_id, :days, :max_app_day, :max_p_limit, :time_to, :times)";

        $sth = $this->conn->prepare($query);

        $result = $sth->execute($dataArray);

        if ($result) {
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background: linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> Chamber created successfully. </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5);color: white ;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'>
                            <strong>Failed!</strong> Chamber has not been stored successfully.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function indexc($did){

        $query = "SELECT * FROM `doctor` inner join `chamber` on `doctor`.id=`chamber`.d_id WHERE doctor.id=$did";

        //Utility::dd($query);
        $sth = $this->conn->query($query);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $allData=  $sth->fetchAll();
        return $allData;

    }// end of index() Method

    public function viewc($did){

        $query = "SELECT * FROM `doctor` inner join `chamber` on  `doctor`.id=`chamber`.d_id WHERE chamber.d_id=$did";

        $sth = $this->conn->query($query);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $oneData=  $sth->fetch();
        return $oneData;

    }// end of viewc() Method


    public function index_chamber($did){



        $query = "SELECT * FROM `doctor` inner join `chamber` on `doctor`.id=`chamber`.d_id WHERE  d_id=$did";


        //Utility::dd($query);
        $sth = $this->conn->query($query);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $allData=  $sth->fetchAll();
        return $allData;

    }// end of index() Method

    public function chamber_view($did){

        $query = "SELECT * FROM `doctor` inner join `chamber` on `doctor`.id=`chamber`.d_id WHERE c_id=$did";

        $sth = $this->conn->query($query);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $oneData=  $sth->fetch();
        return $oneData;

    }// end of viewc() Method
    //
    public function edit(){

        $query = "SELECT * FROM `chamber`  WHERE c_id=".$this->c_Id;

        $sth = $this->conn->query($query);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $oneData=  $sth->fetch();
        return $oneData;

    }// end of viewc() Method

    public function update_from_single_chamber(){


    $dataArray=[$this->chamber_Name, $this->chamber_location, $this->phone_no, $this->d_Id, $this->day, $this->max_App_Day, $this->max_P_Limit, $this->time_To, $this->time];



    $query="UPDATE `doctor_management_system`.`chamber` SET `chamber_name`=?, 
`chamber_location`=?, `phone_no`=?, `d_id`=?, `day`=?, `max_app_day`=?, `max_p_limit`=?, `timeto`=?, `time`=?  WHERE c_id=".$this->c_Id;

   
    $sth = $this->conn->prepare($query);

    $result = $sth->execute($dataArray);

        if ($result) {
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> Chamber updated successfully. </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5);color: white ;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'>
                            <strong>Failed!</strong> Chamber has not been updated successfully.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }
}

    public function delete_single_chamber(){


        $query = "DELETE FROM chamber WHERE c_id=".$this->c_Id;


        $result = $this->conn->exec($query);

        if ($result) {
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> Chamber  has been deleted successfully. </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5);color: white ;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'>
                            <strong>Failed!</strong> Falied !! Chamber has not been deleted successfully.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }

    }// end of delete()



    public function admin_index_chamber($did){



        $query = "SELECT * FROM `doctor` inner join `chamber` on `doctor`.id=`chamber`.d_id WHERE doctor.id=$did";

        //Utility::dd($query);
        $sth = $this->conn->query($query);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $allData=  $sth->fetchAll();
        return $allData;

    }// end of index() Method

    public function admin_index_chamber_view($did){

        $query = "SELECT * FROM `doctor` inner join `chamber` on  `doctor`.id=`chamber`.d_id WHERE chamber.d_id=$did";

        $sth = $this->conn->query($query);

        $sth->setFetchMode(PDO::FETCH_OBJ);

        $oneData=  $sth->fetch();
        return $oneData;

    }// end of viewc() Method




}


