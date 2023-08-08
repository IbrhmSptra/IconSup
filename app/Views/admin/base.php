<!DOCTYPE html>

<head>
    <?= $this->include('/admin/head') ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- SIDEBAR -->
        <?= $this->include('/admin/sidebar') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TOPBAR -->
                <?= $this->include('/admin/topbar') ?>

                <!-- CONTENT -->
                <?= $this->renderSection('content') ?>
            </div>
            <!-- FOOTER -->
            <?= $this->include('/admin/footer') ?>
        </div>
    </div>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin untuk mengakhiri sesi dan keluar dari akun?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Of Logout Modal -->


    <!-- SCRIPTS -->
    <?= $this->include('/admin/script') ?>
</body>

</html>