
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
                        <h1 class="h3 mb-0 text-gray-800">Liste des congés</h1>
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
                                                    <th>id_employe</th>
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
                                                    <td ><?php echo $conge->id_employe;?></td>
                                                    <td ><?php echo $conge->nom_complet?></td>
                                                    <td ><?php echo $conge->designation;?></td>
                                                    <td ><?php echo $conge->date_debut;?></td>
                                                    <td ><?php echo $conge->date_fin;?></td>
                                                    <td ><?php echo $conge->duree;?></td>
                                                    <td ><span class="<?php if(isset($conge) && $conge->status_conge=="accepté"){echo "text-success text-center";}elseif(isset($conge) && $conge->status_conge=="refusé"){echo "text-danger fw-bold text-center";}else{echo "text-warning fw-bold text-center";}?>"><?php echo $conge->status_conge.' ';?><i class="fa-solid fa-fw fa-ellipsis <?php if($conge->status_conge !='en cours'){echo 'd-none';}?>"></i><i class="fa-solid fa-check <?php if($conge->status_conge !='accepté'){echo 'd-none';}?>"></i><i class="fa-solid fa-md fa-fw fa-close <?php if($conge->status_conge !='refusé'){echo 'd-none';}?>"></span></td>
                                                    <td id="accepter" class="btn btn-outline-light text-success btn-sm "><a href="<?php if($conge->status_conge=='accepté' || $conge->status_conge=='refusé'){echo '#';}else{echo URLROOT.'/admin/accepte/'.$conge->id_conge;} ?>" class="text-success"><i class="fa-solid fa-sm fa-fw fa-check"></i></a></td>
                                                    <td class="btn btn-outline-light btn-sm "><a href="<?php if($conge->status_conge == 'refusé' || $conge->status_conge == 'accepté'){echo '#';}else{echo URLROOT.'/admin/refuse/'.$conge->id_conge;} ?>" class="text-danger"><i class="fa-solid fa-md fa-fw fa-close"></i></a</td>
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
<?php require_once APPROOT.'/views/includes/footer.php'?>