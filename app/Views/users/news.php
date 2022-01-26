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

            <div class="image-container">
                <?php if ($headlines) : ?>
                    <a href="<?= base_url('news/show/' . $headlines->id) ?>">
                        <img src="<?= $headlines->newsImage()->original ?>" alt="headline news">
                        <div class="judul">
                            <h3><?= $headlines->title ?></h3>
                        </div>
                        <div class="detail">
                            <p><?= \CodeIgniter\I18n\Time::parse($headlines->created_at)->humanize() ?></p>
                        </div>
                    </a>
                <?php else : ?>
                    <div>
                        <h1>Tidak Ada Berita Terbaru</h1>
                    </div>
                <?php endif ?>
            </div>
        </div>

        <?php
        $session = session()->get('isAdmin');
        if ($session) : ?>
            <a href="<?= base_url('admin/news') ?>"><button type="button" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Dashboard">DASHBOARD</button></a>
        <?php endif ?>

        <div class="title">
            <p>terbaru</p>
            <hr>
        </div>
        <?php if (count($news)) : ?>
            <?php foreach ($news as $item) : ?>
                <div class="news-box">
                    <a href="<?= base_url('news/show/' . $item->id) ?>">
                        <div class="image-container">
                            <img src="<?= $item->newsImage()->original ?>" alt="news">
                            <div class="judul">
                                <h3><?= $item->title ?></h3>
                                <p><?= \CodeIgniter\I18n\Time::parse($item->created_at)->humanize() ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <hr>
            <?php endforeach ?>
        <?php endif ?>
        <?= $pager->links('news', 'pagination'); ?>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>