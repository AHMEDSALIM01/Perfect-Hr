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
                                            <small class="text-danger" id="errorPassword"></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="confirm_password" name="confirm_password" placeholder="Confirmer le mot de passe">
                                            <small class="text-danger" id="errorCofirmPassword"></small>
                                        </div>
                                        <button type="submit" id="submit" name="valider" class="btn btn-primary btn-user btn-block">
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

    <script>
        var confirm_password = document.getElementById("confirm_password");
        var new_password = document.getElementById("new_password");
        var errorPassword = document.getElementById("errorPassword");
        var errorCofirmPassword = document.getElementById("errorCofirmPassword");
        var submit = document.getElementById('submit');
        var regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

       

        confirm_password.addEventListener('input', function() {
            if (confirm_password.value != new_password.value) {
                errorCofirmPassword.innerHTML = "Les mots de passe ne correspondent pas";
                submit.disabled = true;
                confirm_password.style.borderColor = "red";
            } else {
                errorCofirmPassword.innerHTML = "";
                submit.disabled = false;
                confirm_password.style.borderColor = "green";
            }
        }
        );

        new_password.addEventListener('input', function() {
            if (regexPassword.test(new_password.value)) {
                new_password.style.borderColor = "green";
                errorPassword.innerHTML = "";
                submit.disabled = false;
            } else {
                new_password.style.borderColor = "red";
                errorPassword.innerHTML = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial";
                submit.disabled = true;
            }
        }
        );

        submit.addEventListener('click',function(e){
            if(new_password.value != confirm_password.value){
                e.preventDefault();
            }else if(!regexPassword.test(new_password.value)){
                new_password.style.borderColor = "red";
                errorPassword.innerHTML = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial";
                e.preventDefault();
            }else if(new_password.value == ""){
                new_password.style.borderColor = "red";
                errorPassword.innerHTML = "Le mot ne doit pas être vide";
                e.preventDefault();
            }
        });
    </script>

<?php require_once APPROOT.'/views/includes/footer.php'?>   