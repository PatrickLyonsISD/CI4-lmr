<?php

namespace App\Controllers;

use App\Models\lmrModel;

class Home extends BaseController {

    function __construct() {
        /* Loads the form and url helper */
        $this->session = \Config\Services::session();
        helper(['form', 'url', 'html']);
        $lmrModel = new \App\Models\lmrModel();
        $data['members'] = $lmrModel->getMembers();
        $this->db = \Config\Database::connect();
    }

    public function index() {
        echo view('header');
        echo view('home');
        echo view('footer');
    }

    function loginForm(){
        echo view('header');
        echo view('loginForm');
        echo view ('footer');
    }
//checks if knumber is =1 and if it does the user is directed to an admin page and if not the user is brought to their profile page witht their memberBookings displayed
    public function login() {
      $LoginModel=new \App\Models\LoginModel();
      $lmrModel=new \App\Models\lmrModel();
      $data['members']=$lmrModel->getMembers();

      if($LoginModel->validMember()){
        $data['fName']=$lmrModel->getMemberByNumber();
        echo view('header',$data);
        if($_SESSION['Member']==1){
            $data['memberBookings']=$lmrModel->getBookings();
            echo view('adminPortal',$data);
        }else{
            $data['memberBookings']=$lmrModel->getBookingsByNumber();
            echo view ('profile' ,$data);
        }
        echo view('footer');
      }else if($LoginModel->validCustomer()){
        echo view('header',$data);
        echo view('profile');
        echo view('footer');
      }else{
        $this->index();
      }
    }

   public function roomIndex(){
    $lmrModel = new \App\Models\lmrModel();
    $data['Rooms']=$lmrModel->getRooms();
    echo view('header',$data);
    echo view('roomManagement',$data);
    echo view('footer');
   }
      
        
    

    //repeating times across months and weeks
    public function calendar() {
        $db = \Config\Database::connect();
        $builder = $db->table('bookings');
        $query = $builder->select('*')
                        ->limit(10)->get();

        $data = $query->getResult();

        foreach ($data as $key => $value) {
            $data['data'][$key]['id'] = $value->booking_id;
            $data['data'][$key]['room'] = $value->room_id;
            $data['data'][$key]['date'] = $value->date_of_booking;
            $data['data'][$key]['start'] = $value->start_time_of_booking;
            $data['data'][$key]['end'] = $value->end_time_of_booking;
            $data['data'][$key]['kNumber'] = $value->knumber;

            $data['data'][$key]['backgroundColor'] = "#00a65a";
        }
        echo view('header');
        echo view('calendar', $data);
        echo view('footer');
    }




   function addBookingPage(){
    $lmrModel=new lmrModel();
    $data['members']=$lmrModel->getMembers();
    $data['fName']=$lmrModel->getBookingsByNumber();

    echo view('header',$data);
    echo view('addBooking',$data);
    echo view('footer');
   }

   function addBooking(){
    $lmrModel= new lmrModel();
    $lmrModel->addBookings();
    $this->Portal();
   }

    
    function BookingValidation() {
        helper(['form', 'url']);

        $error = $this->validate([
            'knumber' => 'required'
        ]);

        if (!$error) {
            echo view('addBooking', [
                'error' => $this->validator
            ]);
        } else {
            $model = new \App\Models\bookingTableModel();

            $model->save([
                'booking_id' => $this->request->getVar('booking_id'),
                'room_id' => $this->request->getVar('room_id'),
                'date_of_booking' => $this->request->getVar('date_of_booking'),
                'start_time_of_booking' => $this->request->getVar('start_time_of_booking'),
                'end_time_of_booking' => $this->request->getVar('end_time_of_booking'),
                'knumber' => $this->request->getVar('knumber')
            ]);

            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Booking created');
//return home for now create profile page then redirect there 
            return $this->response->redirect(site_url('/Home/calendar'));
        }
    }

    function getBooking() {
        $db = \Config\Database::connect();
        $builder = $db->table('bookings');
        $query = $this->db->query("Call getBookings");
        $result = $query->getResultArray();
        $query->freeResult();
        return $result;
    }



    function addUser() {
        echo view('header');
        return view('login');
        echo view('footer');
    }

    function userValidation() {
        helper(['form', 'url']);

        $error = $this->validate([
            'kNumber' => 'required|min_length[3]',
            'fName' => 'required',
            'lName' => 'required',
            'emailAddress' => 'required',
            'telephoneNo' => 'required',
            'password' => 'required'
        ]);

        if (!$error) {
            echo view('login', [
                'error' => $this->validator
            ]);
        } else {
            $model = new \App\Models\memberTableModel();

            $model->save([
                'knumber' => $this->request->getVar('knumber'),
                'fName' => $this->request->getVar('fName'),
                'lName' => $this->request->getVar('lName'),
                'emailAddress' => $this->request->getVar('emailAddress'),
                'telephoneNo' => $this->request->getVar('telephoneNo'),
                'password' => $this->request->getVar('password'),
            ]);

            $session = \Config\Services::session();

            $session->setFlashdata('success', 'profile Created');

            return $this->response->redirect(site_url('/Home/login'));
        }
    }

