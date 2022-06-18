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
                        <h1 class="h3 mb-0 text-gray-800" id="title">Liste des événements</h1>
                        <button id="ajouterEvent" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus-circle fa-fw fa-sm text-white-50"></i> Ajouter un événement</button>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        
                        <!-- Pending Requests Card Example -->
                            <div class="col-12  mb-4">
                                <div class="card border-left-primary shadow h-100 py-2 " id="tableListe">
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
                                                        if(isset($data['evenement']) && !empty($data['evenement'])){
                                                    ?>
                                                    
                                                        <tr class="text-center align-middle">
                                                            <th>#</th>
                                                            <th>Désignation</th>
                                                            <th>Date d'événement</th>
                                                            <th>Lieu d'événement</th>
                                                            <th>status</th>
                                                            <th colspan="2">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php foreach($data['evenement'] as $evenement){

                                                    ?>
                                                    <tbody>
                                                        <tr class="text-center align-middle">
                                                            <td ><?php echo $evenement->id;?></td>
                                                            <td ><?php echo $evenement->designation;?></td>
                                                            <td id="date_evt" data-evnt="<?php echo $evenement->date_evenement;?>"><?php echo $evenement->date_evenement;?></td>
                                                            <td ><?php echo $evenement->lieu_evenement;?></td>
                                                            <td ><span class="<?php if(isset($evenement) && $evenement->status=="passe"){echo "text-success text-center";}else{echo "text-warning fw-bold text-center";}?>"><?php echo $evenement->status.' ';?><i class="fa-solid fa-fw fa-ellipsis <?php if($evenement->status !='prochain'){echo 'd-none';}?>"></i><i class="fa-solid fa-check <?php if($evenement->status !='passe'){echo 'd-none';}?>"></i></span></td>
                                                            <td id="accepter" class="btn btn-outline-light text-success btn-sm "><a href="<?php if($evenement->status=='passe'){echo '#';}else{echo URLROOT.'/admin/closeEvenement/'.$evenement->id;} ?>" class="text-success"><i class="fa-solid fa-sm fa-fw fa-check"></i></a></td>
                                                            <td id="edit" class="btn btn-outline-light text-success btn-sm "><a href="<?php if($evenement->status!='passe'){echo URLROOT.'/admin/editEvenement/'.$evenement->id;}else{echo "#";} ?>" class="text-primary"><i class="fa-solid fa-sm fa-fw fa-pen-to-square"></i></a></td>
                                                            <td class="btn btn-outline-light btn-sm "><a href="<?php echo URLROOT.'/admin/deleteEvenement/'.$evenement->id; ?>" class="text-danger"><i class="fa-solid fa-sm fa-fw fa-trash"></i></a</td>
                                                        </tr>
                                                        <?php
                                                            }}
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <?php if(!isset($data['evenement'])){
                                                    
                                                ?>
                                                <h4 class="text-secondary text-center">Aucun événement existé</h3>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            
                                        </div>
                                </div>
                                <div class="card border-left-primary shadow h-100 py-2 d-none" id="addEvent">
                                    <form class="py-2 px-3" action ="<?php echo URLROOT.'/admin/addEvenement' ?>" method ="post">
                                            <div class="row form-group">
                                                <div class="mb-3  col-12 col-sm-6">
                                                    <label for="designation" class="form-label">Désignation de l'événement</label>
                                                    <input type="text" class="form-control" name="designation" id="designation" value="">
                                                </div>
                                                <div class="mb-3  col-12 col-sm-6">
                                                    <label for="date_evenement" class="form-label">Date d'evenement</label>
                                                    <input type="date" class="form-control" name="date_evenement" id="date_evenement" value="">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="mb-3  col-12 col-sm-6">
                                                    <label for="lieu_evenement" class="form-label">Lieu d'evenement</label>
                                                    <input type="text" class="form-control" name="lieu_evenement" id="lieu_evenement" value="">
                                                </div>
                                            </div>

                                            <div class="row form-group">    
                                                <input type="hidden" name ="id_evenement" id="id_evenement" value="">
                                            </div>
                                            <button type="submit" name="add" id="add" class="btn btn-primary">Ajouter</button>
                                            <button type="reset" name="annuler" id="annuler" class="btn btn-danger">Annuler</button>
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

    <script>
        var show = document.getElementById('ajouterEvent');
        var annuler = document.getElementById('annuler');
        var tableListe = document.getElementById('tableListe');
        var addEvent = document.getElementById('addEvent');
        var title = document.getElementById('title');

        show.addEventListener('click', function(){
            tableListe.classList.add('d-none');
            addEvent.classList.remove('d-none');
            title.innerHTML = "Ajouter un événement";
        });

        annuler.addEventListener('click', function(){
            tableListe.classList.remove('d-none');
            addEvent.classList.add('d-none');
            title.innerHTML = "Liste des événements";
        });

    </script>
    <script>
        $(document).ready(function(){
           $('date_evt').each(function(index, value){
                var date = new Date(value);
                var date_evt = date.getDate() + '/' + (date.getMonth()+1) + '/' + date.getFullYear();
                $(this).val(date_evt);
            });
        });
    </script>
<?php require_once APPROOT.'/views/includes/footer.php'?>