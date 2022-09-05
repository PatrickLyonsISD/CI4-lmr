<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface; //Allows you to get instance of database
use CodeIgniter\Model;

class bookingTableModel extends Model
{
 protected $table = 'bookings';
 protected $primaryKey='booking_id';
 protected $allowedFields = ['booking_id', 'room_id', 'date_of_booking','start_time_of_model','end_time_of_booking','knumber'];
}
?>