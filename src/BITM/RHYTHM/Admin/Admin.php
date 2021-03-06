<?php
/**
 * Created by PhpStorm.
 * User: FAHIM HASAN
 * Date: 10/18/2017
 * Time: 11:19 PM
 */

namespace App\Admin;

use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;

class Admin extends DB
{
    public $email = "";
    public $password = "";

    public function __construct(){
        parent::__construct();
    }

    public function setData($data = Array()){
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = ($data['password']);
        }
        return $this;
    }

    public function store(){
        $sqlQuery = "INSERT INTO admin (email, password)  VALUES ( ?, ?)";
        $sth = $this->conn->prepare( $sqlQuery );


        $dataArray = [ $this->email, $this->password];

        $status = $sth->execute($dataArray);

        if ($status) {
            Message::message("<div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background: linear-gradient(#b9def0,#31b0d5);color: white;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'><strong>Success!</strong> Admin created successfully. </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        } else {
            Message::message("
                <div class='something' style='position: fixed;left: 20px;bottom: 80px;height: 90px;width: 300px;background:linear-gradient(#b9def0,#31b0d5);color: white ;box-shadow: 2px 2px 6px 2px #000000;padding: 10px;padding-top: 20px;z-index: 1000'>
                            <strong>Failed!</strong> Admin has not been created successfully.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }


    }

    public function is_registered(){
        $query = "SELECT * FROM `admin` WHERE `email`='$this->email' AND `password`='$this->password'";
        $sth=$this->conn->query($query);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $sth->fetchAll();

        $count = $sth->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function logged_in(){
        if ((array_key_exists('email', $_SESSION)) && (!empty($_SESSION['email']))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['email']="";
        return TRUE;
    }
}