<?php
  class Admin extends Controller {
    public function __construct(){
     
      session_start();

      $this->adminModel = $this->model('Adminfolder/','AdminModel');
      $this->tachesModel = $this->model('Adminfolder/','TachesAdmin');
      $this->congesModel = $this->model('Adminfolder/','CongesAdmin');
      $this->evenementModel = $this->model('Adminfolder/','EvenementAdmin');
      $this->notificationModel = $this->model('./','Notification');
      $this->messageModel = $this->model('./','Messages');
      $this->documentModel = $this->model('Adminfolder/','DocumentsAdmin');
    }
    
    

    public function dashboard(){
      
      
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        if($this->adminModel->getAllEmployeLimit(0,5)){
          $data = [
            'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
            'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
            'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
            'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
            'employe' => $this->adminModel->getAllEmployeLimit(0,5),
            'title' => 'Dashboard'
          ];
          
          }else{
            $data = [
              'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
              'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
              'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
              'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
              'title' => 'Dashboard',
            ];
          }
        $this->view('admin/dashboard/index', $data);
       }elseif(!isset($_SESSION['role'])){

          header('Location:'.URLROOT.'/index');

       }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }

    }

    public function comptes(){
      $data = [
        'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
        'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
        'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
          'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
        'title' => 'Comptes'
      ];
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        $this->view('admin/comptes/index', $data);
       }elseif(!isset($_SESSION['role'])){

        header('Location:'.URLROOT.'/index');

     }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }

    public function conges(){
      $data = [
        'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
        'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
        'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
        'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
        'title' => 'Congés'
      ];
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        if($this->congesModel->getAll()){
          $data = [
            'conges' => $this->congesModel->getAll(),
            'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
            'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
            'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
            'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
            'title' => 'Congés'
          ];
          
          }else{
            $data = [
              'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
              'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
              'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
          'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
              'title' => 'Congés',
            ];
          }
        $this->view('admin/congés/index', $data);
        
       }elseif(!isset($_SESSION['role'])){

        header('Location:'.URLROOT.'/index');

     }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }
    
    public function accepte($id){
      if($this->congesModel->accepteConges($id)){
        $congesEmploye=$this->congesModel->getCongeByIdAndIdEmploye($id);
        $data=[
          'id_employe'=>$congesEmploye->id_employe,
          'designation'=>'votre demande de congé a été acceptée.',
          'type'=>'conge'
        ];
        if($this->notificationModel->addNotificationEmploye($data)){
          header('Location: '.URLROOT.'/admin/conges');
        }
      }else{
        die('Something went wrong');
      }
    }

    public function refuse($id){
      if($this->congesModel->refuseConges($id)){
        $congesEmploye=$this->congesModel->getCongeByIdAndIdEmploye($id);
        $data=[
          'id_employe'=>$congesEmploye->id_employe,
          'designation'=>'votre demande de congé a été refusée.',
          'type'=>'conge'
        ];
        if($this->notificationModel->addNotificationEmploye($data)){
          header('Location: '.URLROOT.'/admin/conges');
        }
      }else{
        die('Something went wrong');
      }
    }

    public function employe(){
      
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        if(isset($_POST['ajouter'])){
          $upload_dir ='C:/wamp64/www/Projet-Fil-Rouge/public/img/';
          $img_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
          $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
          $userpic = rand(1000, 1000000).'.'.$img_ext;
          $size = $_FILES['image']['size'];

          $data=[
            'nom_complet' => $_POST['nom_complet'],
            'cin' => $_POST['cin'],
            'date_naissance' => $_POST['date_naissance'],
            'lieu_naissance' => $_POST['lieu_naissance'],
            'email' => $_POST['email'],
            'telephone' => $_POST['telephone'],
            'adress' => $_POST['adress'],
            'role' => $_POST['role'],
            'date_embauche' => $_POST['date_embauche'],
            'n_cnss' => $_POST['n_cnss'],
            'compte_bancaire' => $_POST['compte_bancaire'],
            'banque' => $_POST['banque'],
            'image' => $userpic,
          ];

          

          if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir.$userpic) && $size < 5000000){
                if($this->adminModel->createEmploye($data)){
                    header('Location: '.URLROOT.'/admin/employe');
                }
          }else{
            die('Something went wrong');
          }
         
        }
        
        if($this->adminModel->getAllEmployeLimit(0,5)){
          $data = [
            'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
            'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
            'employe' => $this->adminModel->getAllEmployeLimit(0,5),
            'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
            'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
            'title' => 'Employés',
          ];
          
          }else{
            $data = [
              'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
              'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
              'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
              'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
              'title' => 'Dashboard',
            ];
          }
        $this->view('admin/employé/index', $data);
       }elseif(!isset($_SESSION['role'])){

        header('Location:'.URLROOT.'/index');

     }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }

    public function evenement(){
      $data = [
        'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
        'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
        'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
        'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
        'title' => 'Evénements'
      ];
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        if($this->evenementModel->getAll()){
          $data = [
            'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
            'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
            'evenement' => $this->evenementModel->getAll(),
            'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
            'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
            'title' => 'Evénements'
          ];
          
          }else{
            $data = [
              'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
              'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
              'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
              'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
              'title' => 'Evénements',
            ];
          }
        $this->view('admin/evenement/index', $data);
       }elseif(!isset($_SESSION['role'])){

        header('Location:'.URLROOT.'/index');

     }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
      
    }

    public function closeEvenement($id){
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        if($this->evenementModel->closeEvent($id)){
          header('Location: '.URLROOT.'/admin/evenement');
        }else{
          die('Something went wrong');
        }
      }elseif(!isset($_SESSION['role'])){
          
          header('Location:'.URLROOT.'/index');
      }else{
          header('Location: '.URLROOT.'/ErrorController/index');
      }
    }

    public function addEvenement(){
      
      $data = [
        'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
        'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
        'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
        'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
        'title' => 'Ajouter un événement'
      ];
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        if(isset($_POST['add'])){
          $data=[
            'designation' => $_POST['designation'],
            'date_evenement' => $_POST['date_evenement'],
            'lieu_evenement' => $_POST['lieu_evenement'],

          ];
          if(!empty($data['designation']) && !empty($data['date_evenement']) && !empty($data['lieu_evenement'])){
            if($this->evenementModel->createEvenement($data)){
                header('Location: '.URLROOT.'/admin/evenement');
            }
          }else{
            die('Something went wrong');
          }
        }
        $this->view('admin/evenement/add', $data);
       }elseif(!isset($_SESSION['role'])){

        header('Location:'.URLROOT.'/index');

     }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }

    public function editEvenement($id){
      $data = [
        'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
        'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
        'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
        'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
        'title' => 'Modifier un événement'
      ];
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        if(isset($_POST['edit'])){
          $data=[
            'id' => $id,
            'designation' => $_POST['designation'],
            'date_evenement' => $_POST['date_evenement'],
            'lieu_evenement' => $_POST['lieu_evenement'],
          ];
          if(!empty($data['designation']) && !empty($data['date_evenement']) && !empty($data['lieu_evenement'])){
            if($this->evenementModel->updateEvenement($data)){
                header('Location: '.URLROOT.'/admin/evenement');
          }}else{
            die('Something went wrong');
          }
        }
        $data=[
          'evenement' => $this->evenementModel->getEvenementById($id),
          'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
          'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
          'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
          'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
        ];
        $this->view('admin/evenement/edit', $data);
        }elseif(!isset($_SESSION['role'])){
          header('Location:'.URLROOT.'/index');
        }else{
            header('Location: '.URLROOT.'/ErrorController/index');
        }
    }

    public function deleteEvenement($id){
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        if($this->evenementModel->deleteEvenement($id)){
          header('Location: '.URLROOT.'/admin/evenement');
        }else{
          die('Something went wrong');
        }
      }elseif(!isset($_SESSION['role'])){
          
          header('Location:'.URLROOT.'/index');
      }else{
          header('Location: '.URLROOT.'/ErrorController/index');
      }
    }

    public function taches(){
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        $data = [
          'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
          'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
          'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
          'messages'=>$this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
          'employe'=>$this->adminModel->getAllEmploye(),
          'title' => 'Taches'
        ];
        if(isset($_POST['ajouter'])){
          $data=[
            'designation' => $_POST['designation'],
            'duree' => $_POST['duree'],
            'id_employe' => $_POST['id_employe'],
          ];
          if($data['id_employe'] != "" || $data['designation'] != "" || $data['duree'] != ""){
              if($this->tachesModel->createTache($data)){
                  header('Location: '.URLROOT.'/admin/taches');
              }
          
          }
        } 
        if($this->tachesModel->getAllTachesEncours() && $this->tachesModel->getAllTachesTermine()){
          $data = [
            'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
            'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
            'employe'=>$this->adminModel->getAllEmploye() ? $this->adminModel->getAllEmploye() : "",
            'tacheEncours' => $this->tachesModel->getAllTachesEncours(),
            'tacheTermine' => $this->tachesModel->getAllTachesTermine(),
            'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
            'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
            'title' => 'Taches',
          ];
          
        }elseif($this->tachesModel->getAllTachesEncours()){
          $data = [
            'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
            'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
            'employe'=>$this->adminModel->getAllEmploye(),
            'tacheEncours' => $this->tachesModel->getAllTachesEncours(),
            'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
            'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
            'title' => 'Taches',
          ];
        }elseif($this->tachesModel->getAllTachesTermine()){
          $data = [
            'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
            'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
            'employe'=>$this->adminModel->getAllEmploye(),
            'tacheTermine' => $this->tachesModel->getAllTachesTermine(),
            'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
            'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
            'title' => 'Taches',
          ];
        }
        else{
          $data = [
            'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
            'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
            'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
            'messages'=>$this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
            'employe'=>$this->adminModel->getAllEmploye(),
            'title' => 'Taches'
          ];
        }
        $this->view('admin/taches/index', $data);
       }elseif(!isset($_SESSION['role'])){

        header('Location:'.URLROOT.'/index');

     }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }

    public function delete($id){
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        
        if($this->adminModel->getEmployeById($id)){
          $image=$this->adminModel->getEmployeById($id);
          if(unlink('C:/wamp64/www/Projet-Fil-Rouge/public/img/'.$image->image)){
            if($this->adminModel->deleteEmploye($id)){
              header('Location: '.URLROOT.'/admin/employe');
            }else{
              die('Something went wrong');
            }
          }
          
          // flash('employe_deleted','Employé supprimé avec succès');
          
        }else{
          die('Erreur');
        }
      }elseif(!isset($_SESSION['role'])){
          header('Location:'.URLROOT.'/index');
      }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }


    public function detail($id){
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        if($this->adminModel->getEmployeById($id)){
          $data = [
            'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
            'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
            'employe' => $this->adminModel->getEmployeById($id),
            'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
            'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
            'title' => 'Detail'
          ];
          $this->view('admin/employé/detail', $data);
          }else{
            $data = [
              'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
              'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
              'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
              'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
              'title' => 'Detail de l\'employé',
            ];
          }
        $this->view('admin/employé/detail', $data);
      }elseif(!isset($_SESSION['role'])){

        header('Location:'.URLROOT.'/index');

      }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    
    }

    public function editemploye(){
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        if(isset($_POST['edit'])){
          
          $image = $this->adminModel->getEmployeById($_POST['id'])->image;
          $upload_dir ='C:/wamp64/www/Projet-Fil-Rouge/public/img/';
            $img_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
            $userpic = rand(1000, 1000000).'.'.$img_ext;
            $size = $_FILES['image']['size'];
          $data=[
            'id' => $_POST['id'],
            'nom_complet' => $_POST['nom_complet'],
            'cin' => $_POST['cin'],
            'date_naissance' => $_POST['date_naissance'],
            'lieu_naissance' => $_POST['lieu_naissance'],
            'email' => $_POST['email'],
            'telephone' => $_POST['telephone'],
            'adress' => $_POST['adress'],
            'role' => $_POST['role'],
            'date_embauche' => $_POST['date_embauche'],
            'n_cnss' => $_POST['n_cnss'],
            'compte_bancaire' => $_POST['compte_bancaire'],
            'banque' => $_POST['banque'],
            'image' => $userpic,
          ];
        
          if($size != 0){
              $data['image'] = $userpic;
              if($this->adminModel->updateEmploye($data)){
                move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir.$userpic);
                header('Location: '.URLROOT.'/admin/employe');
              }
            
          }else{
            $data=[
              'id' => $_POST['id'],
              'nom_complet' => $_POST['nom_complet'],
              'cin' => $_POST['cin'],
              'date_naissance' => $_POST['date_naissance'],
              'lieu_naissance' => $_POST['lieu_naissance'],
              'email' => $_POST['email'],
              'telephone' => $_POST['telephone'],
              'adress' => $_POST['adress'],
              'role' => $_POST['role'],
              'date_embauche' => $_POST['date_embauche'],
              'n_cnss' => $_POST['n_cnss'],
              'compte_bancaire' => $_POST['compte_bancaire'],
              'banque' => $_POST['banque'],
              'image' => $image,
            ];
            if($this->adminModel->updateEmploye($data)){
              header('Location: '.URLROOT.'/admin/employe');
            }
          }
        }
        

    }elseif(!isset($_SESSION['role'])){
        header('Location:'.URLROOT.'/index');
    }
     else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }
  

    public function desactivercompte($id){
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        if($this->adminModel->deactiveAccount($id)){
          // flash('employe_deleted','Employé supprimé avec succès');
          header('Location:'.URLROOT.'/admin/employe');
        }else{
          die('Erreur');
        }
      }elseif(!isset($_SESSION['role'])){
          header('Location:'.URLROOT.'/index');
      }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }

    public function addaccount($id){
      $data=[
        'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
        'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
        'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
        'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
        'id' => $id,
        'title' => 'Ajouter un compte'
      ];

      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
          if($this->adminModel->getEmployeById($id)){
            $data = [
              'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
              'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
              'employe' => $this->adminModel->getEmployeById($id),
              'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
              'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
              'title' => 'Ajouter un compte'
            ];
            $this->view('admin/employé/addaccount', $data);
            function password_generate($chars) 
            {
              $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
              return substr(str_shuffle($data), 0, $chars);
              exit;
            }
            if(isset($_POST['addAccount'])){
                if(!empty($_POST['email'])){
                  
                  $data=[
                    'id' => $_POST['id'],
                    'email' => $_POST['email'],
                    'password_without_hash' =>password_generate(8),
                  ];
                  if($this->adminModel->createAccount($data)){
                      $to      = $data['email'];
                      $subject = 'les informations de votre compte de l\'application PERFECT-HR';
                      $message = "Bonjour,\r\n\r\nNous vous informons que vous avez été ajouté à l'application PERFECT-HR.\r\n\r\nVotre identifiant est : ".$data['email']."\r\nVotre mot de passe est : ".$data['password_without_hash']."\r\n\r\nCliquer sur le lien ci-dessous pour vous connecter à l'application PERFECT-HR.\r\n\r\nhttp://localhost/perfect-hr/\r\n\r\nCordialement,\r\nL'équipe PERFECT-HR";
                      
                      $from = 'From : salim.ahm01@gmail.com';
                      if(mail($to, $subject, $message, $from)){
                        echo "<script>alert('Compte créé avec succès');</script>";
                        echo "<script>window.location.href='".URLROOT."/admin/employe';</script>";
                      }else{
                        die('Erreur sur le mail');
                      }
                    }else{
                      die('impossible de créer un compte');
                    }
                }else{
                  echo "<script>alert('Veuillez remplir tous les champs');</script>";
                  echo "<script>window.location.href='".URLROOT."/admin/employe/addaccount/".$id."';</script>";
                }
            }elseif(isset($_POST['reactive'])){
              $data=[
                'id' => $_POST['id'],
                'email' => $_POST['email'],
              ];
              if($this->adminModel->reactiveAccount($data)){
                echo "<script>alert('Compte réactivé avec succès');</script>";
                echo "<script>window.location.href='".URLROOT."/admin/employe';</script>";
              }else{
                die('Erreur');
              }
            }  
            else{
              $data = [
                'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
                'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
                'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
                'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
                'title' => 'Ajouter un compte',
              ];
            }
          }
      }elseif(!isset($_SESSION['role'])){
          header('Location:'.URLROOT.'/index');
      }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }

    public function editTache($id){
      $data=[
        'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
        'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
        'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
        'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
        'id' => $id,
        'title' => 'Modifier une tâche'
      ];

      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
          if($this->tachesModel->getTacheById($id)){
            $data = [
              'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
              'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
              'employe' => $this->adminModel->getAllEmploye(),
              'tache' => $this->tachesModel->getTacheById($id),
              'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
              'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
              'title' => 'Modifier une tâche'
            ];
            $this->view('admin/taches/edit', $data);
            if(isset($_POST['edit'])){
                if(!empty($_POST['designation']) && !empty($_POST['duree']) && !empty($_POST['id_employe'])){
                  $data=[
                    'id_tache' => $_POST['id_tache'],
                    'id_employe' => $_POST['id_employe'],
                    'designation' => $_POST['designation'],
                    'duree' => $_POST['duree'],
                  ];
                  if($this->tachesModel->updateTache($data)){
                    echo "<script>alert('Tâche modifiée avec succès');</script>";
                    echo "<script>window.location.href='".URLROOT."/admin/taches';</script>";
                    
                  }else{
                    die('Erreur');
                  }
                }else{
                  echo "<script>alert('Veuillez remplir tous les champs');</script>";
                  echo "<script>window.location.href='".URLROOT."/admin/edit/".$id."';</script>";
                }
            }
          }
      }elseif(!isset($_SESSION['role'])){
          header('Location:'.URLROOT.'/index');
      }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }

    public function deleteTache($id){
      $data=[
        'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
        'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
        'id' => $id,
        'title' => 'Supprimer une tâche'
      ];

      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
          if($this->tachesModel->deleteTache($id)){
              echo "<script>window.location.href='".URLROOT."/admin/taches';</script>";
          }
      }    
    }

    public function readNotification($id){
      $data=[
        'id' => $id,
      ];

      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        $datas=[
          'redirect'=>$this->notificationModel->getNotificationByIdAdmin($id)->type=='tache' ? 'taches' : ($this->notificationModel->getNotificationByIdAdmin($id)->type=='evenement' ? 'evenement' : 'justifAbsence'),
        ];
          if($this->notificationModel->notificationsReadsAdmin($id)){
              // echo "<script>window.location.href=".URLROOT."/admin/".$datas['redirect'].";</script>";
              header('Location: '.URLROOT.'/admin/'.$datas['redirect']);
          }
      }elseif(!isset($_SESSION['role'])){
          header('Location:'.URLROOT.'/index');
      }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }

    public function messages($id){
      $data=[
        'count' =>($this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : ""),
        'notifications'=>($this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[]),
        'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
        'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
        'title' => 'Messages',
      ];

      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        if($this->messageModel->getMessageEmploye($id)){
          $data = [
            'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
            'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
            'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
            'message' => $this->messageModel->getMessageEmploye($id),
            'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
            'title' => 'Méssages'
          ];
          
          }else{
            $data = [
              'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
              'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
              'title' => 'Méssages',
            ];
          }
        $this->view('admin/messages/index', $data);
       }elseif(!isset($_SESSION['role'])){

        header('Location:'.URLROOT.'/index');

     }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }

    }

    public function readMessage($id){
      $data=[
        'id' => $id,
      ];

      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        $datas=[
          'id'=> $id,
        ];
          if($this->messageModel->messageReads($id)){
              header('Location: '.URLROOT.'/admin/messages/'.$datas['id']);
          }
      }elseif(!isset($_SESSION['role'])){
          header('Location:'.URLROOT.'/index');
      }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }

    public function newMessage(){
      $data=[
        'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
        'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
        'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
        'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
        'employes'=> $this->adminModel->getAllEmploye() ? $this->adminModel->getAllEmploye():[],
        'title' => 'Nouveau message'
      ];

      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        $data=[
          'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
          'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
          'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
          'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
          'employes'=> $this->adminModel->getAllEmploye() ? $this->adminModel->getAllEmploye():[],
          'title' => 'Nouveau message'
        ];
            $this->view('admin/messages/add', $data);
            if(isset($_POST['envoyer'])){
              $data=[
                'objet'=>$_POST['objet'],
                'message'=>$_POST['message'],
                'id_employe'=>$_POST['recepteur'],
                'id_admin'=>$_SESSION['id'],
                'date_admin'=>date('Y-m-d H:i:s'),
              ];
              if($data['objet']=="" || $data['message']=="" || $data['id_employe']==""){
                $data['error']="Veuillez remplir tous les champs";
                $this->view('admin/messages/add', $data);
              }else{
                if($this->messageModel->addMessage($data)){
                  echo "<script>alert('Message envoyé');</script>";
                  echo "<script>window.location.reload;</script>";
                }
              }
            }
        }elseif(!isset($_SESSION['role'])){
          header('Location:'.URLROOT.'/index');
        }else{
            header('Location: '.URLROOT.'/ErrorController/index');
        }

    }

    public function documents(){
      $data=[
        'count' =>($this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : ""),
        'notifications'=>($this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[]),
        'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
        'employe' => $this->adminModel->getAllEmploye() ? $this->adminModel->getAllEmploye():[],
        'title' => 'Documents'
      ];

      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
              $data=[
                'count' =>$this->notificationModel->getCountNoReadAdmin() ? $this->notificationModel->getCountNoReadAdmin() : "",
                'notifications'=> $this->notificationModel->getNotificationAdmin() ? $this->notificationModel->getNotificationAdmin():[],
                'countm' =>$this->messageModel->getCountNotRead() ? $this->messageModel->getCountNotRead() : "",
                'messages'=> $this->messageModel->getAllMessagesEmploye() ? $this->messageModel->getAllMessagesEmploye():[],
                'employe' => $this->adminModel->getAllEmploye() ? $this->adminModel->getAllEmploye():[],
                'attestations' => $this->documentModel->getAttestations() ? $this->documentModel->getAttestations():[],
                'justifications' => $this->documentModel->getAllJustifications() ? $this->documentModel->getAllJustifications():[],
                'title' => 'Documents'
              ];
              $this->view('admin/documents/index', $data);

              if(isset($_POST['suivant'])){
                $data=[
                  'id_employe'=>trim($_POST['id_employe']),
                  'salaire_employe'=>trim($_POST['salaire']),
                  'type'=>trim($_POST['type']),
                  'lieu'=>trim($_POST['lieu'])
                ];
      
                $employeById=$this->adminModel->getEmployeById($data['id_employe']);
      
                
                if($data['id_employe'] != "" && $data['type'] != "" && $data['lieu'] != ""){
                  $datas=[
                    'nom_complet'=>$employeById->nom_complet,
                    'n_cnss'=>$employeById->n_cnss,
                    'fonction'=>$employeById->role,
                    'salaire'=>$data['salaire_employe'],
                    'type'=>$data['type'],
                    'date_operation'=>date('Y-m-d H:i:s'),
                    'id_employe'=>$data['id_employe'],
                    'lieu'=>$data['lieu'],
                  ];
                  if($this->documentModel->createAT($datas)){
                    $dat=[
                        'id_employe'=>$datas['id_employe'],
                        'designation'=>'votre '.$datas['type'].' est maintenant disponible vous pouvez la télécharger.',
                        'type'=>$datas['type'],
                    ];
                    if($this->notificationModel->addNotificationEmploye($dat)){

                      echo "<script>alert('Attestation créée avec succssé');</script>";
                      echo "<script>window.location.href='".URLROOT."/admin/documents';</script>";

                    }
                  }
                }
              }
            
      }elseif(!isset($_SESSION['role'])){
          header('Location:'.URLROOT.'/index');
      }else{
            header('Location: '.URLROOT.'/ErrorController/index');
      }
    }

    public function downloadJustif($id){
      if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
        $lien=$this->documentModel->getLienJustification($id);
            if($lien){
              $file = URLROOT.'/public/documentsAdministratif/'.$lien->fichier_ci_joint;
              header('location:'.$file);
            }else{
              echo "<script>alert('Document introuvable');</script>";
              echo "<script>window.location.href='".URLROOT."/admin/documents';</script>";
            }
      }elseif(!isset($_SESSION['role'])){
          header('Location:'.URLROOT.'/index');
      }else{
            header('Location: '.URLROOT.'/ErrorController/index');
      }
        
    }

    
  
}
