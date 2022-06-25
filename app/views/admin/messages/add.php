
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
                        <h1 class="h3 mb-0 text-gray-800">Nouveau Message</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        
                        <!-- Pending Requests Card Example -->
                        <div class="col-12 mb-4" >
                        <div class="card border-left-primary shadow py-2 overflow-auto scrollbar-dusty-grass" id="tableListe" style="max-height:350px;">
                                <div class="card-body px-4">
                                    <form action="" id="reponse" class="mb-3" method="post">
                                        <div class="row mb-3" style="border-bottom:3px solid #d1d3e2;">
                                            <div class="form-group col-6">
                                                <label for="objet">Objet :</label>
                                                <input type="text" class="form-control shadow-none mb-0" id="objet" name="objet" style="border:none; border-bottom:2px solid #486dda;">
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="recepteur">A :</label>
                                                <select class="form-control shadow-none " id="recepteur" name="recepteur" style="border:none; border-bottom:2px solid #486dda;">
                                                    <option value="">Choisir un utilisateur</option>
                                                    <?php foreach($data['employes'] as $employe){ ?>
                                                        <option value="<?php echo $employe->id_employe ?>"><?php echo $employe->nom_complet ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Message :</label>
                                            <textarea class="form-control shadow-none " name="message" id="exampleFormControlTextarea1" rows="4" style="resize:none;border:none; border-bottom:2px solid #486dda;"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
                                    </form>
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
<?php require_once APPROOT.'/views/includes/footer.php'?>