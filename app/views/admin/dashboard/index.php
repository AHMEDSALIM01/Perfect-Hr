
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
        <?php include_once APPROOT.'/views/includes/sidebar.php' ?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            
            <!-- Main Content -->
            <div id="content">
                
                <!-- Topbar -->
                
                <?php include_once APPROOT. '/views/includes/navbar.php' ?>
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow py-2 mb-0">
                                <div class="card-header  d-flex justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Calendrier</h6>
                                </div>
                                <div class="card-body py-0">
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
                                    <h6 class="m-0 font-weight-bold text-primary">Liste des événements</h6>
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

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Liste des employés</h6>
                                    <a href="employe" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Voir la liste complet</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-striped" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <?php 
                                                if(isset($data['employe']) && !empty($data['employe'])){
                                            ?>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nom complet</th>
                                                    <th>N° CIN</th>
                                                    <th>Telephone</th>
                                                    <th>email</th>
                                                    <th>Role</th>
                                                </tr>
                                            </thead>
                                            <?php foreach($data['employe'] as $employe){

                                            ?>
                                            
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $employe->id_employe;?></td>
                                                    <td><?php echo $employe->nom_complet;?></td>
                                                    <td><?php echo $employe->cin;?></td>
                                                    <td><?php echo $employe->telephone;?></td>
                                                    <td><?php echo $employe->email;?></td>
                                                    <td><?php echo $employe->role;?></td>
                                                </tr>
                                                <?php
                                                    }}
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php if(!isset($data['employe'])){
                                            
                                        ?>
                                        <h4 class="text-secondary text-center">Aucun employe existe</h3>
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