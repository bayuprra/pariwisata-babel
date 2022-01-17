<?= $this->extend('layout/master_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/user.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="event" id="event">
    <?php
    $session = session()->get('id');
    if ($session == 1) : ?>
        <a href="<?= base_url('admin/event') ?>"><button type="button" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Dashboard">DASHBOARD</button></a>
    <?php endif; ?>
    <br><br><br>
    <div class="content-box">
        <?php foreach ($event as $item) : ?>
            <div class="box">
                <div class="content-image">
                    <img src="<?= $item->getPicture() ?>" alt="event image">
                </div>
                <div class="content-date">
                    <h5 class="label-date"><?= Carbon\Carbon::parse($item->date)->format('j') ?></h5>
                    <p class="label-month"><?= App\Helpers\DateTimeManager::eventMonth($item->date) ?></p>
                </div>
                <div class="content-detail">
                    <div class="title">
                        <h1><?= $item->name ?></h1>
                    </div>
                    <div class="location">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h3><?= $item->village ?>,<?= $item->sub_district ?>,<?= $item->district ?></h3>
                    </div>
                </div>
                <div class="konten">
                    <?= $item->content ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


</section>
<?= $this->endSection() ?>


<?= $this->section('script') ?>

<script>

</script>

<?= $this->endSection() ?>