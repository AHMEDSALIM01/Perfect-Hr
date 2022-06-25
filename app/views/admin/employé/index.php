
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
                        <h1 class="h3 mb-0 text-gray-800" id="titre-table">Liste des employés</h1>
                        <button  id="ajout" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus-circle fa-fw fa-sm text-white-50"></i> Ajouter un employé</button>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        
                        <!-- Pending Requests Card Example -->
                        <div class="col-12  mb-4">
                            <div class="card border-left-primary shadow h-100 py-2" id="tableListe">
                                <div class="card-header py-3">
                                    <div class="mb-2 ">
                                        <form class="form-inline mr-auto w-100 navbar-search">
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-white border-0 small"
                                                    placeholder="Search for..." aria-label="Search"
                                                    aria-describedby="basic-addon2">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover table-striped " id="dataTable" width="100%" cellspacing="10px" style="font-size:12px;">
                                            <thead class="thead-dark align-middle">
                                            <?php 
                                                if(isset($data['employe']) && !empty($data['employe'])){
                                            ?>
                                              
                                                <tr class="text-center align-middle">
                                                    <th>#</th>
                                                    <th>Nom Complet</th>
                                                    <th>N° CIN</th>
                                                    <th>Date Naissance</th>
                                                    <th>Lieu Naissance</th>
                                                    <th>Email</th>
                                                    <th>Telephone</th>
                                                    <th>status</th>
                                                    <th colspan="3">Action</th>
                                                </tr>
                                            </thead>
                                            <?php foreach($data['employe'] as $employe){

                                            ?>
                                            <tbody>
                                                <tr class="text-center align-middle">
                                                    <td ><?php echo $employe->id_employe;?></td>
                                                    <td ><?php echo $employe->nom_complet;?></td>
                                                    <td ><?php echo $employe->cin;?></td>
                                                    <td ><?php echo $employe->date_naissance;?></td>
                                                    <td ><?php echo $employe->lieu_naissance;?></td>
                                                    <td ><?php echo $employe->email;?></td>
                                                    <td ><?php echo $employe->telephone;?></td>
                                                    <td ><span class="<?php if(isset($employe) && $employe->status=="active"){echo "text-success text-center";}elseif(isset($employe) && $employe->status=="desactive"){echo "text-danger text-center";}?>"><?php echo $employe->status.' ';?><i class="fa-solid fa-sm fa-circle" style="font-size:7px; line-height:7px;"></i></span></td>
                                                    <td id="activeCompte" class="btn btn-outline-light text-success btn-sm "><a href="<?php if($employe->status=='active'){echo '#';}else{echo URLROOT.'/admin/addaccount/'.$employe->id_employe;} ?>" class="text-success"><i class="fa-solid fa-sm fa-circle-plus"></i></a></td>
                                                    <td class="btn btn-outline-light btn-sm "><a href="<?php if($employe->status!='active'){echo '#';}else{echo URLROOT.'/admin/desactivercompte/'.$employe->id_employe;} ?>" class="text-danger"><i class="fa-solid fa-sm fa-close"></i></a</td>
                                                    <td class="btn btn-outline-light btn-sm show" ><a href="detail/<?=$employe->id_employe?>" class="text-decoration-none text-primary"><i class="fa-solid fa-sm fa-fw fa-eye"></i></a></td>
                                                </tr>
                                                <?php
                                                    }}
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php if(!isset($data['employe'])){
                                            
                                        ?>
                                        <h4 class="text-secondary text-center">Aucun employe existe</h3>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card shadow h-100 py-2 px-3 d-none" id="formAjout">
                                <form class="py-2 px-3" method ="post" enctype="multipart/form-data">
                                    <div class="row form-group">
                                        <div class="col-md-6 d-none">
                                            <input type="hidden" class="form-control input" id="id" name="id" >
                                        </div>
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="nom_complet" class="form-label">Nom Complet</label>
                                            <input type="text" class="form-control input0" name="nom_complet" id="nom_complet">
                                            <small class="text-danger" id="errorName"></small>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="cin" class="form-label">N° Cin</label>
                                            <input type="text" class="form-control input1" name="cin" id="cin">
                                            <small class="text-danger" id="errorNCIN"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="date_naissance" class="form-label">Date De Naissance</label>
                                            <input type="date" class="form-control input2" id="date_naissance" name ="date_naissance" aria-describedby="emailHelp">
                                            <small class="text-danger" id="errorDateNaissance"></small>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="lieu_naissance" class="form-label">Lieu De Naissance</label>
                                            <input type="text" class="form-control input3" name="lieu_naissance" id="lieu_naissance">
                                            <small class="text-danger" id="errorLieu"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control input4" id="email" name="email" aria-describedby="emailHelp">
                                            <small class="text-danger" id="errorEmail"></small>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="telephone" class="form-label">N° De Téléphone</label>
                                            <input type="text" class="form-control input5" id="telephone" name="telephone">
                                            <small class="text-danger" id="errorTelephone"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="adress" class="form-label">Address</label>
                                            <input type="text"  class="form-control input6" id="adress" name="adress">
                                            <small class="text-danger" id="errorAdress"></small>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="role" class="form-label">Role</label>
                                            <select class="form-control input7" id="role" name="role">
                                                <option value="" selected>role</option>
                                                <option value="ingenieur">Ingénieur</option>
                                                <option value="cadre">Cadre</option>
                                                <option value="technicien(ne)">Technicien(ne)</option>
                                                <option value="ouvrier">Ouvrier</option>
                                            </select>
                                            <small class="text-danger" id="errorRole"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="date_embauche" class="form-label">Date D'embauche</label>
                                            <input type="date" class="form-control input8" id="date_embauche" name="date_embauche">
                                            <small class="text-danger" id="errorDateEmbauche"></small>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="n_cnss" class="form-label">N° Cnss</label>
                                            <input type="text" class="form-control input9" id="n_cnss" name="n_cnss">
                                            <small class="text-danger" id="errorNCNSS"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="compte_bancaire" class="form-label">N° De Compte bancaire</label>
                                            <input type="text" class="form-control input10" id="compte_bancaire" name="compte_bancaire">
                                            <small class="text-danger" id="errorCompteBancaire"></small>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="banque" class="form-label">Banque</label>
                                            <input type="text" class="form-control input11" id="banque" name="banque">
                                            <small class="text-danger" id="errorBanque"></small>
                                        </div>
                                    </div>


                                    <div class="row form-group ">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="image" class="form-label btn btn-outline-primary fw-bolder" ><span class=" inline-block  border-0 px-1" style="font-size:12px;">Télécharger l'image</span><i class="fa-solid fa-fw fa-download"></i></label>
                                            <input type="file" class="form-control d-none" id="image" name="image">
                                            <small class="text-danger" id="errorImage"></small>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" name="ajouter" id="ajouter" class="btn btn-primary">Submit</button>
                                    <button type="reset" name="annuler" id="annuler" class="btn btn-danger">Annuler</button>
                                </form>
                            </div>
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
                        <span>Copyright &copy; PERFECT HR 2022</span>
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
        let ajout=document.getElementById('ajout');
        let table=document.getElementById('tableListe');
        let formAjout=document.getElementById('formAjout');
        let annuler=document.getElementById('annuler');
        let titreTable=document.getElementById('titre-table');
        let show=document.querySelectorAll('.show');
        let activeCompte=document.getElementById('activeCompte');
        let formAjoutCompte=document.getElementById('formAjoutCompte');
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
        let regexAdress=/^[a-zA-Z0-9]{3,}$/;
        let regexNCNSS=/^[0-9]{3,12}$/;
        let regexCompteBancaire=/^[0-9]{3,16}$/;
        let regexBanque=/^[a-zA-Z]{3,}$/;
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
        let submit=document.getElementById('ajouter');

        ajout.addEventListener('click',function(){
            table.style.display='none';
            titreTable.innerText='Ajouter un employé';
            ajout.setAttribute('class','d-none');
            formAjout.setAttribute('class','card shadow h-100 py-2 px-3 d-block animated--grow-in');
        });
        annuler.addEventListener('click',function(){
            table.style.display='block';
            titreTable.innerText='Liste des employés';
            ajout.style.display='block';
            formAjout.setAttribute('class','d-none ');
            window.location.reload();
        });        
        
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

            if(inputImage.value==''){
                errorImage.innerText='Ce champ est obligatoire';
                inputImage.style.borderColor='red';
            }
            else{
                errorImage.innerText='';
                inputImage.style.borderColor='green';
            }
            if(inputNom.value == '' || inputEmail.value == '' || inputCin.value == '' || inputDateNaissance.value == '' || inputLieuNaissance.value == '' || inputTelephone.value == '' || inputAdress.value == '' || inputRole.value == '' || inputDateEmbauche.value == '' || inputNCNSS.value == '' || inputCompteBancaire.value == '' || inputBanque.value == '' || inputImage.value == ''){
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