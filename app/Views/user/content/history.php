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
                        <!-- Accordion Item-->
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#1" aria-expanded="false" aria-controls="1">
                                    <div class="header-content">Airlis</div>
                                    <div class="loadingContainer">
                                        <div class="ball1"></div>
                                        <div class="ball2"></div>
                                        <div class="ball3"></div>
                                    </div>
                                </button>
                            </div>
                            <div id="1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row justify-content-center mt-4">
                                        <div class="col-6 text-center">
                                            Ada Kendala pada jaringan AirLis databasenya ada
                                            beberapa yang tidak bisa di akses
                                        </div>
                                        <div class="row justify-content-between align-items-center mt-4">
                                            <div class="col-4">
                                                <div class="row">
                                                    <div class="col text-start">Report On</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-start">23/6/2022</div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="row">
                                                    <div class="col text-end">On Progress..</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Of Accordion Item -->
                        <!-- Accordion Item-->
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#2" aria-expanded="true" aria-controls="2">
                                    <div class="header-content">LSP+</div>
                                    <div class="status">
                                        <img src="/assets/img/remove.svg" alt="" />
                                    </div>
                                </button>
                            </div>
                            <div id="2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row justify-content-center mt-4">
                                        <div class="col-6 text-center">
                                            Ada Kendala pada jaringan AirLis databasenya ada
                                            beberapa yang tidak bisa di akses
                                        </div>
                                        <div class="row justify-content-between align-items-center mt-4">
                                            <div class="col-4">
                                                <div class="row">
                                                    <div class="col text-start">Report On</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-start">23/6/2022</div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="row">
                                                    <div class="col text-end">Declined On</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-end">24/6/2023</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Of Accordion Item -->
                        <!-- Accordion Item-->
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#3" aria-expanded="true" aria-controls="3">
                                    <div class="header-content">PLN Marketplace</div>
                                    <div class="status">
                                        <img src="/assets/img/checklist.svg" alt="" />
                                    </div>
                                </button>
                            </div>
                            <div id="3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row justify-content-center mt-4">
                                        <div class="col-6 text-center">
                                            Ada Kendala pada jaringan AirLis databasenya ada
                                            beberapa yang tidak bisa di akses
                                        </div>
                                        <div class="row justify-content-between align-items-center mt-4">
                                            <div class="col-4">
                                                <div class="row">
                                                    <div class="col text-start">Report On</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-start">23/6/2022</div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="row">
                                                    <div class="col text-end">Resolved On</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-end">24/6/2023</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Of Accordion Item -->
                    </div>
                </div>
            </div>
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