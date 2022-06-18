
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
                                            <small class="text-danger" id="errorImage"></small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="nom_complet" class="form-label">Nom Complet</label>
                                            <input type="text" class="form-control shadow-none input" name="nom_complet" id="nom_complet" value="<?php echo $data['employe']->nom_complet;?>" disabled style="border:none; border: bottom 10px solid red;">
                                            <small class="text-danger" id="errorName"></small>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="cin" class="form-label">N° Cin</label>
                                            <input type="text" class="form-control shadow-none input" name="cin" id="cin" value="<?php echo $data['employe']->cin;?>" disabled>
                                            <small class="text-danger" id="errorNCIN"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="date_naissance" class="form-label">Date De Naissance</label>
                                            <input type="date" class="form-control shadow-none input" id="date_naissance" name ="date_naissance" value="<?php echo $data['employe']->date_naissance;?>" disabled>
                                            <small class="text-danger" id="errorDateNaissance"></small>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="lieu_naissance" class="form-label">Lieu De Naissance</label>
                                            <input type="text" class="form-control shadow-none input" name="lieu_naissance" id="lieu_naissance" value="<?php echo $data['employe']->lieu_naissance;?>" disabled>
                                            <small class="text-danger" id="errorLieu"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control shadow-none input" id="email" name="email" value="<?php echo $data['employe']->email;?>" disabled>
                                            <small class="text-danger" id="errorEmail"></small>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="telephone" class="form-label">N° De Téléphone</label>
                                            <input type="text" class="form-control shadow-none input" id="telephone" name="telephone" value="<?php echo $data['employe']->telephone;?>" disabled>
                                            <small class="text-danger" id="errorTelephone"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="adress" class="form-label">Address</label>
                                            <input type="text"  class="form-control shadow-none input" id="adress" name="adress" value="<?php echo $data['employe']->adress;?>" disabled>
                                            <small class="text-danger" id="errorAdress"></small>
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
                                            <small class="text-danger" id="errorRole"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="date_embauche" class="form-label">Date D'embauche</label>
                                            <input type="date" class="form-control shadow-none input" id="date_embauche" name="date_embauche" value="<?php echo $data['employe']->date_embauche;?>" disabled>
                                            <small class="text-danger" id="errorDateEmbauche"></small>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="n_cnss" class="form-label">N° Cnss</label>
                                            <input type="text" class="form-control shadow-none input" id="n_cnss" name="n_cnss" value="<?php echo $data['employe']->n_cnss;?>" disabled>
                                            <small class="text-danger" id="errorNCNSS"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="compte_bancaire" class="form-label">N° De Compte bancaire</label>
                                            <input type="text" class="form-control shadow-none input" id="compte_bancaire" name="compte_bancaire" value="<?php echo $data['employe']->compte_bancaire;?>" disabled>
                                            <small class="text-danger" id="errorCompteBancaire"></small>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="banque" class="form-label">Banque</label>
                                            <input type="text" class="form-control shadow-none input" id="banque" name="banque" value="<?php echo $data['employe']->banque;?>" disabled>
                                            <small class="text-danger" id="errorBanque"></small>
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
        let inputNom=document.getElementById('nom_complet');
        let inputEmail=document.getElementById('email');
        let inputCin=document.getElementById('cin');
        let inputDateNaissance=document.getElementById('date_naissance');
        let inputLieuNaissance=document.getElementById('lieu_naissance');
        let inputTelephone=document.getElementById('telephone');
        let inputAdress=document.getElementById('adress');
        let inputRole=document.getElementById('role');
        let inputDateEmbauche=document.getElementById('date_embauche');
        let inputNCNSS=document.getElementById('n_cnss');
        let inputCompteBancaire=document.getElementById('compte_bancaire');
        let inputBanque=document.getElementById('banque');
        let inputImage=document.getElementById('image');
        let regexNom=/^[a-z A-Z]{3,}$/;
        let regexTelephone=/^\+((?:9[679]|8[035789]|6[789]|5[90]|42|3[578]|2[1-689])|9[0-58]|8[1246]|6[0-6]|5[1-8]|4[013-9]|3[0-469]|2[70]|7|1)(?:\W*\d){0,13}\d$/;
        let regexEmail=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/;
        let regexCin=/^[A-Z0-9]{8}$/;
        let regexNCNSS=/^[0-9]{3,12}$/;
        let regexCompteBancaire=/^[0-9]{3,16}$/;
        let errorName=document.getElementById('errorName');
        let errorEmail=document.getElementById('errorEmail');
        let errorCin=document.getElementById('errorNCIN');
        let errorDateNaissance=document.getElementById('errorDateNaissance');
        let errorLieuNaissance=document.getElementById('errorLieu');
        let errorTelephone=document.getElementById('errorTelephone');
        let errorAdress=document.getElementById('errorAdress');
        let errorRole=document.getElementById('errorRole');
        let errorDateEmbauche=document.getElementById('errorDateEmbauche');
        let errorNCNSS=document.getElementById('errorNCNSS');
        let errorCompteBancaire=document.getElementById('errorCompteBancaire');
        let errorBanque=document.getElementById('errorBanque');
        let errorImage=document.getElementById('errorImage');
        let submit=document.getElementById('edit');


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
            errorName.innerHTML='';
            errorEmail.innerHTML='';
            errorCin.innerHTML='';
            errorDateNaissance.innerHTML='';
            errorLieuNaissance.innerHTML='';
            errorTelephone.innerHTML='';
            errorAdress.innerHTML='';
            errorRole.innerHTML='';
            errorDateEmbauche.innerHTML='';
            errorNCNSS.innerHTML='';
            errorCompteBancaire.innerHTML='';
            errorBanque.innerHTML='';
            errorImage.innerHTML='';
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

        submit.addEventListener('click',function(e){
            if(inputNom.value==''){
                errorName.innerText='Ce champ est obligatoire';
                inputNom.style.borderColor='red';
                
            }else{
               errorName.innerText='';
                inputNom.style.borderColor='green';
            }

            if(inputEmail.value==''){
                errorEmail.innerText='Ce champ est obligatoire';
                inputEmail.style.borderColor='red';
                
            }else{
                errorEmail.innerText='';
                inputEmail.style.borderColor='green';
            }

            if(inputCin.value==''){
                errorCin.innerText='Ce champ est obligatoire';
                inputCin.style.borderColor='red';
                
            }else{
                errorCin.innerText='';
                inputCin.style.borderColor='green';
                
            }

            if(inputDateNaissance.value==''){
                errorDateNaissance.innerText='Ce champ est obligatoire';
                inputDateNaissance.style.borderColor='red';
                
            }else{
                errorDateNaissance.innerText='';
                inputDateNaissance.style.borderColor='green';
            }

            if(inputLieuNaissance.value==''){
                errorLieuNaissance.innerText='Ce champ est obligatoire';
                inputLieuNaissance.style.borderColor='red';
                
            }else{
                errorLieuNaissance.innerText='';
                inputLieuNaissance.style.borderColor='green';
            }
            
            if(inputTelephone.value==''){
                errorTelephone.innerText='Ce champ est obligatoire';
                inputTelephone.style.borderColor='red';
                
            }else{
                errorTelephone.innerText='';
                inputTelephone.style.borderColor='green';
            }

            if(inputAdress.value==''){
                errorAdress.innerText='Ce champ est obligatoire';
                inputAdress.style.borderColor='red';
                
            }else{
                errorAdress.innerText='';
                inputAdress.style.borderColor='green';
            }

            if(inputRole.value==''){
                errorRole.innerText='Ce champ est obligatoire';
                inputRole.style.borderColor='red';
                
            }else{
                errorRole.innerText='';
                inputRole.style.borderColor='green';
            }

            if(inputDateEmbauche.value==''){
                errorDateEmbauche.innerText='Ce champ est obligatoire';
                inputDateEmbauche.style.borderColor='red';
            }
            else{
                errorDateEmbauche.innerText='';
                inputDateEmbauche.style.borderColor='green';
            }

            if(inputNCNSS.value==''){
                errorNCNSS.innerText='Ce champ est obligatoire';
                inputNCNSS.style.borderColor='red';
            }
            else{
                errorNCNSS.innerText='';
                inputNCNSS.style.borderColor='green';
            }

            if(inputCompteBancaire.value==''){
                errorCompteBancaire.innerText='Ce champ est obligatoire';
                inputCompteBancaire.style.borderColor='red';
            }
            else{
                errorCompteBancaire.innerText='';
                inputCompteBancaire.style.borderColor='green';
            }

            if(inputBanque.value==''){
                errorBanque.innerText='Ce champ est obligatoire';
                inputBanque.style.borderColor='red';
            }
            else{
                errorBanque.innerText='';
                inputBanque.style.borderColor='green';
            }

            if(inputNom.value == '' || inputEmail.value == '' || inputCin.value == '' || inputDateNaissance.value == '' || inputLieuNaissance.value == '' || inputTelephone.value == '' || inputAdress.value == '' || inputRole.value == '' || inputDateEmbauche.value == '' || inputNCNSS.value == '' || inputCompteBancaire.value == '' || inputBanque.value == ''){
                e.preventDefault();
            }
        });

        inputNom.addEventListener('input',function(){
                if(!regexNom.test(inputNom.value)){
                    errorName.innerText='Ce champ doit contenir au moins 2 caractères';
                    inputNom.style.borderColor='red';
                    submit.setAttribute('disabled','disabled');
                }else{
                    errorName.innerText='';
                    inputNom.style.borderColor='green';
                    submit.removeAttribute('disabled');
                }
        }
        );

        inputEmail.addEventListener('input',function(){
                if(!regexEmail.test(inputEmail.value)){
                    errorEmail.innerText='Ce champ doit contenir au moins 2 caractères';
                    inputEmail.style.borderColor='red';
                    submit.setAttribute('disabled','disabled');
                }else{
                    errorEmail.innerText='';
                    inputEmail.style.borderColor='green';
                    submit.removeAttribute('disabled');
                }
        }
        );

        inputCin.addEventListener('input',function(){
                if(!regexCin.test(inputCin.value)){
                    errorCin.innerText='Ce champ doit contenir au moins 2 caractères';
                    inputCin.style.borderColor='red';
                    submit.setAttribute('disabled','disabled');
                }else{
                    errorCin.innerText='';
                    inputCin.style.borderColor='green';
                    submit.removeAttribute('disabled');
                }
        }
        );

        inputTelephone.addEventListener('input',function(){
                if(!regexTelephone.test(inputTelephone.value)){
                    errorTelephone.innerText='Ce champ doit contenir seulement des chiffres';
                    inputTelephone.style.borderColor='red';
                    submit.setAttribute('disabled','disabled');
                }else{
                    errorTelephone.innerText='';
                    inputTelephone.style.borderColor='green';
                    submit.removeAttribute('disabled');
                }
        }
        );

        inputNCNSS.addEventListener('input',function(){
                if(!regexNCNSS.test(inputNCNSS.value)){
                    errorNCNSS.innerText='Ce champ doit contenir seulement des chiffres';
                    inputNCNSS.style.borderColor='red';
                    submit.setAttribute('disabled','disabled');
                }else{
                    errorNCNSS.innerText='';
                    inputNCNSS.style.borderColor='green';
                    submit.removeAttribute('disabled');
                }
        }
        );

        inputCompteBancaire.addEventListener('input',function(){
                if(!regexCompteBancaire.test(inputCompteBancaire.value)){
                    errorCompteBancaire.innerText='Ce champ doit contenir seulment des chiffres';
                    inputCompteBancaire.style.borderColor='red';
                    submit.setAttribute('disabled','disabled');
                }else{
                    errorCompteBancaire.innerText='';
                    inputCompteBancaire.style.borderColor='green';
                    submit.removeAttribute('disabled');
                }
        }
        );

       

        window.addEventListener("load",function(){
            inputDateNaissance.setAttribute("min","1970-01-01");
            inputDateNaissance.setAttribute("max","2001-12-31");
        });
        
    </script>
<?php require_once APPROOT.'/views/includes/footer.php'?>