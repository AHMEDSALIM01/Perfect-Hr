<!-- <?php 
    // session_start();
    // if(isset($_SESSION['role']) && $_SESSION['role'] =="admin"){
    //     header('Location:'.URLROOT.'/admin/dashboard');
    // }
?> -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo URLROOT.'/'?>admin/dashboard">
                <div class="sidebar-brand-icon">
                <img src="<?php echo URLROOT ?>/img/Perfecthr.png" alt="" style="width:40px;">
                </div>
                <div class="sidebar-brand-text mx-3"><img src="<?php echo URLROOT ?>/img/PERFECTHRs.png" alt="" style="width:100px;"></div>
            </a>
            

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active" style="<?php if(strpos($_SERVER['REQUEST_URI'],'dashboard')){echo 'background-color:white; border-radius:0 50px 50px 0;';} ?>">
                <a class="nav-link" href="<?php echo URLROOT.'/'?>admin/dashboard" style="<?php if(strpos($_SERVER['REQUEST_URI'],'dashboard')){echo 'color:#4e73df; font-weight:bold;';} ?>">
                    <i class="fas fa-fw fa-tachometer-alt" style="<?php if(strpos($_SERVER['REQUEST_URI'],'dashboard')){echo 'color:#4e73df; font-weight:bold';} ?>"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active" style="<?php if(strpos($_SERVER['REQUEST_URI'],'taches')){echo 'background-color:white; border-radius:0 50px 50px 0;';} ?>">
                <a class="nav-link" href="<?php echo URLROOT.'/'?>admin/taches" style="<?php if(strpos($_SERVER['REQUEST_URI'],'taches')){echo 'color:#4e73df; font-weight:bold;';} ?>">
                    <i class="fa-fw fa-solid fa-list-check" style="<?php if(strpos($_SERVER['REQUEST_URI'],'taches')){echo 'color:#4e73df; font-weight:bold';} ?>"></i>
                    <span>Taches</span></a>
            </li>

            <li class="nav-item active" style="<?php if(strpos($_SERVER['REQUEST_URI'],'evenement')){echo 'background-color:white; border-radius:0 50px 50px 0;';} ?>">
                <a class="nav-link" href="<?php echo URLROOT.'/'?>admin/evenement" style="<?php if(strpos($_SERVER['REQUEST_URI'],'evenement')){echo 'color:#4e73df; font-weight:bold;';} ?>">
                    <i class="fa-solid fa-fw fa-calendar-check" style="<?php if(strpos($_SERVER['REQUEST_URI'],'evenement')){echo 'color:#4e73df; font-weight:bold;';} ?>"></i>
                    <span>Evénements</span></a>
            </li>
            
            <li class="nav-item active" style="<?php if(strpos($_SERVER['REQUEST_URI'],'employe')){echo 'background-color:white; border-radius:0 50px 50px 0;';} ?>">
                <a class="nav-link" href="<?php echo URLROOT.'/'?>admin/employe" style="<?php if(strpos($_SERVER['REQUEST_URI'],'employe')){echo 'color:#4e73df; font-weight:bold;';} ?>">
                    <i class="fa-solid fa-fw fa-users" style="<?php if(strpos($_SERVER['REQUEST_URI'],'employe')){echo 'color:#4e73df; font-weight:bold;';} ?>"></i>
                    <span>Employés</span></a>
            </li>

            <li class="nav-item active" style="<?php if(strpos($_SERVER['REQUEST_URI'],'comptes')){echo 'background-color:white; border-radius:0 50px 50px 0;';} ?>">
                <a class="nav-link" href="<?php echo URLROOT.'/'?>admin/comptes" style="<?php if(strpos($_SERVER['REQUEST_URI'],'comptes')){echo 'color:#4e73df; font-weight:bold;';} ?>">
                    <i class="fa-solid fa-fw fa-user-check" style="<?php if(strpos($_SERVER['REQUEST_URI'],'comptes')){echo 'color:#4e73df; font-weight:bold;';} ?>"></i>
                    <span>Admin</span></a>
            </li>

            <li class="nav-item active" style="<?php if(strpos($_SERVER['REQUEST_URI'],'conges')){echo 'background-color:white; border-radius:0 50px 50px 0;';} ?>">
                <a class="nav-link" href="<?php echo URLROOT.'/'?>admin/conges" style="<?php if(strpos($_SERVER['REQUEST_URI'],'conges')){echo 'color:#4e73df; font-weight:bold;';} ?>">
                <i class="fa-solid fa-fw fa-calendar-days" style="<?php if(strpos($_SERVER['REQUEST_URI'],'conges')){echo 'color:#4e73df; font-weight:bold;';} ?>"></i>
                    <span>Congés</span></a>
            </li>

            <li class="nav-item active" style="<?php if(strpos($_SERVER['REQUEST_URI'],'documents')){echo 'background-color:white; border-radius:0 50px 50px 0;';} ?>">
                <a class="nav-link" href="<?php echo URLROOT.'/'?>admin/documents" style="<?php if(strpos($_SERVER['REQUEST_URI'],'documents')){echo 'color:#4e73df; font-weight:bold;';} ?>">
                    <i class="fa-solid fa-fw fa-file-circle-plus" style="<?php if(strpos($_SERVER['REQUEST_URI'],'documents')){echo 'color:#4e73df; font-weight:bold;';} ?>"></i>
                    <span>Document administratif</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo URLROOT.'/'?>admin/parametre">
                <i class="fa-solid fa-fw fa-gear"></i>
                    <span>Paramètre du compte</span></a>
            </li>

</ul>