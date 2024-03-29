<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
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
                <a class="nav-link" href="<?php echo URLROOT.'/employe/dashboard'?>" style="<?php if(strpos($_SERVER['REQUEST_URI'],'dashboard')){echo 'color:#4e73df; font-weight:bold;';} ?>">
                    <i class="fas fa-fw fa-tachometer-alt" style="<?php if(strpos($_SERVER['REQUEST_URI'],'dashboard')){echo 'color:#4e73df; font-weight:bold';} ?>"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active" style="<?php if(strpos($_SERVER['REQUEST_URI'],'taches')){echo 'background-color:white; border-radius:0 50px 50px 0;';} ?>">
                <a class="nav-link" href="<?php echo URLROOT.'/employe/taches'?>" style="<?php if(strpos($_SERVER['REQUEST_URI'],'taches')){echo 'color:#4e73df; font-weight:bold;';} ?>">
                    <i class="fa-fw fa-solid fa-list-check" style="<?php if(strpos($_SERVER['REQUEST_URI'],'taches')){echo 'color:#4e73df; font-weight:bold';} ?>"></i>
                    <span>Taches</span></a>
            </li>

            <li class="nav-item active" style="<?php if(strpos($_SERVER['REQUEST_URI'],'evenement')){echo 'background-color:white; border-radius:0 50px 50px 0;';} ?>">
                <a class="nav-link" href="<?php echo URLROOT.'/employe/evenement'?>" style="<?php if(strpos($_SERVER['REQUEST_URI'],'evenement')){echo 'color:#4e73df; font-weight:bold;';} ?>">
                    <i class="fa-solid fa-fw fa-calendar-check" style="<?php if(strpos($_SERVER['REQUEST_URI'],'evenement')){echo 'color:#4e73df; font-weight:bold;';} ?>"></i>
                    <span>Evénements</span></a>
            </li>
            

            <li class="nav-item active" style="<?php if(strpos($_SERVER['REQUEST_URI'],'conges')){echo 'background-color:white; border-radius:0 50px 50px 0;';} ?>">
                <a class="nav-link" href="<?php echo URLROOT.'/employe/conges'?>" style="<?php if(strpos($_SERVER['REQUEST_URI'],'conges')){echo 'color:#4e73df; font-weight:bold;';} ?>">
                <i class="fa-solid fa-fw fa-calendar-days" style="<?php if(strpos($_SERVER['REQUEST_URI'],'conges')){echo 'color:#4e73df; font-weight:bold;';} ?>"></i>
                    <span>Congés</span></a>
            </li>

            <li class="nav-item active" style="<?php if(strpos($_SERVER['REQUEST_URI'],'documents')){echo 'background-color:white; border-radius:0 50px 50px 0;';} ?>">
                <a class="nav-link" href="<?php echo URLROOT.'/employe/documents'?>" style="<?php if(strpos($_SERVER['REQUEST_URI'],'documents')){echo 'color:#4e73df; font-weight:bold;';} ?>">
                    <i class="fa-solid fa-fw fa-file-circle-plus" style="<?php if(strpos($_SERVER['REQUEST_URI'],'documents')){echo 'color:#4e73df; font-weight:bold;';} ?>"></i>
                    <span>Document administratif</span></a>
            </li>

            <li class="nav-item active <?php if(strpos($_SERVER['REQUEST_URI'],'messages')){echo 'd-inline-block';}else{echo 'd-none';} ?>" style="<?php if(strpos($_SERVER['REQUEST_URI'],'messages')){echo 'background-color:white; border-radius:0 50px 50px 0;';} ?>">
                <a class="nav-link" href="#" style="<?php if(strpos($_SERVER['REQUEST_URI'],'messages')){echo 'color:#4e73df; font-weight:bold;';} ?>">
                <i class="fa-solid fa-fw fa-gear" style="<?php if(strpos($_SERVER['REQUEST_URI'],'messages')){echo 'color:#4e73df; font-weight:bold;';} ?>"></i>
                    <span>Message</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="parametre">
                <i class="fa-solid fa-fw fa-gear"></i>
                    <span>Paramètre du compte</span></a>
            </li>

</ul>