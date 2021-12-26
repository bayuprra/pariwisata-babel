<?= $this->extend('layout/master_layout') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/user.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="readnews" id="readnews">
    <div class="read">
        <h3><?= $news->title ?></h3>
        <p><?= $news->created_at ?></p>
        <img src="<?= $news->newsImage()->medium ?>" alt="news">
        <div class="content">
            <?= $news->content ?>
        </div>
    </div>
    <div class="recom">
        <p>terbaru</p>
        <hr>
        <div class="terbaru">
            <img src="/image/a.jpg" alt="news">
            <a href="#">
                <h3>Jebakan Utang China Makan Korban, Negara Ini Hilang Bandara?</h3>
            </a>
        </div>
        <hr>
        <div class="terbaru">
            <img src="/image/a.jpg" alt="news">
            <a href="#">
                <h3>Jebakan Utang China Makan Korban, Negara Ini Hilang Bandara?</h3>
            </a>
        </div>
        <hr>
        <div class="terbaru">
            <img src="/image/a.jpg" alt="news">
            <a href="#">
                <h3>Jebakan Utang China Makan Korban, Negara Ini Hilang Bandara?</h3>
            </a>
        </div>
        <hr>
    </div>

</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
</script>
<?= $this->endSection() ?>