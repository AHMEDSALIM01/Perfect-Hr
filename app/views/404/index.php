<?php require_once APPROOT.'/views/includes/header.php'?>
<div class="container-fluid">

        <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
            <a href="<?php  echo URLROOT."/". $data['controller'];?>/dashboard">&larr; Back to Dashboard</a>
        </div>

    </div>
                <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php require_once APPROOT.'/views/includes/footer.php'?>