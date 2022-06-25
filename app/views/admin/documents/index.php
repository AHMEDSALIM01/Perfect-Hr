
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
                    <div class="d-sm-flex align-items-center justify-content-around mb-4">
                        <button id="justification" class="btn btn-outline-primary btn-md active shadow-none">Justification d'absence</button>
                        <button id="AT" class="btn btn-outline-primary btn-md shadow-none">Attestations</button>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        
                        <!-- Pending Requests Card Example -->
                        <div class="col-12  mb-4">
                        <div class="card border-left-primary shadow h-100 py-2" id="tableListe">
                                <div class="card-header py-3 d-flex align-itmes-center justify-content-between">
                                    <div class="mb-2 ">
                                        <form class="form-inline mr-auto w-100 navbar-search">
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-white border-0 small"
                                                    placeholder="Search for..." aria-label="Search"
                                                    aria-describedby="basic-addon2">
                                            </div>
                                        </form>
                                        
                                    </div>
                                    <button  id="ajtJustif" class="d-none btn btn-sm btn-primary shadow-sm"><i
                                            class="fas fa-plus-circle fa-fw fa-sm text-white-50"></i> Ajouter</button>
                                    <button  id="ajtAT" class="d-none"><i
                                            class="fas fa-plus-circle fa-fw fa-sm text-white-50"></i> Ajouter</button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" id="justifTable">
                                        <table class="table table-borderless table-hover table-striped " id="dataTable" width="100%" cellspacing="10px" style="font-size:12px;">
                                            <thead class="thead-dark align-middle">
                                            <?php 
                                                if(isset($data['justifications']) && !empty($data['justifications'])){
                                            ?>
                                              
                                                <tr class="text-center align-middle">
                                                    <th>#</th>
                                                    <th>id_employe</th>
                                                    <th>Nom de l'employe</th>
                                                    <th>Désignation</th>
                                                    <th>Date d'opération</th>
                                                    <th>lien du document</th>
                                                </tr>
                                            </thead>
                                            <?php foreach($data['justifications'] as $justification){ 
                                            ?>
                                            <tbody>
                                                <tr class="text-center align-middle">
                                                    <td ><?php echo $justification->id_justif;?></td>
                                                    <td ><?php echo $justification->id_employe;?></td>
                                                    <td ><?php echo $justification->nom_complet_employe;?></td>
                                                    <td ><?php echo $justification->designation;?></td>
                                                    <td ><?php echo $justification->date_operation;?></td>
                                                    <td class="btn btn-outline-light btn-sm "><a href="<?php echo URLROOT.'/admin/downloadJustif/'.$justification->id_justif; ?>" class="text-decoration-none fw-bold"><span class="inline-block">Télécharger</span><i class="fa-solid fa-fw fa-md fa-download"></i></a</td>
                                                </tr>
                                                <?php
                                                    }}
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php if(!isset($data['justifications']) || empty($data['justifications'])){ 
                                            
                                        ?>
                                        <h4 class="text-secondary text-center">Aucunne justification d'absence existé</h3>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="table-responsive d-none" id="aTTable">
                                        <table class="table table-borderless table-hover table-striped " id="dataTable" width="100%" cellspacing="10px" style="font-size:12px;">
                                            <thead class="thead-dark align-middle">
                                            <?php 
                                                if(isset($data['attestations']) && !empty($data['attestations'])){
                                            ?>
                                              
                                                <tr class="text-center align-middle">
                                                    <th>#</th>
                                                    <th>id_employe</th>
                                                    <th>Nom et prénom</th>
                                                    <th>Type de document</th>
                                                    <th>Date d'opération</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php foreach($data['attestations'] as $attestation){

                                            ?>
                                            <tbody>
                                                <tr class="text-center align-middle">
                                                    <td ><?php echo $attestation->id_document;?></td>
                                                    <td ><?php echo $attestation->id_employe;?></td>
                                                    <td ><?php echo $attestation->nom_complet_employe;?></td>
                                                    <td ><?php echo $attestation->type_document;?></td>
                                                    <td ><?php echo $attestation->date_operation;?></td>
                                                    <td id="editer" class="btn btn-outline-light btn-sm "><a href="" class="text-decoration-none text-primary"><i class="fa-solid fa-sm fa-fw fa-pen"></i></a></td>
                                                </tr>
                                                <?php
                                                    }}
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php if(!isset($data['attestations']) || empty($data['attestations'])){
                                            
                                        ?>
                                        <h4 class="text-secondary text-center">Aucunne Attestation Existé</h3>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <form  method="post" class="d-none" id="addAT">
                                        <div class="form-group mb-3">
                                            <label for="id_employe">Doucment pour :</label>
                                            <select class="form-control" name="id_employe" id="id_employe">
                                                <option value="">Choisir un employe</option>
                                                <?php foreach($data['employe'] as $employe){?>
                                                    <option value="<?php echo $employe->id_employe ?>"><?php echo $employe->nom_complet ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="type">Type de document</label>
                                            <select class="form-control" name="type" id="type" >
                                                <option value="">Choisir un type</option>
                                                <option value="attestation de travail">Attestation de travail</option>
                                                <option value="attestation de salaire">Attestation de salaire</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3 d-none" id="sal">
                                            <label for="salaire">Salaire du personne concernée </label>
                                            <input type ="text" class="form-control" name="salaire" id="salaire" >
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="lieu">Lieu d'opperation </label>
                                            <input type ="text" class="form-control" name="lieu" id="lieu" >
                                        </div>
                                        <div class="form-group mb-3 d-flex">
                                            <button class="btn mx-2 btn-sm btn-primary shadow-sm" type="submit" name="suivant" id="suivant">Confirmer</button>
                                            <button class="btn btn-sm btn-outline-danger shadow-sl" type="reset" name="annuler" id="annuler">Annuler</button>
                                        </div>
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

    <script>
        var justifTable = document.getElementById("justifTable");
        var aTTable = document.getElementById("aTTable");
        var justification = document.getElementById("justification");
        var AT = document.getElementById("AT");
        var ajoutAT = document.getElementById("ajtAT");
        var ajoutJustif = document.getElementById("ajtJustif");
        var addAT = document.getElementById("addAT");
        var annuler = document.getElementById("annuler");
        var salaire = document.getElementById("sal");
        var type_document = document.getElementById("type");

        justification.addEventListener("click", function(){
            justifTable.classList.remove("d-none");
            aTTable.classList.add("d-none");
            justification.classList.add("active");
            AT.classList.remove("active");
            ajoutAT.setAttribute("class","d-none");
            addAT.classList.remove("d-block");
        });

        AT.addEventListener("click", function(){
            justifTable.classList.add("d-none");
            aTTable.classList.remove("d-none");
            justification.classList.remove("active");
            AT.classList.add("active");
            ajoutAT.setAttribute("class","d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm animation--grow-in");
        });


        ajoutJustif.addEventListener("click", function(){
            addAT.classList.add("d-block");
            aTTable.classList.add("d-none");
        });

        annuler.addEventListener("click", function(){
            addAT.classList.remove("d-block");
            aTTable.classList.remove("d-none");
        });

        type_document.addEventListener("input", function(){

            if(type_document.value == 'attestation de salaire'){
                salaire.classList.remove('d-none');
            }else{
                salaire.classList.add('d-none');
            }

        });

        ajoutAT.addEventListener("click", function(){
            addAT.classList.add("d-block");
            aTTable.classList.add("d-none");
        });

        annuler.addEventListener("click", function(){
            addAT.classList.remove("d-block");
            aTTable.classList.remove("d-none");
        });



    </script>
<?php require_once APPROOT.'/views/includes/footer.php'?>