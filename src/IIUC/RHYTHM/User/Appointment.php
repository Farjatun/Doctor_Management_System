<?php


namespace App\User;




use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class Appointment extends DB
{
    public $table = "appointment";
    public $appointment_id = "";
    public $c_id = "";
    public $name = "";
    public $mobile_no = "";
    public $email = "";
    public $age = "";
    public $gender = "";
    public $address = "";
    public $date = "";

  public function __construct()
    {
        parent::__construct();
    }


    public function setData($data)
    {
       if (array_key_exists('appointment_id', $data)) {
            $this->appointment_id = $data['appointment_id'];
        }
        if (array_key_exists('c_id', $data)) {
            $this->c_id = $data['c_id'];
        }

        if (array_key_exists('name', $data)) {
            $this->name = $data['name'];
        }

        if (array_key_exists('mobile_no', $data)) {
            $this->mobile_no = $data['mobile_no'];
        }
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('age', $data)) {
            $this->age = $data['age'];
        }
        if (array_key_exists('gender', $data)) {
            $this->gender = $data['gender'];
        }
        if (array_key_exists('address', $data)) {
            $this->address = $data['address'];
        }
        if (array_key_exists('date', $data)) {
            $this->date = $data['date'];
        }


// return $this;
    }


    public function store()
    {


        $dataArray = [$this->c_id,$this->name,$this->mobile_no,$this->email,$this->age,$this->gender,$this->address,$this->date];


        $query = "INSERT INTO appointment (c_id,name,mobile_no,email,age,gender,address,date)
VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)";


     $sth = $this->conn->prepare($query);
        $result = $sth->execute($dataArray);
        if ($result) {
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background-color: #5bc0de;color: white;box-shadow: 2px 2px 6px 2px #c0c0c0;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> Appointment taken successfully. </div>");
                 //return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5) ;box-shadow: 2px 2px 6px 2px #c0c0c0;padding: 10px;padding-top: 20px;z-index: 1000'>
                            <strong>Failed!</strong> Appointment has not been stored successfully.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function appointed_list(){
        $query = "SELECT * FROM appointment WHERE c_id=$this->c_id AND date='$this->date'";
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allPatients=  $STH->fetchAll();
        return $allPatients;
    }
    public function appointed_single_list(){
        $query = "SELECT * FROM appointment WHERE c_id=$this->c_id AND date='$this->date'";
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $onePatients=  $STH->fetch();
        return $onePatients;
    }


    public function confirm_patient_appointment(){
        $query = "SELECT a.first_name, a.last_name, a.working_field, b.chamber_name, b.chamber_location, c.name, c.date, c.mobile_no FROM doctor as a JOIN  chamber as b ON a.id=b.d_id JOIN appointment as c ON  b.c_id=c.c_id WHERE c.appointment_id=".$this->appointment_id;
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $onePatients=  $STH->fetch();
        return $onePatients;
    }

    public function all_appointed_list(){
        $query = "SELECT * FROM appointment WHERE c_id=$this->c_id";
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allPatients=  $STH->fetchAll();
        return $allPatients;
    }



}


