<?= $this->extend('/admin/base') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $header ?></h1>
    </div>

    <form action="<?php if (isset($id)) {
                        echo "/update/" . $id;
                    } else {
                        echo "/create";
                    } ?>" method="post">
        <?php if (isset($id)) : ?>
            <div class="mb-3">
                <fieldset disabled>
                    <label for="disabledTextInput" class="form-label">Id Service</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="<?= (isset($id)) ? $id : "" ?>">
                </fieldset>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="inputservice" class="form-label">Service Name</label>
            <input type="text" class="form-control" id="inputservice" name="servicename" value="<?= (isset($service['name'])) ? $service['name'] : "" ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>