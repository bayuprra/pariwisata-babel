<?= $this->extend('layout/master_layout') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/user.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="news" id="news">
    <div class="news-container">
        <div class="headline-box">
            <?php foreach ($headlines as $item) : ?>
                <div class="image-container">
                    <a href="<?= base_url('news/show/' . $item->id) ?>">
                        <img src="<?= $item->newsImage()->original ?>" alt="headline news">
                        <div class="judul">
                            <h3><?= $item->title ?></h3>
                        </div>
                        <div class="detail">
                            <p><?= Carbon\Carbon::parse($item->created_at)->diffForHumans() ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>

        <?php
        $session = session()->get('email');  //masih testing
        if ($session) : ?>
            <a href="<?= base_url('admin/news') ?>"><button type="button" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Dashboard">DASHBOARD</button></a>
        <?php endif ?>

        <div class="title">
            <p>terbaru</p>
            <hr>
        </div>
        <?php foreach ($news as $item) : ?>
            <div class="news-box">
                <a href="<?= base_url('news/show/' . $item->id) ?>">
                    <div class="image-container">
                        <img src="<?= $item->newsImage()->original ?>" alt="news">
                        <div class="judul">
                            <h3><?= $item->title ?></h3>
                            <p><?= Carbon\Carbon::parse($item->created_at)->diffForHumans() ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <hr>
        <?php endforeach ?>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>