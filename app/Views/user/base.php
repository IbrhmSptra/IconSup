<!DOCTYPE html>

<head>
    <?= $this->include('/user/head') ?>
</head>

<body>
    <?= $this->include('/user/navbar') ?>
    <!-- Body Content Include Footer-->
    <?= $this->renderSection('content') ?>

    <!-- Script -->
    <?= $this->include('/user/script') ?>
</body>

</html>