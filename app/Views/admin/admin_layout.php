<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url() ?>/main/admin/template.css">
    <!-- css page -->
    <?= $this->renderSection('style') ?>
    <!--  dynamic title  -->
    <title><?= $this->renderSection('title') ?></title>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


    <?= $this->include('admin/admin_navbar'); ?>

    <?= $this->renderSection('content') ?>
    <?= $this->renderSection('script') ?>
</body>

</html>