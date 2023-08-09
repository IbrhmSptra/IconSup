<?= $this->extend('/user/base') ?>
<?= $this->section('content') ?>
<!-- Start of Hero -->
<div class="container-hero">
  <div class="container">
    <div class="hero">
      <div class="row">
        <div class="col-md-6 col-12">
          <div class="heroteks text-md-start text-center">
            <h5>Halo, Selamat Datang
              <?php if (isset(user()->username)) {
                echo user()->username;
              } ?>
            </h5>
            <h1>
              Request bantuan dan <br />
              laporkan kendalamu
            </h1>
            <p>
              IconSup merupakan website pengaduan kendala dan bantuan
              terhadap 14 Layanan Icon+. Website ini merupakan project
              perkuliahan dan bukan merupakan website resmi
            </p>
            <?php if (!logged_in()) : ?>
              <div class="row text-start">
                <div class="col-6 col-md-5 col-lg-4 col-xl-3 text-md-start text-end">
                  <a href="/register"><button type="button" class="btn">Daftar</button></a>
                </div>
                <div class="col-6">
                  <a href="/login"><button type="button" class="btn ms-4">Masuk</button></a>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-md-6 col-12">
          <div class="heromodels d-flex justify-content-center" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
            <img class="models" src="/assets/User/img/Iconmodels.png" alt="Models3D" />
            <img class="checkcross" src="/assets/User/img/checkCross.png" alt="Models3D" />
            <img class="ui" src="/assets/User/img/UI.png" alt="Models3D" />
            <img class="help" src="/assets/User/img/Help.png" alt="Models3D" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- start of separator -->
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#d8eefe" fill-opacity="1" d="M0,64L30,80C60,96,120,128,180,122.7C240,117,300,75,360,80C420,85,480,139,540,176C600,213,660,235,720,213.3C780,192,840,128,900,133.3C960,139,1020,213,1080,208C1140,203,1200,117,1260,69.3C1320,21,1380,11,1410,5.3L1440,0L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
  </svg>
  <!-- end of separator -->
</div>
<!-- End Of Hero -->

<?php if (logged_in() && in_groups('User')) : ?>
  <!--Start of Report -->
  <?= $this->include('/user/content/report') ?>
  <!-- End of Report -->
<?php endif; ?>

<!-- start of Footer -->
<div class="footer bg-light d-flex justify-content-center align-items-center p-5">
  © Copyright by Ibrahim Saputra
</div>
<!-- end of Footer -->
<!-- end of Report -->
<?= $this->endSection() ?>