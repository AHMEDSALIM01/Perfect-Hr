<?php require_once APPROOT.'/views/includes/header.php'?>
<body class="" style="background-image:url(<?php echo URLROOT.'/public/img/background.png'?>)">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center mb-5">
                                        <img src="<?php echo URLROOT.'/public/img/logoblue.png'?>" style="width:90%;" alt="">
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control shadow-none"
                                                id="Email" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Adresse Email" value = "<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email'];?>">
                                                <span class="text-danger" id="errorEmail"><?php if(isset($data['error_email'])) echo $data['error_email']; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control shadow-none"
                                                id="Password" name="password" placeholder="Mot de passe">
                                                <span class="text-danger" id="errorPassword"><?php if(isset($data['error_password'])) echo $data['error_password'];?></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="checkbox" value=1 class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">souviens de moi</label>
                                            </div>
                                        </div>
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                            Se connecter
                                        </button>
                                        <hr>
                                    </form>
                                    
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Mot de passe oublié?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script>
        var email = document.getElementById('Email');
        var password = document.getElementById('Password');
        var errorEmail = document.getElementById('errorEmail');
        var errorPassword = document.getElementById('errorPassword');
        var submit = document.getElementById('submit');
        var regexEmail =/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/;
        var regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        email.addEventListener('input', function(e){
            if(regexEmail.test(email.value)){
                errorEmail.innerHTML = '';
                email.style.borderColor ='green';
                errorEmail.removeAttribute('style','font-size:12px;');
                submit.removeAttribute('disabled');
            }else{
                errorEmail.innerHTML = 'Adresse Email invalide !';
                email.style.borderColor = 'red';
                errorEmail.setAttribute('style', 'font-size:12px;');
                submit.setAttribute('disabled', 'disabled');
            }
        });

        password.addEventListener('input', function(e){
            if(regexPassword.test(password.value)){
                errorPassword.innerHTML = '';
                password.style.borderColor ='green';
                errorPassword.removeAttribute('style','font-size:12px;');
                submit.removeAttribute('disabled');
            }else{
                errorPassword.innerHTML = 'Mot de passe invalide (8 caractères minimum, 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial)';
                password.style.borderColor = 'red';
                errorPassword.setAttribute('style', 'font-size:12px;');
                submit.setAttribute('disabled', 'disabled');
            }
        });

        submit.addEventListener('click', function(e){
            if(!regexEmail.test(email.value) || !regexPassword.test(password.value)){
                e.preventDefault();
                errorEmail.innerHTML = 'Rentrez une adresse Email valide !';
                email.style.borderColor = 'red';
                errorEmail.setAttribute('style', 'font-size:12px;');
            }
            if(!regexPassword.test(password.value) || password.value == ''){
                e.preventDefault();
                errorPassword.innerHTML = 'Rentrez un mot de passe valide !';
                password.style.borderColor = 'red';
                errorPassword.setAttribute('style', 'font-size:12px;');
            }
        });
    </script>

<?php require_once APPROOT.'/views/includes/footer.php'?>   