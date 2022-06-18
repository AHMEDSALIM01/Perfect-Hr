
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
                        <h1 class="h3 mb-0 text-gray-800">Listes des taches</h1>
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
                                                    <th colspan="1" class="align-middle">Actions</th>
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
                                                    <td class="align-middle <?php if($tacheEncours->status_taches=='en cours'){echo 'text-warning';}?>"><?php echo $tacheEncours->status_taches;?></td>
                                                    <td class="align-middle"><a href="<?php echo URLROOT;?>/employe/fermerTache/<?php echo $tacheEncours->id_taches;?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right fa-fw fa-sm"></i></a></td>
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
                                                    <td class="align-middle <?php if($tacheTermine->status_taches=='termine'){echo 'text-success';}?>"><?php echo $tacheTermine->status_taches;?></td>
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
<?php require_once APPROOT.'/views/includes/footer.php'?>