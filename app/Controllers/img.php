<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\lmrModel;
class img extends Controller
{
    public function index($kNumber)
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
 
       /*  $validated = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,4096]',
            ],
        ]);
 
        $msg = 'Please select a valid file'; */
  
      
            $avatar = $this->request->getFile('file');
            $avatar->move(WRITEPATH . 'uploads');
 
          $data = [
 
            'image_path' =>  $avatar->getClientName()
           
          ];
         
          $save = $builder->where('kNumber',$kNumber)
          ->insert($data);
          $msg = 'File has been uploaded';
        
 
       return redirect()->to( base_url('Home/profile') )->with('msg', $msg);
 
    
}
}