<?php
  
  class Employe extends Controller {
    public function __construct(){
      session_start();
      $this->adminModel = $this->model('Adminfolder/','AdminModel');
      $this->tachesModel = $this->model('employefolder/','TachesEmploye');
      $this->congesModel = $this->model('employefolder/','CongesEmploye');
      $this->evenementModel = $this->model('Adminfolder/','EvenementAdmin');
      $this->notificationModel = $this->model('./','Notification');
      $this->messageModel = $this->model('./','Messages');
      $this->documentModel = $this->model('Adminfolder/','DocumentsAdmin');
      $this->documentEmployeModel = $this->model('employefolder/','DocumentsEmploye');
    }

    public function dashboard(){
      
      
     if(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count!=0){
      $data = [
        'count' =>$this->notificationModel->getCountNoReadEmploye($_SESSION['id']) ? $this->notificationModel->getCountNoReadEmploye($_SESSION['id']) : "",
        'notifications'=> $this->notificationModel->getNotificationEmploye($_SESSION['id']) ? $this->notificationModel->getNotificationEmploye($_SESSION['id']):[],
        'countm' =>$this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) ? $this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) : "",
        'messages'=> $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']) ? $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']):[],
        'title' => 'Dashboard',
      ];
      $this->view('employe/dashboard/index', $data);
     }elseif(!isset($_SESSION['role'])){

      header('Location:'.URLROOT.'/index');

      }elseif(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count==0){
        header('Location:'.URLROOT.'/employe/profile/index');
      }
      else{
          header('Location: '.URLROOT.'/ErrorController/index');
      }
    }

    public function conges(){
      
      if(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count!=0){
        $data = [
          'count' =>$this->notificationModel->getCountNoReadEmploye($_SESSION['id']) ? $this->notificationModel->getCountNoReadEmploye($_SESSION['id']) : "",
          'notifications'=> $this->notificationModel->getNotificationEmploye($_SESSION['id']) ? $this->notificationModel->getNotificationEmploye($_SESSION['id']):[],
          'countm' =>$this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) ? $this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) : "",
          'messages'=> $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']) ? $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']):[],
          'title' => 'Congés'
        ];
        if($this->congesModel->getAllByIdEmploye($_SESSION['id'])){
          $data['conges'] = $this->congesModel->getAllByIdEmploye($_SESSION['id']);
        }
        $this->view('employe/congés/index', $data);
       }elseif(!isset($_SESSION['role'])){

        header('Location:'.URLROOT.'/index');

     }elseif(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count==0){
      header('Location:'.URLROOT.'/employe/profile/index');
      }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }

    public function demandeConge(){
      if(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count!=0){
        if(isset($_POST['ajouter'])){
            $data=[
              'id_employe'=>$_SESSION['id'],
              'designation'=>$_POST['designation'],
              'date_debut'=>$_POST['date_debut'],
              'date_fin'=>$_POST['date_fin'],
              'duree'=>$_POST['duree'],
            ];
            if($data['designation'] != "" && $data['date_debut'] != "" && $data['date_fin'] != "" && $data['duree'] != ""){
                if($this->congesModel->createConges($data)){
                  $datas=[
                    'id_employe'=>$_SESSION['id'],
                    'designation'=>'l\'utilisateur '.$_SESSION['nom_complet'].' a demandé un congé d\'une durée de '.$_POST['duree'].' jours',
                    'type'=>"Congé",
                  ];
                  if($this->notificationModel->addNotificationAdmin($datas)){
                    echo '<script>alert("Demande envoyée avec succès");</script>';
                    echo '<script>window.location.href="'.URLROOT.'/employe/conges/index";</script>';
                  
                  }else{
                    echo '<script>alert("Erreur lors de l\'envoie de la demande");</script>';
                    echo '<script>window.location.href="'.URLROOT.'/employe/conges/index";</script>';
                  }
                }else{
                  echo '<script>alert("Erreur lors de l\'envoie de la demande");</script>';
                  echo '<script>window.location.href="'.URLROOT.'/employe/conges/index";</script>';
                }

            }
        }
      }elseif(!isset($_SESSION['role'])){
          
          header('Location:'.URLROOT.'/index');

      }elseif(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count==0){
        header('Location:'.URLROOT.'/employe/profile/index');
      }else{
            header('Location: '.URLROOT.'/ErrorController/index');
        }
    }

    public function evenement(){
      

      if(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count!=0){
        $data = [
          'count' =>$this->notificationModel->getCountNoReadEmploye($_SESSION['id']) ? $this->notificationModel->getCountNoReadEmploye($_SESSION['id']) : "",
          'notifications'=> $this->notificationModel->getNotificationEmploye($_SESSION['id']) ? $this->notificationModel->getNotificationEmploye($_SESSION['id']):[],
          'countm' =>$this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) ? $this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) : "",
          'messages'=> $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']) ? $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']):[],
          'title' => 'Evénements'
        ];
        if($this->evenementModel-> getAll()){
          $data['evenements'] = $this->evenementModel-> getAll();
        }
        $this->view('employe/evenement/index', $data);
       }elseif(!isset($_SESSION['role'])){

        header('Location:'.URLROOT.'/index');

     }elseif(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count==0){
            header('Location:'.URLROOT.'/employe/profile/index');
      }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }

    }

    public function taches(){
      

      if(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count!=0){
        $data = [
          'count' =>$this->notificationModel->getCountNoReadEmploye($_SESSION['id']) ? $this->notificationModel->getCountNoReadEmploye($_SESSION['id']) : "",
          'notifications'=> $this->notificationModel->getNotificationEmploye($_SESSION['id']) ? $this->notificationModel->getNotificationEmploye($_SESSION['id']):[],
          'countm' =>$this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) ? $this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) : "",
          'messages'=> $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']) ? $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']):[],
          'title' => 'Taches'
        ];
        if($this->tachesModel-> getAllTachesEncoursByIdEmploye($_SESSION['id']) && $this->tachesModel-> getAllTachesTermineByIdEmploye($_SESSION['id'])){
          $data=[
            'count' =>$this->notificationModel->getCountNoReadEmploye($_SESSION['id']) ? $this->notificationModel->getCountNoReadEmploye($_SESSION['id']) : "",
            'notifications'=> $this->notificationModel->getNotificationEmploye($_SESSION['id']) ? $this->notificationModel->getNotificationEmploye($_SESSION['id']):[],
            'countm' =>$this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) ? $this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) : "",
            'messages'=> $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']) ? $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']):[],
            'tacheEncours' => $this->tachesModel-> getAllTachesEncoursByIdEmploye($_SESSION['id']),
            'tacheTermine' => $this->tachesModel-> getAllTachesTermineByIdEmploye($_SESSION['id']),
            'title' => 'Taches'
          ];
        }elseif($this->tachesModel-> getAllTachesEncoursByIdEmploye($_SESSION['id'])){
          $data=[
            'count' =>$this->notificationModel->getCountNoReadEmploye($_SESSION['id']) ? $this->notificationModel->getCountNoReadEmploye($_SESSION['id']) : "",
            'notifications'=> $this->notificationModel->getNotificationEmploye($_SESSION['id']) ? $this->notificationModel->getNotificationEmploye($_SESSION['id']):[],
            'countm' =>$this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) ? $this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) : "",
            'messages'=> $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']) ? $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']):[],
            'tacheEncours' => $this->tachesModel-> getAllTachesEncoursByIdEmploye($_SESSION['id']),
            'title' => 'Taches'
          ];
        }elseif($this->tachesModel-> getAllTachesTermineByIdEmploye($_SESSION['id'])){
          $data=[
            'count' =>$this->notificationModel->getCountNoReadEmploye($_SESSION['id']) ? $this->notificationModel->getCountNoReadEmploye($_SESSION['id']) : "",
            'notifications'=> $this->notificationModel->getNotificationEmploye($_SESSION['id']) ? $this->notificationModel->getNotificationEmploye($_SESSION['id']):[],
            'countm' =>$this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) ? $this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) : "",
            'messages'=> $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']) ? $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']):[],
            'tacheTermine' => $this->tachesModel-> getAllTachesTermineByIdEmploye($_SESSION['id']),
            'title' => 'Taches'
          ];
        }
        $this->view('employe/taches/index', $data);
       }elseif(!isset($_SESSION['role'])){

        header('Location:'.URLROOT.'/index');

     }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }

    public function fermerTache($id){
      if(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count!=0){
        if($this->tachesModel-> closeTache($id)){
          $taches = $this->tachesModel-> getAllTachesEncoursByIdEmploye($_SESSION['id']);
          $data=[
            'id_employe' => $_SESSION['id'],
            'id_tache' => $id,
            'type' => 'tache',
            'designation'=>'l\'utilisateur '.$_SESSION['nom_complet'].' a fermé la tache N°'.$id.'.',
          ];
          if($this->notificationModel->addNotificationAdmin($data)){
              header('Location: '.URLROOT.'/employe/taches');
          }
        }
      }else{
        header('Location: '.URLROOT.'/ErrorController/index');
      }
    }

    public function profile(){
      if(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count==0){
        $data['title']='Changer mot de passe';
        if(isset($_POST['valider'])){
          $data=[
            'title' => 'Profile',
            'password' => md5($_POST['new_password']),
            'password_confirm' => md5($_POST['confirm_password']),
            'id' => $_SESSION['id']
          ];
          if($data['password']==$data['password_confirm']){
            $this->adminModel->updatePasswordFirstLogin($data);
            echo '<script>alert("Mot de passe modifié avec succès")</script>';
            echo '<script>window.location.href="'.URLROOT.'/employe/dashboard"</script>';
          }else{
            echo '<script>alert("Les mots de passe ne correspondent pas")</script>';
            echo '<script>window.location.href="'.URLROOT.'/employe/dashboard"</script>';
          }
        }
        $this->view('employe/profile/index', $data);
       }elseif(!isset($_SESSION['role'])){

        header('Location:'.URLROOT.'/index');

        }elseif(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count==0){
              header('Location:'.URLROOT.'/employe/profile/index');
          }else{
                header('Location: '.URLROOT.'/ErrorController/index');
          }
    }
    public function readNotification($id){
      $data=[
        'id' => $id,
      ];

      if(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count!=0){
        if($this->notificationModel->getNotificationByIdEmploye($id)->type=='tache'){
          $datas['redirect']='taches';
        }elseif($this->notificationModel->getNotificationByIdEmploye($id)->type == 'attestation de travail'){
          $datas['redirect']='attestationTravail/';
        }elseif($this->notificationModel->getNotificationByIdEmploye($id)->type=='attestation de salaire'){
          $datas['redirect']='attestationSalaire/';
        }else{
          $datas['redirect']='conges';
        }
          if($this->notificationModel->notificationsReadsEmploye($id)){
              header('Location: '.URLROOT.'/employe/'.$datas['redirect'].'/'.$id);
          }
      }elseif(!isset($_SESSION['role'])){
          header('Location:'.URLROOT.'/index');
      }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }

    public function messages($id){
      if(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count!=0){
        if($this->messageModel->getMessageEmploye($id)){
          $data = [
            'count' =>$this->notificationModel->getCountNoReadEmploye($_SESSION['id']) ? $this->notificationModel->getCountNoReadEmploye($_SESSION['id']) : "",
            'notifications'=> $this->notificationModel->getNotificationEmploye($_SESSION['id']) ? $this->notificationModel->getNotificationEmploye($_SESSION['id']):[],
            'messages'=> $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']) ? $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']):[],
            'message' => $this->messageModel->getMessageAdmin($id),
            'countm' =>$this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) ? $this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) : "",
            'title' => 'Méssages'
          ];
          
          }else{
            $data = [
              'count' =>$this->notificationModel->getCountNoReadEmploye($_SESSION['id']) ? $this->notificationModel->getCountNoReadEmploye($_SESSION['id']) : "",
              'notifications'=> $this->notificationModel->getNotificationEmploye($_SESSION['id']) ? $this->notificationModel->getNotificationEmploye($_SESSION['id']):[],
              'title' => 'Méssages',
            ];
          }
        $this->view('employe/messages/index', $data);
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

      if(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count!=0){
        $datas=[
          'id'=> $id,
        ];
          if($this->messageModel->messageReads($id)){
              header('Location: '.URLROOT.'/employe/messages/'.$datas['id']);
          }
      }elseif(!isset($_SESSION['role'])){
          header('Location:'.URLROOT.'/index');
      }else{
            header('Location: '.URLROOT.'/ErrorController/index');
       }
    }

    public function newMessage(){
      if(isset($_SESSION['role']) && $_SESSION['role'] =="employe" && $this->adminModel->getEmployeById($_SESSION['id'])->count!=0){
        $data=[
          'count' =>$this->notificationModel->getCountNoReadEmploye($_SESSION['id']) ? $this->notificationModel->getCountNoReadEmploye($_SESSION['id']) : "",
          'notifications'=> $this->notificationModel->getNotificationEmploye($_SESSION['id']) ? $this->notificationModel->getNotificationEmploye($_SESSION['id']):[],
          'countm' =>$this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) ? $this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) : "",
          'messages'=> $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']) ? $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']):[],
          'employes'=> $this->adminModel->getAdmin() ? $this->adminModel->getAdmin():[],
          'title' => 'Nouveau message'
        ];
            $this->view('employe/messages/add', $data);
            if(isset($_POST['envoyer'])){
              $data=[
                'objet'=>$_POST['objet'],
                'message'=>$_POST['message'],
                'id_employe'=>$_SESSION['id'],
                'id_admin'=>$_POST['recepteur'],
                'date_employe'=>date('Y-m-d H:i:s'),
              ];
              if($data['objet']=="" || $data['message']=="" || $data['id_admin']==""){
                echo '<script>alert("Veuillez remplir tous les champs")</script>';
                $this->view('employe/messages/add', $data);
              }else{
                if($this->messageModel->addMessageEmploye($data)){
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
      if(isset($_SESSION['role']) && $_SESSION['role'] =="employe"){
              $data=[
                'count' =>$this->notificationModel->getCountNoReadEmploye($_SESSION['id']) ? $this->notificationModel->getCountNoReadEmploye($_SESSION['id']) : "",
                'notifications'=> $this->notificationModel->getNotificationEmploye($_SESSION['id']) ? $this->notificationModel->getNotificationEmploye($_SESSION['id']):[],
                'countm' =>$this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) ? $this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) : "",
                'messages'=> $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']) ? $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']):[],
                'employe' => $this->adminModel->getAllEmployeActive() ? $this->adminModel->getAllEmployeActive():[],
                'attestations' => $this->documentModel->getAttestationByIdEmploye($_SESSION['id']),
                'justifications' => $this->documentModel->getAllJustifications() ? $this->documentModel->getAllJustifications():[],
                'title' => 'Documents'
              ];
              $this->view('employe/documents/index', $data);
            
      }elseif(!isset($_SESSION['role'])){
          header('Location:'.URLROOT.'/index');
      }else{
            header('Location: '.URLROOT.'/ErrorController/index');
      }
    }
    public function attestationTravail($id){
      if(isset($_SESSION['role']) && $_SESSION['role'] == 'employe'){
        $data=[
          'count' =>$this->notificationModel->getCountNoReadEmploye($_SESSION['id']) ? $this->notificationModel->getCountNoReadEmploye($_SESSION['id']) : "",
          'notifications'=> $this->notificationModel->getNotificationEmploye($_SESSION['id']) ? $this->notificationModel->getNotificationEmploye($_SESSION['id']):[],
          'countm' =>$this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) ? $this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) : "",
          'messages'=> $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']) ? $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']):[],
          'employe' => $this->adminModel->getAllEmployeActive() ? $this->adminModel->getAllEmployeActive():[],
          'attestations' => $this->documentModel->getAttestations() ? $this->documentModel->getAttestations():[],
          'justifications' => $this->documentModel->getAllJustifications() ? $this->documentModel->getAllJustifications():[],
          'ATT'=>$this->documentModel->getAttestationById($id),
          'title' => 'Attestation de travail'
        ];
        $this->view('employe/attestationTravail/index', $data);
      }else{
        die('error');
      }
    
    }

    public function attestationSalaire($id){
      if(isset($_SESSION['role']) && $_SESSION['role'] == 'employe'){
        $data=[
          'count' =>$this->notificationModel->getCountNoReadEmploye($_SESSION['id']) ? $this->notificationModel->getCountNoReadEmploye($_SESSION['id']) : "",
          'notifications'=> $this->notificationModel->getNotificationEmploye($_SESSION['id']) ? $this->notificationModel->getNotificationEmploye($_SESSION['id']):[],
          'countm' =>$this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) ? $this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) : "",
          'messages'=> $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']) ? $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']):[],
          'employe' => $this->adminModel->getAllEmployeActive() ? $this->adminModel->getAllEmployeActive():[],
          'attestations' => $this->documentModel->getAttestations() ? $this->documentModel->getAttestations():[],
          'justifications' => $this->documentModel->getAllJustifications() ? $this->documentModel->getAllJustifications():[],
          'ATT'=>$this->documentModel->getAttestationById($id),
          'title' => 'Attestation de salaire'
        ];
        $this->view('employe/attestationSalaire/index', $data);
      }else{
        die('error');
      }
    
    }

    public function addJustif(){
      if(isset($_SESSION['role']) && $_SESSION['role'] == 'employe'){
          
        $data=[
          'count' =>$this->notificationModel->getCountNoReadEmploye($_SESSION['id']) ? $this->notificationModel->getCountNoReadEmploye($_SESSION['id']) : "",
          'notifications'=> $this->notificationModel->getNotificationEmploye($_SESSION['id']) ? $this->notificationModel->getNotificationEmploye($_SESSION['id']):[],
          'countm' =>$this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) ? $this->messageModel->getCountNotReadByIdEmploye($_SESSION['id']) : "",
          'messages'=> $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']) ? $this->messageModel->getMessagesAdminByIdEmploye($_SESSION['id']):[],
          'title' => 'Attestation de salaire'
        ];
        if(isset($_POST['addJustif'])){
              $upload_dir ='C:/wamp64/www/Projet-Fil-Rouge/public/documentsAdministratif/';
              $file_ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
              $userfile = rand(1000, 1000000).'.'.$file_ext;
              $size = $_FILES['file']['size'];
              $data=[
                'id_employe' => $_SESSION['id'],
                'nom_complet_employe' => $_SESSION['nom_complet'],
                'designation'=> $_POST['designation'],
                'file' => $userfile,
              ];
          if($this->documentEmployeModel->sendJustif($data)){
              if(move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir.$userfile) && $size < 5000000){
                $data=[
                  'id_employe' => $_SESSION['id'],
                  'type' => 'justification absence',
                  'designation'=>'l\'utilisateur '.$_SESSION['nom_complet'].' a ajouté une justification d\'absence',
                ];
                if($this->notificationModel->addNotificationAdmin($data)){
                    header('Location: '.URLROOT.'/employe/documents');
                }
              }else{
                echo '<script>alert("Votre fichier est trop volumineux");</script>';
              }
          }
              
        }
        $this->view('employe/documents/addjustif', $data);
      }else{
        die('error');
      }
    
    }
    
  }

 

  // ../APPROOT/..