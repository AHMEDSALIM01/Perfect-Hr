
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
                        <h1 class="h3 mb-0 text-gray-800" id="titre-table">Modifier la taches</h1>
                        <button  id="back" class="btn btn-sm btn-dark shadow-sm"><i class="fas fa-arrow-left fa-fw fa-sm text-white-50"></i> <a href="<?php echo URLROOT;?>/admin/taches" class="text-decoration-none text-white"><span class="d-none d-sm-inline-block">Retourner</span></a></button>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        
                        <!-- Pending Requests Card Example -->
                        <div class="col-12">
                            <div class="card border-left-primary shadow h-100 py-2" id="modalAssignation">
                                <form class="py-2 px-3" method ="post">
                                        <div class="row form-group">
                                            <div class="mb-3  col-12 col-sm-6">
                                                <label for="nom_complet" class="form-label">Désignation de tache</label>
                                                <input type="text" class="form-control" name="designation" id="designation" value="<?php echo $data['tache']->designation?>">
                                            </div>
                                            <div class="mb-3  col-12 col-sm-6">
                                                <label for="duree" class="form-label">Durée (J)</label>
                                                <input type="text" class="form-control" name="duree" id="duree" value="<?php echo $data['tache']->duree?>">
                                            </div>
                                        
                                        </div>

                                        <div class="row form-group">    
                                            <div class="mb-3 col-12 col-sm-6 ">
                                                <label for="nom_complet" class="form-label">Assigné pour</label>
                                                <input type="text" class="form-control" name ="nom_complet" id="nom_complet" value="<?php echo $data['tache']->nom_complet?>">
                                            </div>
                                            <input type="hidden" class="form-control" name ="id_employe" id="id_employe" value="<?php echo $data['tache']->nom_complet?>">
                                            <input type="hidden" name ="id_tache" id="id_tache" value="<?php echo $data['tache']->id_taches?>">

                                        </div>
                                        <button type="submit" name="edit" id="edit" class="btn btn-primary">Submit</button>
                                        
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
                        <span>Copyright &copy; Perfect HR 2022</span>
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