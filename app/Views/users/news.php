<?= $this->extend('layout/master_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/main.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Berita Utama -->
<div class="headline-news">
    <div class="card bg-dark text-white">
        <img src="/image/b.jpg" class="img-fluid" alt="...">
        <div class="card-img-overlay">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text">Last updated 3 mins ago</p>
        </div>
    </div>
</div>
<!-- Berita -->
<div class="news">
    <!-- Card -->
    <div class="row row-cols-md-3 g-4">
        <?php foreach ($news as $n) : ?>
            <div class="col-4 mb-4 mt-4 ">
                <div class="card h-100 border-0">
                    <div class="view overlay">
                        <img class="card-img-top img-fluid" src="/image/q.jpg">
                    </div>
                    <div class="card-body">
                        <!--Title-->
                        <h4 class="card-title"><?= $n->title; ?></h4>
                        <!--Text-->
                        <p class="card-preview"><?= $n->preview; ?></p>
                        <p class="card-create"><?= $n->created_at; ?></p>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-success">Lanjutkan Membaca</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>