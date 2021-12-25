<?= $this->extend('layout/master_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/user.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="event" id="event">
    <a href="<?= base_url('tesadmin/dataevent') ?>"><button type="button" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Dashboard">DASHBOARD</button></a>
    <br><br><br>
    <div class="content-box">
        <div class="box">
            <div class="content-image">
                <img src="/image/a.jpg" alt="event image">
            </div>
            <div class="content-date">
                <h5 class="label-date">21</h5>
                <p class="label-month">Januari</p>
            </div>
            <div class="content-detail">
                <div class="title">
                    <h1>Perang Ketupat</h1>
                </div>
                <div class="location">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <h3>Sungailiat, Bangka</h3>
                </div>
            </div>
            <div class="konten">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam odio iusto dignissimos perferendis fuga? Facilis ex magni similique sint repellendus fuga maiores delectus nemo possimus eligendi. Consequatur, nam! Delectus, nostrum.</p>
            </div>
        </div>

        <div class="box">
            <div class="content-image">
                <img src="/image/a.jpg" alt="event image">
            </div>
            <div class="content-date">
                <h5 class="label-date">21</h5>
                <p class="label-month">Januari</p>
            </div>
            <div class="content-detail">
                <div class="title">
                    <h1>Perang Ketupat</h1>
                </div>
                <div class="location">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <h3>Sungailiat, Bangka</h3>
                </div>
            </div>
            <div class="konten">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam odio iusto dignissimos perferendis fuga? Facilis ex magni similique sint repellendus fuga maiores delectus nemo possimus eligendi. Consequatur, nam! Delectus, nostrum.</p>
            </div>
        </div>

        <div class="box">
            <div class="content-image">
                <img src="/image/a.jpg" alt="event image">
            </div>
            <div class="content-date">
                <h5 class="label-date">21</h5>
                <p class="label-month">Januari</p>
            </div>
            <div class="content-detail">
                <div class="title">
                    <h1>Perang Ketupat</h1>
                </div>
                <div class="location">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <h3>Sungailiat, Bangka</h3>
                </div>
            </div>
            <div class="konten">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam odio iusto dignissimos perferendis fuga? Facilis ex magni similique sint repellendus fuga maiores delectus nemo possimus eligendi. Consequatur, nam! Delectus, nostrum.</p>
            </div>
        </div>


        <div class="box">
            <div class="content-image">
                <img src="/image/a.jpg" alt="event image">
            </div>
            <div class="content-date">
                <h5 class="label-date">21</h5>
                <p class="label-month">Januari</p>
            </div>
            <div class="content-detail">
                <div class="title">
                    <h1>Perang Ketupat</h1>
                </div>
                <div class="location">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <h3>Sungailiat, Bangka</h3>
                </div>
            </div>
            <div class="konten">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam odio iusto dignissimos perferendis fuga? Facilis ex magni similique sint repellendus fuga maiores delectus nemo possimus eligendi. Consequatur, nam! Delectus, nostrum.</p>
            </div>
        </div>
    </div>


</section>
<?= $this->endSection() ?>


<?= $this->section('script') ?>

<script>

</script>

<?= $this->endSection() ?>