<?= $this->extend('/admin/base') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User Management</h1>
    </div>

    <!-- Search -->
    <div class="row">
        <div class="col-4">
            <form action="/usermanagement" method="post">
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
                <th style="width:7%;" scope="col">Id</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Joined At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php $no = 1 + (20 * ($currentpage - 1)) ?>
            <?php foreach ($akun as $row) : ?>
                <tr class="text-center">
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $row->user_id; ?></td>
                    <td><?= $row->username; ?></td>
                    <td><?= $row->email; ?></td>
                    <td><?= $row->role; ?></td>
                    <td><?= $row->created_at; ?></td>
                    <td style="width:9%;">
                        <div class="btn-group " role="group " aria-label="Basic example ">
                            <form>
                                <?php if ($row->role == "User") : ?>
                                    <a href="#" data-toggle="modal" data-id="<?= $row->user_id; ?>" data-target="#confirmpromote" class="btn btn-success text-white ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
                                        </svg>
                                    </a>
                                <?php endif; ?>
                                <a href="#" data-toggle="modal" data-id="<?= $row->user_id; ?>" data-target="#confirmdelete" class="btn btn-danger text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg>
                                </a>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Kalau total reports lebih dari 10 buatkan pagination -->
    <?php if ($totalAkun > 20) : ?>
        <div class="pagercontainer">
            <div>
                <?= $pager ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- kalau reports kosong tampilkan pesan tidak ada reports -->
    <?php if ($akun == null) : ?>
        <div class="row mt-5">
            <div class="col text-center">
                <h3>Tidak Ada Akun</h3>
            </div>
        </div>
    <?php endif; ?>


    <!-- Confirm Promote Modal-->
    <div class="modal fade" id="confirmpromote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Promote User Menjadi Admin</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Konfirmasi Promote!! , Klik setuju menaikan role user ini menjadi admin dan dapat mengkases semua permission admin...</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary">Setuju</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Of Resolve Modal -->

    <!-- Confirm Delete Modal-->
    <div class="modal fade" id="confirmdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Delete Akun</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Konfirmasi Delete Akun!! , Klik setuju untuk delete akun secara permanent pada database...</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary">Setuju</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Of decline Modal -->

    <!-- Toast container Resolve-->
    <div style="position: absolute; top: 5%; right: 1rem;">
        <div id="infopromote" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-info text-white">
                <img class="badgetoast" src="/assets/Admin/img/accept.png" style="width:16px; height:16; " alt="solved">
                <strong class="mr-auto">Akun Berhasil di <span class="spaninfo">Promote</span></strong>
                <button class="ml-2 mb-1 btn-close btn-close-white" type="button" id="closeToastBtn" aria-label="Close"></button>
            </div>
            <div class="toast-body">Berhasil ubah role dari user menjadi Admin</div>
        </div>
    </div>

    <!-- Toast container Decline-->
    <div style="position: absolute; top: 5%; right: 1rem;">
        <div id="infodelete" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-info text-white">
                <img class="badgetoast" src="/assets/Admin/img/accept.png" style="width:16px; height:16; " alt="solved">
                <strong class="mr-auto">Akun Berhasil di <span class="spaninfo">Delete Permanent</span></strong>
                <button class="ml-2 mb-1 btn-close btn-close-white" type="button" id="closeToastBtn" aria-label="Close"></button>
            </div>
            <div class="toast-body">Berhasil menghapus akun secara permanent dari database</div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>