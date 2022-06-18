
<?php require_once APPROOT.'/views/includes/header.php'?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once APPROOT.'/views/includes/sidebar.php' ?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            
            <!-- Main Content -->
            <div id="content">
                
                <!-- Topbar -->
        
                <?php include_once APPROOT.'/views/includes/navbar.php' ?>
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" id="titre-table">Detail de l'employé</h1>
                        <button  id="back" class="btn btn-sm btn-dark shadow-sm"><i class="fas fa-arrow-left fa-fw fa-sm text-white-50"></i> <a href="../employe" class="text-decoration-none text-white"><span class="d-none d-sm-inline-block">Retourner</span></a></button>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        
                        <!-- Pending Requests Card Example -->
                        <div class="col-12  mb-4">
                            <div class="card-head py-2 d-flex justify-content-end">
                                <button  id="modifier" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-edit fa-fw fa-sm text-white-50"></i> <span class="d-none d-sm-inline-block">Modifier l'employé</span></button>
                                <button  id="delete" class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-fw fa-sm text-white-50"></i> <span class="d-none d-sm-inline-block">Supprimmer l'employé</span></button>
                            </div>
                            <div class="card shadow h-100 py-2 px-3" id="detailListe">
                                <label for="image" class="form-label d-flex justify-content-center mt-4"><img src="<?php echo URLROOT.'/public/img/'.$data['employe']->image;?>" style="width:110px;height:110px; border-radius:50%" alt=""></label>
                                <form class="py-2 px-3" method ="post" action="<?php echo URLROOT.'/'?>admin/editemploye" enctype="multipart/form-data">
                                    <div class="row form-group d-flex justify-content-center">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <input type="file" class="form-control shadow-none d-none input" id="image" name="image" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="nom_complet" class="form-label">Nom Complet</label>
                                            <input type="text" class="form-control shadow-none input" name="nom_complet" id="nom_complet" value="<?php echo $data['employe']->nom_complet;?>" disabled style="border:none; border: bottom 10px solid red;">
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="cin" class="form-label">N° Cin</label>
                                            <input type="text" class="form-control shadow-none input" name="cin" id="cin" value="<?php echo $data['employe']->cin;?>" disabled>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="date_naissance" class="form-label">Date De Naissance</label>
                                            <input type="date" class="form-control shadow-none input" id="date_naissance" name ="date_naissance" value="<?php echo $data['employe']->date_naissance;?>" disabled>

                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="lieu_naissance" class="form-label">Lieu De Naissance</label>
                                            <input type="text" class="form-control shadow-none input" name="lieu_naissance" id="lieu_naissance" value="<?php echo $data['employe']->lieu_naissance;?>" disabled>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control shadow-none input" id="email" name="email" value="<?php echo $data['employe']->email;?>" disabled>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="telephone" class="form-label">N° De Téléphone</label>
                                            <input type="text" class="form-control shadow-none input" id="telephone" name="telephone" value="<?php echo $data['employe']->telephone;?>" disabled>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="adress" class="form-label">Address</label>
                                            <input type="text"  class="form-control shadow-none input" id="adress" name="adress" value="<?php echo $data['employe']->adress;?>" disabled>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="role" class="form-label">Role</label>
                                            <select class="form-control shadow-none input" id="role" name="role" disabled>
                                                <option value="" selected>role</option>
                                                <option value="<?php if(isset($data['employe']) && $data['employe']->role=="ingenieur"){echo $data['employe']->role;} ?>" <?php if(isset($data['employe']) && $data['employe']->role=="ingenieur") echo 'selected'?> >Ingénieur</option>
                                                <option value="<?php if(isset($data['employe']) && $data['employe']->role=="cadre"){echo $data['employe']->role;} ?>" <?php if(isset($data['employe']) && $data['employe']->role=="cadre") echo 'selected'?>>Cadre</option>
                                                <option value="<?php if(isset($data['employe']) && $data['employe']->role=="technicien(ne)"){echo $data['employe']->role;} ?>" <?php if(isset($data['employe']) && $data['employe']->role=="technicien(ne)") echo 'selected'?>>Technicien(ne)</option>
                                                <option value="<?php if(isset($data['employe']) && $data['employe']->role=="ouvrier"){echo $data['employe']->role;} ?>" <?php if(isset($data['employe']) && $data['employe']->role=="ouvrier") echo 'selected'?>>Ouvrier</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="date_embauche" class="form-label">Date D'embauche</label>
                                            <input type="date" class="form-control shadow-none input" id="date_embauche" name="date_embauche" value="<?php echo $data['employe']->date_embauche;?>" disabled>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="n_cnss" class="form-label">N° Cnss</label>
                                            <input type="text" class="form-control shadow-none input" id="n_cnss" name="n_cnss" value="<?php echo $data['employe']->n_cnss;?>" disabled>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="compte_bancaire" class="form-label">N° De Compte bancaire</label>
                                            <input type="text" class="form-control shadow-none input" id="compte_bancaire" name="compte_bancaire" value="<?php echo $data['employe']->compte_bancaire;?>" disabled>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="banque" class="form-label">Banque</label>
                                            <input type="text" class="form-control shadow-none input" id="banque" name="banque" value="<?php echo $data['employe']->banque;?>" disabled>
                                        </div>
                                        <div class="mb-3 d-none col-12 col-sm-6">
                                            <input type="hidden" class="form-control shadow-none input" id="id" name="id" value="<?php echo $data['employe']->id_employe;?>" disabled>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" name="edit" id="edit" class="btn btn-primary d-none">Submit</button>
                                    <button type="reset" name="annuler" id="annuler" class="btn btn-danger d-none">Annuler</button>
                                </form>
                            </div>
                            
                    </div>

                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script>
        let modifier = document.getElementById('modifier');
        let edit = document.getElementById('edit');
        let annuler = document.getElementById('annuler');
        let input = document.querySelectorAll('.input');
        let delete_btn = document.getElementById('delete');



        modifier.addEventListener('click',function(){
            input.forEach(function(element){
                element.disabled = false;
                element.setAttribute('style','border:none; border-bottom:3px solid #4c71dd;');
            });
            edit.setAttribute('class','btn btn-primary');
            annuler.setAttribute('class','btn btn-danger');
        });

        annuler.addEventListener('click',function(){
            input.forEach(function(element){
                element.disabled = true;
                element.removeAttribute('style','border:none; border-bottom:3px solid #4c71dd;');
            });
            edit.setAttribute('class','btn btn-primary d-none');
            annuler.setAttribute('class','btn btn-danger d-none');
        });
        
        
        delete_btn.addEventListener('click',function(){
            if(confirm('Voulez-vous vraiment supprimer cet employé ?')){
                window.location.href='<?php echo URLROOT;?>/admin/delete/<?php echo $data['employe']->id_employe;?>';
                // return true;
            }else{
                return false;
            }
        }
        );
    </script>
<?php require_once APPROOT.'/views/includes/footer.php'?>