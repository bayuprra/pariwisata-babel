<?= $this->extend('layout/master_layout') ?>

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
                    <a href="<?= base_url('news/readnews') ?>">
                        <h3>Jebakan Utang China Makan Korban, Negara Ini Hilang Bandara?</h3>
                    </a>
                </div>
                <div class="detail">
                    <p>4 jam yang lalu</p>
                </div>
            </div>
        </div>
        <div class="title">
            <p>terbaru</p>
            <hr>
        </div>
        <div class="news-box">
            <div class="image-container">
                <img src="/image/a.jpg" alt="news">
                <div class="judul">
                    <h3><a href="<?= base_url('news/readnews') ?>">Jebakan Utang China Makan Korban, Negara Ini Hilang Bandara?</a></h3>
                    <p>4 jam yang lalu</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="news-box">
            <div class="image-container">
                <img src="/image/a.jpg" alt="news">
                <div class="judul">
                    <h3><a href="<?= base_url('news/readnews') ?>">Jebakan Utang China Makan Korban, Negara Ini Hilang Bandara?</a></h3>
                    <p>4 jam yang lalu</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="news-box">
            <div class="image-container">
                <img src="/image/a.jpg" alt="news">
                <div class="judul">
                    <h3><a href="<?= base_url('news/readnews') ?>">Jebakan Utang China Makan Korban, Negara Ini Hilang Bandara?</a></h3>
                    <p>4 jam yang lalu</p>
                </div>
            </div>
        </div>
        <hr>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>