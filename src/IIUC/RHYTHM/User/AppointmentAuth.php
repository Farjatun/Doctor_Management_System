<?php
/**
 * Created by PhpStorm.
 * User: FAHIM HASAN
 * Date: 10/23/2017
 * Time: 11:18 PM
 */

namespace App\User;
if(!isset($_SESSION) )  session_start();

use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;
class AppointmentAuth extends DB
{
    public $email = "";
    public $c_id= "";
    public $date= "";
    public $mobile_no="";

    public function __construct(){
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

        if (array_key_exists('mobile_no', $data)) {
            $this->mobile_no = $data['mobile_no'];
        }

        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }

        if (array_key_exists('date', $data)) {
            $this->date = $data['date'];
        }
    }
    public function is_exists(){

        $query="SELECT * FROM appointment WHERE mobile_no='$this->mobile_no' AND email='$this->email' AND c_id='$this->c_id' AND date='$this->date'";
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
}