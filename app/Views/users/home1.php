<?= $this->extend('layout/master_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/user.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="home" id="home">

    <div class="content" action="">
        <h3>Cari tempat yang ingin kamu kunjungi</h3>
        <div class="inputBox">
            <input type="search" name="search" placeholder="cari" id="search">
        </div>
        <input type="submit" value="Cari lokasi" class="btn">

        <!-- rekomendation -->
        <div class="result">
            <div class="det">
                <a href="#" class="fa fa-star" aria-hidden="true"></a>
                <p>Rekomendasi</p>
            </div>
            <div class="recom-container">
                <div class="recomendation">
                    <a href="#" id="modaltrigger">Pantai Matras</a>
                    <p>kabupaten</p>
                    <div class="like">
                        <a href="#" class="fa fa-thumbs-up" aria-hidden="true"></a>
                        <p>disukai oleh 1023 orang</p>
                    </div>
                </div>
                <div class="recomendation">
                    <a href="#">Pantai Sungailiat</a>
                    <p>kabupaten</p>
                    <div class="like">
                        <a href="#" class="fa fa-thumbs-up" aria-hidden="true"></a>
                        <p>disukai oleh 1023 orang</p>
                    </div>
                </div>
                <div class="recomendation">
                    <a href="#">Pantai Koba</a>
                    <p>kabupaten</p>
                    <div class="like">
                        <a href="#" class="fa fa-thumbs-up" aria-hidden="true"></a>
                        <p>disukai oleh 1023 orang</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- search -->
        <div class="result">
            <div class="det">
                <a href="#" class="fa fa-search" aria-hidden="true"></a>
                <p>hasil</p>
            </div>
            <div class="recom-container">
                <div class="recomendation">
                    <a href="#" id="modaltrigger">Pantai Matras</a>
                    <p>kabupaten</p>
                    <div class="like">
                        <a href="#" class="fa fa-thumbs-up" aria-hidden="true"></a>
                        <p>disukai oleh 1023 orang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->


</section>

<?= $this->endSection() ?>


<?= $this->section('script') ?>

<?= $this->endSection() ?>