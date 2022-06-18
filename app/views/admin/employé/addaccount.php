
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
                        <h1 class="h3 mb-0 text-gray-800" id="titre-table"><?php if(empty($data['employe']->password)){echo 'Ajouter Un compte';}else{echo 'Réactiver le compte';} ?></h1>
                        <button  id="back" class="btn btn-sm btn-dark shadow-sm"><i class="fas fa-arrow-left fa-fw fa-sm text-white-50"></i> <a href="../employe" class="text-decoration-none text-white"><span class="d-none d-sm-inline-block">Retourner</span></a></button>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        
                        <!-- Pending Requests Card Example -->
                        <div class="col-12  mb-4">
                            <div class="card-head py-2 d-flex justify-content-end">
                            </div>
                                <div class="card shadow h-100 py-2 px-3 " id="formAjoutCompte">
                                    <form class="py-2 px-3" method ="post" >
                                        <div class="row form-group">
                                            <div class="col-md-6 d-none">
                                                <input type="hidden" class="form-control input" id="id" name="id" value="<?php echo $data['employe']->id_employe?>">
                                            </div>
                                            <div class="mb-3  col-12">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $data['employe']->email;?>" >
                                            </div>
                                            <div class="mb-3 col-12">
                                                <label for="password" class="form-label <?php if(empty($data['employe']->password)){echo 'd-none';}else{echo '';}?>">Mot de passe</label>
                                                <input type="<?php if(empty($data['employe']->password)){echo 'hidden';}else{echo 'text';}?>" class="form-control" name="password" id="password" value="<?php if(!empty($data['employe']->password)){echo $data['employe']->password;}else{echo '';}?>" <?php if(!empty($data['employe']->password)){echo 'disabled';}else{echo '';}?>>
                                            </div>
                                        </div>

                                        <button type="submit" name="<?php if(!empty($data['employe']->password)){echo 'reactive';}else{echo 'addAccount';} ?>" id="<?php if(!empty($data['employe']->password)){echo 'reactivCompte';}else{echo 'addAccount';} ?>" class="btn btn-primary"><?php if(!empty($data['employe']->password)){echo 'Reactiver';}else{echo 'Ajouter';}?></button>
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