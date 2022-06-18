
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
                        <h1 class="h3 mb-0 text-gray-800">Messagerie</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        
                        <!-- Pending Requests Card Example -->
                        <div class="col-12 mb-4" >
                        <div class="card border-left-primary shadow py-2 overflow-auto scrollbar-dusty-grass" id="tableListe" style="max-height:350px;">
                                <div class="card-header py-3 ">
                                    <div class="mb-2 sticky-top">
                                        <h3><?php echo $data['message']->objet ?></h3>
                                    </div>
                                </div>
                                <div class="card-body px-4">
                                    <div >
                                        <img class="mb-2 rounded-circle" style="width=2rem; height:2rem;"  src="<?php echo URLROOT.'/public/img/'.$data['message']->image?>" alt="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="d-flex flex-column">
                                                <span>De: <?php echo $data['message']->nom_complet?> (<?php echo $data['message']->email?>)</span>
                                            </p>
                                            <p>
                                                <span><?php echo $data['message']->date_admin ?></span>
                                            </p> 
                                        </div>
                                        
                                    </div>   
                                    
                                    <p>
                                    <?php echo $data['message']->message_admin ?>
                                    </p>
                                    <form action="" id="reponse" class="d-none mb-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Message</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize:none"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Envoyer</button>
                                        <button type="reset" class="btn btn-outline-danger" id="annuler">Annuler</button>
                                    </form>
                                    <button class="btn btn-outline-primary mb-3" id="répondre">Répondre</button>                               
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

    <script>
        var reponse = document.getElementById('reponse');
        var répondre = document.getElementById('répondre');
        var annuler = document.getElementById('annuler');
        répondre.addEventListener('click', function(){
            reponse.classList.remove('d-none');
            répondre.classList.add('d-none');
        });
        annuler.addEventListener('click', function(){
            reponse.classList.add('d-none');
            répondre.classList.remove('d-none');
        });
    </script>
<?php require_once APPROOT.'/views/includes/footer.php'?>