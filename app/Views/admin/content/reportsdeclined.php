<?= $this->extend('/admin/base') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reports Declined</h1>
    </div>

    <!-- Search -->
    <div class="row">
        <div class="col-4">
            <form action="/reportsdeclined" method="post">
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
                <th scope="col">Declined On</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php $no = 1 + (20 * ($currentpage - 1)) ?>
            <?php foreach ($reports as $row) : ?>
                <tr class="text-center">
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $row->user_id; ?></td>
                    <td><?= $row->username; ?></td>
                    <td><?= $row->pesan; ?></td>
                    <td><?= $row->service_name; ?></td>
                    <td><?= $row->urgency; ?></td>
                    <td><?= date("d-m-Y H:i:s", strtotime($row->created_at)); ?></td>
                    <td><?php
                        if ($row->declined_on == NULL) {
                            echo "Dummy";
                        } else {
                            echo date("d-m-Y H:i:s", strtotime($row->declined_on));
                        }
                        ?>
                    </td>
                </tr>


            <?php endforeach ?>
        </tbody>
    </table>

    <!-- Kalau total reports lebih dari 10 buatkan pagination -->
    <?php if ($totalReports > 20) : ?>
        <div class="pagercontainer">
            <div>
                <?= $pager ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- kalau reports kosong tampilkan pesan tidak ada report -->
    <?php if ($reports == null) : ?>
        <div class="row mt-5">
            <div class="col text-center">
                <h3>Tidak Ada Report Yang Masuk</h3>
            </div>
        </div>
    <?php endif; ?>
</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>