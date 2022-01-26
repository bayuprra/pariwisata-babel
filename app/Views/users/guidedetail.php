<?= $this->extend('layout/master_layout') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/user.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="guidedetail" id="guidedetail">

    <div class="content">
        <?= view('shared/flash_message') ?>

    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
</script>
<?= $this->endSection() ?>