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
                <img src="/image/a.jpg" alt="headline news">
                <div class="judul">
                        <!-- TODO: Enable this when applying headline -->
                        <!-- <a href="--><?//= base_url('news/readnews') ?><!--">-->
                        <h3>Jebakan Utang China Makan Korban, Negara Ini Hilang Bandara?</h3>
                        <!-- </a> -->
                </div>
                <div class="detail">
                    <p>4 jam yang lalu</p>
                </div>
            </div>
        </div>

        <!--    TODO: Change this button style    -->
        <a href="<?= base_url('news/create') ?>"><button type="button" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Add News">CREATE</button></a>

        <div class="title">
            <p>terbaru</p>
            <hr>
        </div>

        <?php foreach ($news as $item) : ?>

            <div class="news-box">
                <div class="image-container">
                    <img src="<?= $item->news_images->original ?>" alt="news">
                    <div class="judul">
                        <h3><a href="<?= base_url('news/show/'.$item->id) ?>"><?= $item->title ?></a></h3>
                        <p>4 jam yang lalu</p>
                    </div>
                </div>
            </div>
            <hr>

        <?php endforeach ?>

    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>