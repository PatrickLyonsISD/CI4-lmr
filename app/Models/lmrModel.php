<?php

namespace App\Models;

use CodeIgniter\Model;

class lmrModel extends Model
{

    function __construct()
    {
        helper(['url', 'html', 'form']);
        $this->db = \Config\Database::connect();
      
    }

    function fetch_all_event() {
        $this->db->order_by('id');
        return $this->db->get('events');
    }
    
    function getBookings()
    {
        $query = $this->db->query("Call getBookings");
        $result = $query->getResultArray();
        $query->freeResult();
        return $result;
    }

    public function addEvent() {



        $roomId = $_POST['room_id'];
        $date = $_POST['date_of_booking'];
        $startTime = $_POST['start_time_of_booking'];
        $endTime = $_POST['end_time_of_booking'];
        $knumber = $_POST['knumber'];


        //Call Stored Procedure to insert into the master name Table
        $db->query("CALL addBooking('$roomId', '$date','$startTime', '$endTime','$knumber','@booking_id')");
        //The Output Parameter - Retrieve the new master_id for the new contact just added
        $booking_id_Value = $db->query("SELECT @booking_id as booking_id")->getRow();
        $booking_id = $booking_id_Value->TeamID;
        return $booking_id;
    }

    
    function addBookings(){
        $db = \Config\Database::connect(); //Connect to the database
        $builder = $db->table('bookings');

     $room_id = $_POST['room_id'];
     $date_of_booking =  $_POST['date_of_booking'];
     $start_time_of_booking = $_POST['start_time_of_booking'];
     $end_time_of_booking = $_POST['end_time_of_booking'];
     $knumber = $_POST['knumber'];     

     $db->query("Call addBooking('$room_id', '$date_of_booking','$start_time_of_booking','$end_time_of_booking','$knumber','@booking_id')");
     
         
 
 }
    
    public function addUser() {
        $db = \Config\Database::connect(); //Connect to the database
        $builder = $db->table('members'); //Specify the table to run query on
        //Data to add to table
        $knum=$_POST['kNumber'];
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $email = $_POST['emailAddress'];
        $Num = $_POST['telephoneNo'];
        $password = $_POST['Password'];
        
        //Call Stored Procedure to insert into Table
        $db->query("CALL addUser('$knum','$fName', '$lName', '$email', '$Num','$password')");
        
    }

    function Register(){
        $knum=$_POST['kNumber'];
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $email = $_POST['emailAddress'];
        $Num = $_POST['telephoneNo'];
        $password = $_POST['password'];
        
       
       $query=$this->db->query("CALL addUser('$knum','$fName', '$lName', '$email', '$Num','$password')");
    }

    function getMembers(){
        $query=$this->db->query("Call getMembers");
        $result=$query->getResultArray();
        $query->freeResult();
        return $result;
    }
    function getMemberByNumber(){
        $kNumber=$_SESSION['Member'];
        $query=$this->db->query("Call getMemberByNumber($kNumber)");
        $result=$query->getRowArray();
        $query->freeResult();
        return $result;
    }

    function getBookingById($booking_id){
        $query=$this->db->query("Call getBookingById($booking_id)");
        $result=$query->getRowArray();
        $query->freeResult();
        return $result;
    }

    function getRoomById($room_id){
        $query=$this->db->query("Call getRoomById($room_id)");
        $result=$query->getRowArray();
        $query->freeResult();
        return $result;
    }

    function getMemberByKNumber($kNumber){
        $query=$this->db->query("Call getMemberbyKNumber($kNumber)");
        $result=$query->getRowArray();
        $query->freeResult();
        return $result;
    
    }

    function getBookingsByMembers(){
        $knumber=$_SESSION['Member'];
        $query=$this->db->query("Call getBookingsByMembers($knumber)");
        $result=$query->getResultArray();
        $query->freeResult();
        return $result;

    }

    function getMemberDetails(){
        $knumber=$_SESSION['Member'];
        $query=$this->db->query("Call getMemberDetails($knumber)");
        $result=$query->getResultArray();
        $query->freeResult();
        return $result;
    }

    function getBookingsByNumber(){
        $memberID=$_SESSION['Member'];
        $query=$this->db->query("Call getBookingsByMembers($memberID)");
        $result=$query->getResultArray();
        $query->freeResult();
        return $result;
    }

   

    function updateBookingMember($booking_id){
        $dateString=$_POST['date_of_booking'];
        $time=strtotime($dateString);
        $dateArray=getdate($time);
        $date=$dateArray['year']."/".$dateArray['mon']."/".$dateArray['mday'];
        $roomId=$_POST['room_id'];
        
        $this->db->query("Call updateBooking('$date','$roomId')");
    }

    function getBooking(){
        $query=$this->db->query("Call getbookings");
        $result=$query->getResultArray();
        $query->freeResult();
        return $result;
    }

    function getBookingInfoForUpdate($booking_id){
        $query=$this->db->query("Call getBookingDetailsForUpdate($booking_id)");
        $result=$query->getRowArray();
        $query->freeResult();
        return $result;
    }



    function updateBooking($booking_id){
      
       $date_of_booking=$_POST['date_of_booking'];
       $room_id=$_POST['room_id'];
       $start_time_of_booking=$_POST['start_time_of_booking'];
       $end_time_of_booking=$_POST['end_time_of_booking'];

       $query=$this->db->query("Call UpdateBooking($booking_id,'$date_of_booking','$room_id','$start_time_of_booking','$end_time_of_booking')");
    }

    function deleteBooking($booking_id){
        $query=$this->db->query("Call deleteBooking($booking_id)");
    }

    function getRooms(){
        $query=$this->db->query("Call getRooms");
        $result=$query->getResultArray();
        $query->freeResult();
        return $result;
    }
    

    function updateRoom($room_id){
        $capacity=$_POST['capacity'];
        $computer_access=$_POST['computer_access'];
        $available=$_POST['available'];
        $non_availability_reason=$_POST['non_availability_reason'];

        $query=$this->db->query("Call updateRoom($room_id, '$capacity', '$computer_access','$available', ' $non_availability_reason')");

    
    }

    function updateUser($kNumber){
        $fName=$_POST['fName'];
        $lName=$_POST['lName'];
        $emailAddress=$_POST['emailAddress'];
        $telephoneNo=$_POST['telephoneNo'];
        $password=$_POST['password'];

        $query=$this->db->query("Call updateUser($kNumber,'$fName','$lName','$emailAddress','$telephoneNo','$password')");
    }

}
?>