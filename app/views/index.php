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
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." value = "<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email'];?>">
                                                <span class="text-danger"><?php if(isset($data['error_email'])) echo $data['error_email']; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Password">
                                                <span class="text-danger"><?php if(isset($data['error_password'])) echo $data['error_password'];?></span>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="checkbox" value=1 class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

<?php require_once APPROOT.'/views/includes/footer.php'?>   