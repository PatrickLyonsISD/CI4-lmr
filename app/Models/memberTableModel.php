<?php
namespace App\Models;
use CodeIgniter\Database\ConnectionInterface; //Allows you to get instance of database
use CodeIgniter\Model;

class memberTableModel extends Model
{
 protected $table = 'members';
 protected $primaryKey='kNumber';
 protected $allowedFields = ['kNumber', 'fName', 'lName','emailAddress','telephoneNo','password'];

protected function passwordHash(array $data){
    if(isset($data['data']['password']))
      $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

    return $data;
  }

}
?>
