<!-- Start of Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/assets/User/img/Logo.svg" alt="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto gap-3">
                <a class="nav-link <?php if ($title == 'IconSup') {
                                        echo 'active';
                                    } ?>" aria-current="page" href="/">Home</a>
                <a class="nav-link" href="<?php if (!logged_in()) {
                                                echo '/login';
                                            } else {
                                                echo '/#report';
                                            } ?>">Report</a>
                <a class="nav-link <?php if ($title == 'IconSup-History') {
                                        echo 'active';
                                    } ?>" href="/history">History</a>
                <a class="nav-link <?php if ($title == 'IconSup-About') {
                                        echo 'active';
                                    } ?>" href="/about">About</a>
                <?php if (logged_in()) : ?>
                    <a class="nav-link" href="/logout">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<!-- End Of Navbar -->