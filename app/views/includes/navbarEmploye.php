<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?php echo $data['count']?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in overflow-auto scrollbar-dusty-grass"
                                aria-labelledby="alertsDropdown" style="max-height:300px;">
                                <h6 class="dropdown-header sticky-top">
                                    Notifications
                                </h6>
                                <?php if(!empty($data['notifications'])){
                                foreach($data['notifications'] as $notification){
                                ?>
                                <a class="dropdown-item d-flex align-items-center " style="<?php if($notification->status=='non lus'){echo '';}else{echo 'background-color:#f5f6f9';}?>" href="<?php if($notification->status=='non lus'){echo URLROOT.'/employe/readNotification/'.$notification->id_notification;}else{echo '#';}?>">
                                    <div class="mr-3">
                                        <div class="icon-circle  <?php if($notification->type=="tache"){echo "bg-primary";}elseif($notification->type=="conge"){echo "bg-danger";}else{echo "bg-warning";}?>">
                                        <i class="<?php if($notification->type=="tache"){echo "fa-solid fa-lg fa-list-check text-white";}elseif($notification->type=="conge"){echo "fa-solid fa-lg fa-calendar-check text-white";}else{echo "fa-solid fa-lg fa-file-lines text-white";} ?> "></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?php echo $notification->date_notification ;?></div>
                                        <span class="font-weight-bold"><?php echo $notification->designation ;?></span>
                                    </div>
                                </a>
                                <?php } }else{
                            
                                ?>
                                <h6 class="text-secondary text-center">Aucunne Notification existée</h3>
                                <?php } ?>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"><?php echo $data['countm']?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in overflow-auto scrollbar-dusty-grass"
                                aria-labelledby="messagesDropdown" >
                                <span class="dropdown-header py-0 d-flex align-items-center justify-content-between">
                                    <h6 class="dropdown-header" style="max-height:300px;">
                                        Messages
                                    </h6>
                                    <a style="cursor:pointer;" href="<?php echo URLROOT.'/employe/newMessage'?>" id="newMessage"><i class="fa-solid fa-plus fa-lg fa-fw text-white"></i></a>
                                </span>
                                <?php if(!empty($data['messages'])){
                                foreach($data['messages'] as $message){
                                ?>
                                <a class="dropdown-item d-flex align-items-center" style="<?php if($message->status_message=='non lus'){echo '';}else{echo 'background-color:#f5f6f9';}?>" href="<?php echo URLROOT.'/employe/readMessage/'.$message->id_message ?>">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="<?php echo URLROOT.'/public/img/'.$message->image?>" alt="">
                                            
                                        <?php if($message->status_message=='non lus'){?>
                                        <div class="status-indicator bg-success"></div>
                                        <?php }?>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate"><?php echo $message->message_admin?></div>
                                        <div class="small text-gray-500 d-flex justify-content-between align-items-center">
                                            <div>
                                                <?php echo $message->nom_complet?>
                                            </div>
                                            <div>
                                                <?php echo $message->date_admin?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php } }else{
                            
                                ?>
                                <h6 class="text-secondary text-center" style ="">Aucunne Message existé</h3>
                                <?php } ?>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="d-flex flex-column align-items-center">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nom_complet']?></span>
                                </div>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo URLROOT.'/public/img/'.$_SESSION['image']?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mon Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo URLROOT."/" ?>LogoutController/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Se déconnecter
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>