    public function register(){
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[members.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new \App\Models\memberTableModel();

                $newData = [
                    'kNumber' => $this->request->getVar('kNumeber'),
                    'fName' => $this->request->getVar('fName'),
                    'lName' => $this->request->getVar('lName'),
                    'emailAddress' => $this->request->getVar('emailAddress'),
                    'telephoneNo' => $this->request->getVar('telephoneNo'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'You have been registered');
                return redirect()->to('/');
            }
        }
        
        echo view('header',$data);
        echo view('register');
        echo view('footer');
    }
    
    public function logout(){
        unset($_SESSION['Name']);
        unset($_SESSION['member']);
        $this->session->destroy();
       $this->loginForm();
    }

    function BookingPromo($bookingKnumber){
        $lmrModel= new \App\Models\lmrModel();
        $data['members']=$lmrModel->getMembers();
        $data['bookingDetails']=$lmrModel->getBookingsByMembers($bookingKnumber);

        echo view('header',$data);
        echo view('bookingsPromo',$data);
        echo view('footer');

    }


  function updateBookingPage($booking_id){
    $lmrModel=new \App\Models\lmrModel();
    $data['bookingInfo']=$lmrModel->getBookingById($booking_id);
    $data['members']=$lmrModel->getMembers();
    echo view('header',$data);
    echo view('updateBooking',$data);
    echo view('footer');
  }

  function updateBooking($booking_id){
    $lmrModel=new \App\Models\lmrModel();
    $lmrModel->updateBooking($booking_id);
    $data['members']=$lmrModel->getMembers();
    $data['bookings']=$lmrModel->getBookings();
    $this->Portal();
  }

  function updateRoomPage($room_id){
    $lmrModel = new \App\Models\lmrModel();
    $data['roomInfo']=$lmrModel->getRoomById($room_id);
    $data['members']=$lmrModel->getMembers();
    echo view('header',$data);
    echo view('updateRoom',$data);
    echo view ('footer');
  }


  function updateRoom($room_id){
    $lmrModel=new \App\Models\lmrModel();
    $lmrModel->updateRoom($room_id);
    $data['members']=$lmrModel->getMembers();
    $data['rooms']=$lmrModel->getRooms();
    $this->roomIndex();
  }

  function updateUserPage($kNumber){
    $lmrModel=new \App\Models\lmrModel();
    $data['userInfo']=$lmrModel->getMemberByKNumber($kNumber);
    $data['members']=$lmrModel->getMembers();
    echo view('header',$data);
    echo view('updateUser',$data);
    echo view('footer');
  }

  function updateUser($kNumber){
    $lmrModel= new \App\Models\lmrModel();
    $lmrModel->updateUser($kNumber);
    $data['members']=$lmrModel->getMembers();
    $this->profile();
  
  }

   function Portal(){
    $lmrModel= new \App\Models\lmrModel();
    $data['members']=$lmrModel->getMembers();
    echo view('header',$data);

    if (isset($_SESSION['Member'])){
        if($_SESSION['Member']==1){
            $data['memberBookings']=$lmrModel->getBookings();
            echo view('adminPortal',$data);
        }else{
            $data['memberBookings']=$lmrModel->getBookingsByMembers();
            $data['fName']=$lmrModel->getMemberByNumber();
            echo view('profile',$data);
        }
    }
    echo view('footer');
    
   }

   function deleteBooking($booking_id){
    $lmrModel= new \app\Models\lmrModel();
    $lmrModel->deleteBooking($booking_id);
    $data['members']=$lmrModel->getMembers();
    $data['bookings']=$lmrModel->getBookings();
    $this->Portal();
   }


   function profile(){
    $lmrModel=new \App\Models\lmrModel();
    $data['members']=$lmrModel->getMembers();
    echo view('header',$data);
    if(isset($_SESSION['Member'])){
        $data['Users']=$lmrModel->getMemberDetails();
        $data['fname']=$lmrModel->getMemberByNumber();
        echo view('userProfile',$data);
    }
   echo view('footer'); 
   
   }

   public function img($kNumber)
    {   
         $lmrModel=new \App\Models\lmrModel();
        $data['userInfo']=$lmrModel->getMemberByKNumber($kNumber);
        $data['members']=$lmrModel->getMembers();
        echo view('header',$data);
        echo view('form',$data);
        echo view('footer');
        
        
    }
 
   public function store($kNumber)
   {  
    $lmrModel=new \App\Models\lmrModel();
   
    $data['members']=$lmrModel->getMemberByKNumber($kNumber);
 
     helper(['form', 'url']);
         
     $db      = \Config\Database::connect();
         $builder = $db->table('members');
 
        $validated = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
        ]);
 
        $msg = 'Please select a valid file';
  
      
            $avatar = $this->request->getFile('file');
            $avatar->move(WRITEPATH . 'uploads');
 
          $data = [
          
            'image_path' =>  $avatar->getClientName()
           
          ];
          
        
        
        $save = $builder ->where('kNumber',$kNumber);
           $save = $builder ->update($data);
         
          $msg = 'File has been uploaded';
        
 
       return redirect()->to( base_url('Home/profile') )->with('msg', $msg);
 
    
}

}
