<?php

namespace App\Controllers;

use App\Models\memberTableModel;

class memberController extends BaseController {
      function __construct() {
        /* Loads the form and url helper */
        $this->session = \Config\Services::session();
        helper(['form', 'url', 'html']);
    
    }

    public function index() {
        $data = [];
        helper(['form']);


        if ($this->request->getMethod() == 'post') {
            // validation here
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new \App\Models\memberTableModel();

                $user = $model->where('email', $this->request->getVar('email'))
                        ->first();

                $this->setUserSession($user);
                //$session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('dashboard');
            }
        }

        echo view('header', $data);
        echo view('login');
        echo view('footer');
    }

    private function setUserSession($user) {
        $data = [
            'knumber' => $user['knumber'],
            'fName' => $user['fName'],
            'lName' => $user['lName'],
            'emailAddress' => $user['emailAddress'],
            'telephoneNo' => $user['telephoneNo'],
            'password' => $user['password'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function register() {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'knumber' => 'required',
                'telephone' => 'required',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new \App\Models\memberTableModel();

                $newData = [
                    'knumber' => $this->request->getVar('knumber'),
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'emailAddress' => $this->request->getVar('emailAddress'),
                    'telephoneNo' => $this->request->getVar('telephoneNo'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/');
            }
        }


        echo view('header', $data);
        echo view('register1');
        echo view('footer');
    }

    public function profile() {

        $data = [];
        helper(['form']);
        $model = new \App\Models\memberTableModel();

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
            ];

            if ($this->request->getPost('password') != '') {
                $rules['password'] = 'required|min_length[8]|max_length[255]';
                $rules['password_confirm'] = 'matches[password]';
            }


            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {

                $newData = [
                    'knumber' => session()->get('knumber'),
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                ];
                if ($this->request->getPost('password') != '') {
                    $newData['password'] = $this->request->getPost('password');
                }
                $model->save($newData);

                session()->setFlashdata('success', 'Successfuly Updated');
                return redirect()->to('/profile');
            }
        }

        $data['user'] = $model->where('knumber', session()->get('knumber'))->first();
        echo view('header', $data);
        echo view('profile');
        echo view('footer');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }

    public function add(){
        $lmrModel= new \App\Models\lmrModel();
        $lmrModel->Register();
        
        echo view('header');
        echo view('loginForm');
        echo view('footer');

    }

    function loginForm(){
        echo view('loginForm');
    }

    function Login(){
        $LoginModel=new \App\Models\LoginModel();
        $lmrModel= new \App\Models\lmrModel();

        $data['members']=$lmrModel->getMembers();

        if($LoginModel->validMember()){
            $data['kNumber']=$lmrModel->getMemberByKnumber();
            echo view('header',$data);
            if($_SESSION['member']==1){
                $data['bookings']=$lmrModel->getBookings();
                echo view('adminPortal',$data);
            }else if ($lmrModel->validMember()){
                echo view('header',$data);
                echo view('calendar');
                echo view('footer');

            }else{
                $this->index();
            }
            }
        }
    }

