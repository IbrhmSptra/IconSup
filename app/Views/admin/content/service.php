<?= $this->extend('/admin/base') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Service</h1>
    </div>

    <!-- Search -->
    <div class="row justify-content-start">
        <div class="col-4">
            <form action="/service" method="post">
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
        <div class="col-5 text-end text-primary ">
            <a href="/servicecreate" class="text-decoration-none">
                <h4>Add Service <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-circle text-primary" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg></h4>

            </a>
        </div>
    </div>

    <!-- Table -->
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Service</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php $no = 1 + (20 * ($currentpage - 1)) ?>
            <?php foreach ($service as $row) : ?>
                <tr class="text-center">
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $row->name; ?></td>
                    <td style="width:9%;">
                        <div class="btn-group " role="group " aria-label="Basic example ">
                            <form>
                                <a href="/serviceedit/<?= $row->id; ?>" class="btn btn-success text-white ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                                <a href="#" data-toggle="modal" data-id="<?= $row->id; ?>" data-target="#confirmdeleteservice" class="btn btn-danger text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                    </svg>
                                </a>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

    <!-- Kalau total service lebih dari 10 buatkan pagination -->
    <?php if ($totalservice > 20) : ?>
        <div class="pagercontainer">
            <div>
                <?= $pager ?>
            </div>
        </div>
    <?php endif; ?>


    <!-- kalau service kosong tampilkan pesan tidak ada reports -->
    <?php if ($service == null) : ?>
        <div class="row mt-5">
            <div class="col text-center">
                <h3>Tidak Ada Report Yang Masuk</h3>
            </div>
        </div>
    <?php endif; ?>



    <!-- Confirm delete Modal-->
    <div class="modal fade" id="confirmdeleteservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Konfirmasi hapus service, Klik setuju untuk menghapus service dari database..</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary">Setuju</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Of delete Modal -->



    <!-- Toast container edit service-->
    <div style="position: absolute; top: 5%; right: 1rem;">
        <div id="infoupdate" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-info text-white">
                <img class="badgetoast" src="/assets/Admin/img/accept.png" style="width:16px; height:16; " alt="solved">
                <strong class="mr-auto">Service berhasil di ubah</strong>
                <button class="ml-2 mb-1 btn-close btn-close-white" type="button" id="closeToastBtn" aria-label="Close"></button>
            </div>
            <div class="toast-body">Berhasil mengubah nama service pada database </div>
        </div>
    </div>

    <!-- Toast container create service-->
    <div style="position: absolute; top: 5%; right: 1rem;">
        <div id="infocreate" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-info text-white">
                <img class="badgetoast" src="/assets/Admin/img/accept.png" style="width:16px; height:16; " alt="solved">
                <strong class="mr-auto">Service baru berhasil ditambahkan</strong>
                <button class="ml-2 mb-1 btn-close btn-close-white" type="button" id="closeToastBtn" aria-label="Close"></button>
            </div>
            <div class="toast-body">Berhasil menambahkan service baru ke database </div>
        </div>
    </div>

    <!-- Toast container delete service-->
    <div style="position: absolute; top: 5%; right: 1rem;">
        <div id="infodeleteservice" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-info text-white">
                <img class="badgetoast" src="/assets/Admin/img/accept.png" style="width:16px; height:16; " alt="solved">
                <strong class="mr-auto">Service berhasil di hapus</strong>
                <button class="ml-2 mb-1 btn-close btn-close-white" type="button" id="closeToastBtn" aria-label="Close"></button>
            </div>
            <div class="toast-body">Berhasil menghapus service dari database</div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>