<?php require_once APPROOT.'/views/includes/header.php'?>
<body class="">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-12 col-sm-10 col-md-8 col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5 p-5 rounded-3">
                    <!-- <div class="card-body p-0"> -->
                        <!-- Nested Row within Card Body -->
                        <!-- <div class="row d-flex justify-content-center align-items-center"> -->
                            <!-- <div class="col-lg-6 justify-content-center shadow-light"> -->
                                <!-- <div class="p-5"> -->
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="new_password" name="new_password"
                                                placeholder="nouveau mot de passe" >
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="confirm_password" name="confirm_password" placeholder="Confirmer le mot de passe">
                                        </div>
                                        <button type="submit" name="valider" class="btn btn-primary btn-user btn-block">
                                            Valider
                                        </button>
                                    </form>
                                <!-- </div> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    <!-- </div> -->
                </div>

            </div>

        </div>

    </div>

<?php require_once APPROOT.'/views/includes/footer.php'?>   