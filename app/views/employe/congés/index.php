
<?php require_once APPROOT.'/views/includes/header.php'?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once APPROOT.'/views/includes/sidebarEmploye.php' ?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            
            <!-- Main Content -->
            <div id="content">
                
                <!-- Topbar -->
        
                <?php include_once APPROOT.'/views/includes/navbarEmploye.php' ?>
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" id="titre-table">Liste des congés</h1>
                        <button  id="ajout" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus-circle fa-fw fa-sm text-white-50"></i> Demander un congé</button>
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
                                                    if(isset($data['conges']) && !empty($data['conges'])){
                                                ?>
                                                
                                                    <tr class="text-center align-middle">
                                                        <th>#</th>
                                                        <th>Nom et prenom</th>
                                                        <th>Désignation</th>
                                                        <th>Date de début</th>
                                                        <th>Date de fin</th>
                                                        <th>Durée</th>
                                                        <th>status</th>
                                                        <th colspan="2">Action</th>
                                                    </tr>
                                                </thead>
                                                <?php foreach($data['conges'] as $conge){

                                                ?>
                                                <tbody>
                                                    <tr class="text-center align-middle">
                                                        <td ><?php echo $conge->id_conge;?></td>
                                                        <td ><?php echo $conge->nom_complet;?></td>
                                                        <td ><?php echo $conge->designation;?></td>
                                                        <td ><?php echo $conge->date_debut;?></td>
                                                        <td ><?php echo $conge->date_fin;?></td>
                                                        <td ><?php echo $conge->duree;?></td>
                                                        <td ><span class="<?php if(isset($conge) && $conge->status_conge=="accepté"){echo "text-success text-center";}elseif(isset($conge) && $conge->status_conge=="refusé"){echo "text-danger fw-bold text-center";}else{echo "text-warning fw-bold text-center";}?>"><?php echo $conge->status_conge.' ';?><i class="fa-solid fa-fw fa-ellipsis <?php if($conge->status_conge !='en cours'){echo 'd-none';}?>"></i><i class="fa-solid fa-check <?php if($conge->status_conge !='accepté'){echo 'd-none';}?>"></i><i class="fa-solid fa-md fa-fw fa-close <?php if($conge->status_conge !='refusé'){echo 'd-none';}?>"></span></td>
                                                        <td id="editer" class="btn btn-outline-light text-success btn-sm "><a href="<?php if($conge->status_conge =='en cours'){echo URLROOT.'/employe/editConge/'.$conge->id_conge;}else{echo '#';} ?>" class="text-primary"><i class="fa-solid fa-sm fa-fw fa-pen"></i></a></td>
                                                        <td class="btn btn-outline-light btn-sm "><a href="<?php if($conge->status_conge == 'en cours'){echo URLROOT.'/employe/deleteConge/'.$conge->id_conge;}else{echo '#'; }?>" class="text-danger"><i class="fa-solid fa-md fa-fw fa-trash"></i></a</td>
                                                    </tr>
                                                    <?php
                                                        }}
                                                    ?>
                                                </tbody>
                                            </table>
                                            <?php if(!isset($data['conges'])){
                                                
                                            ?>
                                            <h4 class="text-secondary text-center">Aucunne demande de congés existe</h3>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                            </div>
                            <div class="card shadow h-100 py-2 px-3 d-none" id="formAjout">
                                <form class="py-2 px-3" method ="post" enctype="multipart/form-data" action="<?php echo URLROOT.'/employe/demandeConge' ?>">

                                    <div class="row form-group">
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="designation" class="form-label">Designation</label>
                                            <input type="text" class="form-control input3" name="designation" id="designation">
                                            <small class="text-danger" id="errorDesignation"></small>
                                        </div>
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="date_debut" class="form-label">Date De Début</label>
                                            <input type="date" class="form-control input2" id="date_debut" name ="date_debut">
                                            <small class="text-danger" id="errorDateDebut"></small>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="mb-3  col-12 col-sm-6">
                                            <label for="date_fin" class="form-label">Date De Fin</label>
                                            <input type="date" class="form-control input2" id="date_fin" name ="date_fin">
                                            <small class="text-danger" id="errorDateFin"></small>
                                        </div>
                                        <div class="mb-3 col-12 col-sm-6">
                                            <label for="duree" class="form-label">Durée</label>
                                            <input type="text" class="form-control input5" id="duree" name="duree">
                                            <small class="text-danger" id="errorDuree"></small>
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
        let formAjout=document.getElementById('formAjout');
        let table=document.getElementById('tableListe');
        let titreTable=document.getElementById('titre-table');
        let designation = document.getElementById('designation');
        let date_debut = document.getElementById('date_debut');
        let date_fin = document.getElementById('date_fin');
        let duree = document.getElementById('duree');
        let ajouter = document.getElementById('ajouter');
        let annuler = document.getElementById('annuler');
        let errorDesignation = document.getElementById('errorDesignation');
        let errorDateFin = document.getElementById('errorDateFin');
        let errorDuree = document.getElementById('errorDuree');
        let errorDateDebut = document.getElementById('errorDateDebut');
        var date1 = date_debut.value;
        var date2 = date_fin.value;
        var Diff_temps = date2 - date1; 
        var Diff_jours = Diff_temps / (1000 * 3600 * 24);
        
        ajouter.addEventListener('click',function(e){
            
            if(designation.value == ''){
                errorDesignation.innerHTML = 'Veuillez entrer une designation';
                designation.style.border = '1px solid red';
            }else{
                errorDesignation.innerHTML = '';
                designation.style.border = '1px solid green';
            }
            if(date_debut.value == ''){
                errorDateDebut.innerHTML = 'Veuillez entrer une date de début';
                date_debut.style.border = '1px solid red';
            }else{
                errorDateDebut.innerHTML = '';
                date_debut.style.border = '1px solid green';
            }
            if(date_fin.value == ''){
                errorDateFin.innerHTML = 'Veuillez entrer une date de fin';
                date_fin.style.border = '1px solid red';
            }else{
                errorDateFin.innerHTML = '';
                date_fin.style.border = '1px solid green';
            }
            if(duree.value == ''){
                errorDuree.innerHTML = 'Veuillez entrer une durée';
                duree.style.border = '1px solid red';
            }else{
                errorDuree.innerHTML = '';
                duree.style.border = '1px solid green';
            }

            if(designation.value == '' && date_debut.value == '' && date_fin.value == '' && duree.value == ''){
                e.preventDefault();
            }
        });
        
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

        function treatAsUTC(date) {
            var result = new Date(date);
            result.setMinutes(result.getMinutes() - result.getTimezoneOffset());
            return result;
        }

        function daysBetween(startDate, endDate) {
            var millisecondsPerDay = 24 * 60 * 60 * 1000;
            return (treatAsUTC(endDate) - treatAsUTC(startDate)) / millisecondsPerDay;
        }

        duree.addEventListener('focus',function(){
            duree.value = daysBetween(date_debut.value,date_fin.value);
        });

    </script>
<?php require_once APPROOT.'/views/includes/footer.php'?>