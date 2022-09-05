<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model {

    function __construct() {
        helper(['url', 'html', 'form']);
        $this->db = \Config\Database::connect();
    }

    function validMember(){
       $emailAddress=$_POST['emailAddress'];
        $password=$_POST['password'];

        $query=$this->db->query("Call memberLogin('$emailAddress','$password')");
        if($query->getNumRows()>0){
            $result=$query->getRowArray();
            $_SESSION['Name']=$result['fName']." ". $result['lName'];
            $_SESSION['Member']=$result['kNumber'];
            $query->freeResult();
            return true;
        }else{
            return false;
        }
    }

    function validAdmin(){
        $emailAddress=$_POST['emailAddress'];
        $password=$_POST['password'];

        $query=$this->db->query("Call adminLogin('$emailAddress','$password')");
        if($query->getNumRows()>0){
            $result=$query->getRowArray();
            $_SESSION['Name']=$result['fName']." ". $result['lName'];
            $_SESSION['Member']=$result['kNumber'];
            $query->freeResult();
            return true;
        }else{
            return false;
        }
    }





}