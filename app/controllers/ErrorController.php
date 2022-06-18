<?php
class ErrorController extends Controller {
    public function __construct(){
     
    }
    public  function index(){
      session_start();
      $data = [
        'title' => '404',
        'controller' => '',
      ];
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        $data = [
          'title' => '404',
          'controller' => 'admin'
        ];
        $this->view('404/index', $data);
      }else{
        $data = [
          'title' => '404',
          'controller' => 'employe'
        ];
        $this->view('404/index', $data);
      }
      
      $this->view('404/index', $data);
    }
}