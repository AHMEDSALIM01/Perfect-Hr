
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
                        <h1 class="h3 mb-0 text-gray-800">Listes des taches</h1>
                        <button id="addtache" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus-circle fa-fw fa-sm text-white-50"></i> Ajouter une tache</button>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        
                        <!-- Pending Requests Card Example -->
                        <div class="col-12 col-xl-6  mb-4">
                            <div class="card border-left-primary shadow h-100 py-2" id="tacheEncours">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Taches en cours</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size:12px;">
                                            <thead class="thead-dark">
                                            <?php 
                                                if(isset($data['tacheEncours']) && !empty($data['tacheEncours'])){
                                            ?>
                                                <tr class="text-center">
                                                    <th class="align-middle">#</th>
                                                    <th class="align-middle">Id_employé</th>
                                                    <th class="align-middle">Nom employé</th>
                                                    <th class="align-middle">Désignation</th>
                                                    <th class="align-middle">Date assignation</th>
                                                    <th class="align-middle">Durée</th>
                                                    <th class="align-middle">Status</th>
                                                    <th colspan="3" class="align-middle">Actions</th>
                                                </tr>
                                            </thead>
                                            <?php foreach($data['tacheEncours'] as $tacheEncours){

                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle"><?php echo $tacheEncours->id_taches;?></td>
                                                    <td class="align-middle"><?php echo $tacheEncours->id_employe;?></td>
                                                    <td class="align-middle"><?php echo $tacheEncours->nom_complet;?></td>
                                                    <td class="align-middle"><?php echo $tacheEncours->designation;?></td>
                                                    <td class="align-middle"><?php echo $tacheEncours->date_assignation;?></td>
                                                    <td class="align-middle"><?php echo $tacheEncours->duree;?></td>
                                                    <td class="align-middle"><?php echo $tacheEncours->status_taches;?></td>
                                                    <td class="align-middle"><a href="<?php echo URLROOT;?>/admin/editTache/<?php echo $tacheEncours->id_taches;?>" class="btn btn-sm btn-primary"><i class="fa fa-pen fa-fw fa-sm"></i></a></td>
                                                    <td class="align-middle"><a href="<?php echo URLROOT;?>/admin/deleteTache/<?php echo $tacheEncours->id_taches;?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw fa-sm"></i></a></td>
                                                </tr>
                                                <?php
                                                    }}
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php if(!isset($data['tacheEncours'])){
                                            
                                        ?>
                                            <h4 class="text-secondary text-center">Aucune tache assignée</h3>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6  mb-4 ">
                            <div class="card border-left-primary shadow h-100 py-2" id="tacheTerminé">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Taches terminée</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive ">
                                        <table class="table table-borderless  table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size:12px;">
                                            <thead class="thead-dark">
                                            <?php 
                                                if(isset($data['tacheTermine']) && !empty($data['tacheTermine'])){
                                            ?>
                                                <tr>
                                                    <th class="align-middle">#</th>
                                                    <th class="align-middle">Id_employé</th>
                                                    <th class="align-middle">Nom employé</th>
                                                    <th class="align-middle">Désignation</th>
                                                    <th class="align-middle">Date assignation</th>
                                                    <th class="align-middle">Durée</th>
                                                    <th class="align-middle">Status</th>
                                                    <th class="align-middle">Date Achievement</th>
                                                </tr>
                                            </thead>
                                            <?php foreach($data['tacheTermine'] as $tacheTermine){

                                            ?>  
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle"><?php echo $tacheTermine->id_taches;?></td>
                                                    <td class="align-middle"><?php echo $tacheTermine->id_employe;?></td>
                                                    <td class="align-middle"><?php echo $tacheTermine->nom_complet;?></td>
                                                    <td class="align-middle"><?php echo $tacheTermine->designation;?></td>
                                                    <td class="align-middle"><?php echo $tacheTermine->date_assignation;?></td>
                                                    <td class="align-middle"><?php echo $tacheTermine->duree;?></td>
                                                    <td class="align-middle"><?php echo $tacheTermine->status_taches;?></td>
                                                    <td class="align-middle"><?php echo $tacheTermine->date_achevement;?></td>

                                                </tr>
                                                <?php
                                                    }}
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php if(!isset($data['tacheTermine'])){
                                            
                                        ?>
                                            <h4 class="text-secondary text-center">Aucune tache terminée</h3>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-12">
                            <div class="card border-left-primary shadow h-100 py-2 d-none" id="modalAssignation">
                                <form class="py-2 px-3" method ="post">
                                        <div class="row form-group">
                                            <div class="mb-3  col-12 col-sm-6">
                                                <label for="nom_complet" class="form-label">Désignation de tache</label>
                                                <input type="text" class="form-control" name="designation" id="designation">
                                            </div>
                                            <div class="mb-3  col-12 col-sm-6">
                                                <label for="duree" class="form-label">Durée (J)</label>
                                                <input type="text" class="form-control" name="duree" id="duree">
                                            </div>
                                        
                                        </div>

                                        <div class="row form-group">    
                                            <div class="mb-3 col-12">
                                                <label for="id_employe" class="form-label">Date assignation</label>
                                                <select name ="id_employe" id="id_employe">
                                                    <option value="">Selectionner un employé</option>
                                                    <?php foreach ($data['employe'] as $employe) {?>                                                
                                                        <option value="<?php echo $employe->id_employe;?>"><?php echo $employe->nom_complet;?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" name="ajouter" id="ajouter" class="btn btn-primary">Submit</button>
                                        <button type="reset" name="annuler" id="annuler" class="btn btn-danger ">Annuler</button>   
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        var add = document.getElementById('addtache');
        var modal = document.getElementById('modalAssignation');
        var modalTacheTerminer = document.getElementById('tacheTerminé');
        var modalTacheEnCours = document.getElementById('tacheEncours');
        var annuler = document.getElementById('annuler');
        add.addEventListener('click', function(){
            modal.setAttribute('class', 'card border-left-primary shadow h-100 py-2');
            modalTacheTerminer.style.display = "none";
            modalTacheEnCours.style.display = "none";
        });

        annuler.addEventListener('click', function(){
            modal.setAttribute('class', 'card border-left-primary shadow h-100 py-2 d-none');
            modalTacheTerminer.style.display="block";
            modalTacheEnCours.style.display="block";
        });
    </script>
<?php require_once APPROOT.'/views/includes/footer.php'?>