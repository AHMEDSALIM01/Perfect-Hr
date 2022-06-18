<?php

class LoginController extends Controller {
    public function __construct(){
        session_start();
     $this->AccountModel = $this->model('Adminfolder/','AdminModel');
     $this->EmployeModel = $this->model('employefolder/','EmployeModel');
    }
    
    public function index(){
      $data = [
        'title' => 'Login',
        'error' => '',
      ];

      if(isset($_POST['submit'])){
        $datas=[
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'error_email' => '',
            'error_password' => ''
            ];
        if(isset($_POST['checkbox'])){
            $datas['checkbox'] = $_POST['checkbox'];
        }
        if($datas['email']!=="" && $datas['password']!==""){
            if($this->AccountModel->getAccountByEmail($datas['email']) || $this->EmployeModel->getEmployeByEmail($datas['email'])){
                $datas['error_email'] = "";
                $datas['error_password'] = "";
                if($this->AccountModel->getAccountByEmailAndPassword($datas) || $this->EmployeModel->getEmployeByEmailAndPassword($datas)){
                    $admin=$this->AccountModel->getAccountByEmailAndPassword($datas);
                    $employe=$this->EmployeModel->getEmployeByEmailAndPassword($datas);
                    if(($employe->status == "active") || ($admin->status== "active")){
                        if($admin){
                            if($datas['checkbox']==1){
                                setcookie('email',$datas['email']);
                            }
                            $_SESSION['role'] = $admin->role;
                            $_SESSION['id'] = $admin->id_admin;
                            $_SESSION['email'] = $admin->email;
                            $_SESSION['nom_complet'] = $admin->nom_complet;
                            $_SESSION['image'] = $admin->image;
                            header('Location:'.URLROOT.'/admin/dashboard');
                        }
                        elseif($employe->role=="ingenieur"|| $employe->role=="technicien(ne)" || $employe->role=="cadre"){
                            if($datas['checkbox']==1){
                                setcookie('email',$datas['email']);
                            }
                            if($employe->count !=0){
                                $_SESSION['role'] = "employe";
                                $_SESSION['id'] = $employe->id_employe;
                                $_SESSION['email'] = $employe->email;
                                $_SESSION['nom_complet'] = $employe->nom_complet;
                                $_SESSION['image'] = $employe->image;
                                $_SESSION['count'] = $employe->count;
                                header('Location:'.URLROOT.'/employe/dashboard');
                            }else{
                                $_SESSION['role'] = "employe";
                                $_SESSION['id'] = $employe->id_employe;
                                $_SESSION['email'] = $employe->email;
                                $_SESSION['nom_complet'] = $employe->nom_complet;
                                $_SESSION['image'] = $employe->image;
                                $_SESSION['count'] = $employe->count;
                                header('Location:'.URLROOT.'/employe/profile');
                            }
                            
                        }
                    }else{
                        $data['error_email'] = "Votre compte n'est pas actif";
                        $this->view('index', $data);
                    }
                }else{
                    $data['error_password'] = "Email ou mot de passe incorrect";
                    $this->view('index', $data);
                }
            }else{
                $data = [
                    'title' => 'Login',
                    'error_email' => 'Email incorrect',
                  ];
                
                $this->view('index', $data);
            }
        }else{
            $data = [
                'title' => 'Login',
              ];

            if($datas['email']===""){
                $data['error_email'] = "Email required";
            }else{
                $data['error_email'] = "";
            }
            if($datas['password']===""){
                $data['error_password'] = "Password required";
            }else{
                $data['error_password'] = "";
            }
            $this->view('index', $data);
        }
        
        
      }


    
     if(!isset($_SESSION['role'])){
      $this->view('index', $data);
     }else{
         header('Location: '.URLROOT.'/'.$_SESSION['role'].'/dashboard');
     }
    }

    
    
}