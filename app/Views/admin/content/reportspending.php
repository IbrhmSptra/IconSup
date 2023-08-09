<?= $this->extend('/admin/base') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reports Pending</h1>
    </div>

    <!-- Search -->
    <div class="row">
        <div class="col-4">
            <form action="/reportspending" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Keyword" name="search">
                    <button class="btn btn-outline-primary" type="submit" name="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Table -->
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th style="width:7%;" scope="col">User Id</th>
                <th scope="col">Username</th>
                <th scope="col">Pesan</th>
                <th scope="col">Service</th>
                <th scope="col">Urgency</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php $no = 1 + (5 * ($currentpage - 1)) ?>
            <?php foreach ($reports as $row) : ?>
                <tr class="text-center">
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $row->user_id; ?></td>
                    <td><?= $row->username; ?></td>
                    <td><?= $row->pesan; ?></td>
                    <td><?= $row->service_name; ?></td>
                    <td><?= $row->urgency; ?></td>
                    <td><?= $row->created_at; ?></td>
                    <td style="width:9%;">
                        <div class="btn-group " role="group " aria-label="Basic example ">
                            <form>
                                <a href="#" data-toggle="modal" data-id="<?= $row->id; ?>" data-target="#confirmresolve" class="btn btn-success text-white ">
                                    <img src="/assets/Admin/img/accept.png" style="width:16px; height:16;" alt="solved">
                                </a>
                                <a href="#" data-toggle="modal" data-id="<?= $row->id; ?>" data-target="#confirmdecline" class="btn btn-danger text-white">
                                    <img src="/assets/Admin/img/decline.png" style="width:16px; height:16;" alt="decline">
                                </a>
                            </form>
                        </div>
                    </td>
                </tr>


            <?php endforeach ?>
        </tbody>
    </table>

    <!-- Kalau total reports lebih dari 10 buatkan pagination -->
    <?php if ($totalReports > 10) : ?>
        <div class="pagercontainer">
            <div>
                <?= $pager ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- kalau reports kosong tampilkan pesan tidak ada reports -->
    <?php if ($reports == null) : ?>
        <div class="row mt-5">
            <div class="col text-center">
                <h3>Tidak Ada Report Yang Masuk</h3>
            </div>
        </div>
    <?php endif; ?>

    <!-- Confirm Resolve Modal-->
    <div class="modal fade" id="confirmresolve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Resolve</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Konfirmasi Ticket handling, Klik setuju untuk update status ticket menjadi Resolved..</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary">Setuju</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Of Resolve Modal -->

    <!-- Confirm decline Modal-->
    <div class="modal fade" id="confirmdecline" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Decline</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Konfirmasi Ticket handling, Klik setuju untuk update status ticket menjadi Declined..</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary">Setuju</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Of decline Modal -->






    <!-- Toast container Resolve-->
    <div style="position: absolute; bottom: 1rem; right: 1rem;">
        <div id="inforesolve" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-info text-white">
                <img class="badgetoast" src="/assets/Admin/img/accept.png" style="width:16px; height:16; " alt="solved">
                <strong class="mr-auto">Ticket Berhasil di <span class="spaninfo">Resolve</span></strong>
                <button class="ml-2 mb-1 btn-close btn-close-white" type="button" id="closeToastBtn" aria-label="Close"></button>
            </div>
            <div class="toast-body">Berhasil update status dari ticket On Progress menjadi ticket <span class="spaninfo">Resolve</span></div>
        </div>
    </div>

    <!-- Toast container Decline-->
    <div style="position: absolute; bottom: 1rem; right: 1rem;">
        <div id="infodecline" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-info text-white">
                <img class="badgetoast" src="/assets/Admin/img/accept.png" style="width:16px; height:16; " alt="solved">
                <strong class="mr-auto">Ticket Berhasil di <span class="spaninfo">Decline</span></strong>
                <button class="ml-2 mb-1 btn-close btn-close-white" type="button" id="closeToastBtn" aria-label="Close"></button>
            </div>
            <div class="toast-body">Berhasil update status dari ticket On Progress menjadi ticket <span class="spaninfo">Decline</span></div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>