
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
                        <h1 class="h3 mb-0 text-gray-800" id="titre-table">Envoyer une justification</h1>
                        <button  id="back" class="btn btn-sm btn-dark shadow-sm"><i class="fas fa-arrow-left fa-fw fa-sm text-white-50"></i> <a href="../employe" class="text-decoration-none text-white"><span class="d-none d-sm-inline-block">Retourner</span></a></button>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        
                        <!-- Pending Requests Card Example -->
                        <div class="col-12  mb-4">
                            <div class="card-head py-2 d-flex justify-content-end">
                            </div>
                                <div class="card shadow h-100 py-2 px-3 " id="formAjoutCompte">
                                    <form class="py-2 px-3" method ="post" enctype="multipart/form-data">
                                        <div class="row form-group">
                                            <div class="mb-3  col-12">
                                                <label for="designation" class="form-label">Désignation</label>
                                                <textarea class="form-control" name="designation" id="designation" rows="4"  style="resize: none;"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3  col-12">
                                            <label for="file" class="form-label btn btn-outline-primary fw-bolder" ><span class=" inline-block  border-0 px-1" style="font-size:12px;">Télécharger l'image</span><i class="fa-solid fa-fw fa-download"></i></label>
                                            <input type="file" class="form-control d-none" id="file" name="file">
                                        </div>
                                        <button type="submit" name="addJustif" class="btn btn-primary">Ajouter</button>
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