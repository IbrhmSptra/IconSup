<?= $this->extend('/user/base') ?>
<?= $this->section('content') ?>
<!-- Start of History -->
<div class="container-history" data-aos="fade-up" data-aos-duration="1000">
    <div class="pb-5">
        <div class="container">
            <div class="row justify-content-center mb-3 pt-2">
                <div class="col-10 text-center mb-5">
                    <h1 class="mt-5">History</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-7 text-center">
                    <div class="accordions">
                        <?php $i = 1 ?>
                        <?php foreach ($history as $row) : ?>
                            <!-- Accordion Item-->
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $i ?>" aria-expanded="false" aria-controls="<?= $i ?>">
                                        <div class="header-content"><?= $row->service_name; ?></div>
                                        <?php if ($row->status == null) : ?>
                                            <div class="loadingContainer">
                                                <div class="ball1"></div>
                                                <div class="ball2"></div>
                                                <div class="ball3"></div>
                                            </div>
                                        <?php elseif ($row->status == "Solved") : ?>
                                            <div class="status">
                                                <img src="/assets/User/img/checklist.svg" alt="" />
                                            </div>
                                        <?php else : ?>
                                            <div class="status">
                                                <img src="/assets/User/img/remove.svg" alt="" />
                                            </div>
                                        <?php endif; ?>
                                    </button>
                                </div>
                                <div id="<?= $i++ ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row justify-content-center mt-4">
                                            <div class="col-6 text-center">
                                                <?= $row->pesan; ?>
                                            </div>
                                            <div class="row justify-content-between align-items-center mt-4">
                                                <div class="col-4">
                                                    <div class="row">
                                                        <div class="col text-start">Report On</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col text-start"><?= $row->created_at; ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="row">
                                                        <div class="col text-end">
                                                            <?php if ($row->status == null) {
                                                                echo "On Progress..";
                                                            } elseif ($row->status == "Solved") {
                                                                echo "Solved On";
                                                            } else {
                                                                echo "Declined On";
                                                            } ?>
                                                        </div>
                                                    </div>
                                                    <?php if ($row->status != null) : ?>
                                                        <div class="row">
                                                            <div class="col text-end"><?= $row->status_date; ?></div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Of Accordion Item -->
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- kalau data History lebih dari 5 buatkan pagination -->
            <?php if ($totalHistory > 5) : ?>
                <div class="pagercontainer">
                    <div>
                        <?= $pager ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- kalau data History kosong tampilkan pesan tidak ada history -->
            <?php if ($history == null) : ?>
                <div class="row mt-4">
                    <div class="col text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="currentColor" class="bi bi-envelope-dash" viewBox="0 0 16 16">
                            <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                            <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-5.5 0a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Z" />
                        </svg>
                        <h3 class="pesanhistory">Tidak ada history report</h3>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- start of Footer -->
    <div class="footer bg-light d-flex justify-content-center align-items-center p-5 mt-5">
        © Copyright by Ibrahim Saputra
    </div>
    <!-- end of Footer -->
</div>

<!-- End Of History -->
<?= $this->endSection() ?>