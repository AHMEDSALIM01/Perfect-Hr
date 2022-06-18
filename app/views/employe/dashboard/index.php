
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $data['title'] ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../APPROOT/../public/css/stylse.css">
    <link rel="stylesheet" href="../APPROOT/../public/css/bootstrap.min.css">
    <!-- Custom styles for this template-->
    <link href="../APPROOT/../public/css/sb-admin-2.min.css" rel="stylesheet">
</head>

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
                
                <?php include_once APPROOT. '/views/includes/navbarEmploye.php' ?>
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Employé</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow py-2">
                                <div class="card-body">
                                            <div class="year-header"> 
                                              <span class="left-button fa fa-chevron-left" id="prev"> </span> 
                                              <span class="year" id="label"></span> 
                                              <span class="right-button fa fa-chevron-right" id="next"> </span>
                                            </div> 
                                            <table class="months-table w-100"> 
                                              <tbody>
                                                <tr class="months-row">
                                                  <td class="month">Jan</td> 
                                                  <td class="month">Feb</td> 
                                                  <td class="month">Mar</td> 
                                                  <td class="month">Apr</td> 
                                                  <td class="month">May</td> 
                                                  <td class="month">Jun</td> 
                                                  <td class="month">Jul</td>
                                                  <td class="month">Aug</td> 
                                                  <td class="month">Sep</td> 
                                                  <td class="month">Oct</td>          
                                                  <td class="month">Nov</td>
                                                  <td class="month">Dec</td>
                                                </tr>
                                              </tbody>
                                            </table> 
                                            
                                            <table class="days-table w-100"> 
                                              <td class="day">Sun</td> 
                                              <td class="day">Mon</td> 
                                              <td class="day">Tue</td> 
                                              <td class="day">Wed</td> 
                                              <td class="day">Thu</td> 
                                              <td class="day">Fri</td> 
                                              <td class="day">Sat</td>
                                            </table> 
                                            <div class="frame"> 
                                              <table class="dates-table w-100"> 
                                              <tbody class="tbody">             
                                              </tbody> 
                                              </table>
                                            </div> 
        
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Evénement</h6>
                                    <a href="evenement.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Voir la liste complet</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-striped" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Désignation</th>
                                                    <th>status</th>
                                                    <th>date d'événement</th>
                                                    <th>Lieu d'événement</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Liste des taches</h6>
                                    <a href="taches.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Voir la liste complet</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-striped" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Désignation</th>
                                                    <th>durée</th>
                                                    <th>date d'assignation</th>
                                                    <th>date d'achevement</th>
                                                    <th>status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>réalisation de dashboard</td>
                                                    <td>10j</td>
                                                    <td>03/06/2022</td>
                                                    <td></td>
                                                    <td>en cours</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Demandes des Congés</h6>
                                    <a href="employés.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Voir la liste complet</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-striped" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nom complet</th>
                                                    <th>N° CIN</th>
                                                    <th>N° CNSS</th>
                                                    <th>Date d'embauche</th>
                                                    <th>Role</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                            </tbody>
                                        </table>
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

    

    <!-- Bootstrap core JavaScript-->
    <script src="../APPROOT/../public/vendor/jquery/jquery.min.js"></script>
    <script src="../APPROOT/../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../APPROOT/../public/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../APPROOT/../public/js/sb-admin-2.min.js"></script>

    <script src="../APPROOT/../public/js/popper.js"></script>
    <script src="../APPROOT/../public/js/main.js"></script>

</body>

</html>