<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController
{ 
    

    protected $UserModel;        
    public function __construct()
    {  
        $this->UserModel=new UserModel();
    }
      
    public function index(): string
    {
        return view('login_page');
    }
    
    public function loginAuth()
    {
        $username= $this->request->getPost('username');
        $password= $this->request->getPost('password');
        $data =  $this->UserModel->where('username', $username)->where('password', $password)->first();
        

        if($data !== null && $data['username']==$username && $data['password']==$password)
        {
            $session = session();
            $id=$data['id'];
            $fullname=$data['fullname'];
            
            $session_data = [
                      'id'       =>$id,
                      'fullname'     =>$fullname,
                      'logged_in'     => TRUE
                  ];
                  
           $session->set($session_data);
           

          session()->setFlashdata('message', 'Login successfully!');      
          session()->setFlashdata('alert-class', 'alert-success');
          $returnTo = 'dashbord';
        }
        else
        {
           session()->setFlashdata('message', 'Invalid username or password');      
           session()->setFlashdata('alert-class', 'alert-danger'); 
           $returnTo = '';
        }  
        $this->response->redirect(base_url($returnTo));
    }
     

    public function Logout()
    {
        $session = session();
        $session->destroy();
        return view('login_page');
    }

}
