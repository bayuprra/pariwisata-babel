<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<?= view('shared/flash_message') ?>

<section class="create-event" id="create-event">


    <div class="content" action="">

        <form action="<?= base_url('event') ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="print">
                    <label for="name">Nama Acara</label>
                </div>
                <div class="input">
                    <input type="text" id="name" name="name" placeholder="" value="<?= !empty(session()->getFlashdata('errors')) ? old('name') : '' ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="location">Lokasi Acara</label>
                </div>
                <div class="input">
                    <input type="text" id="district" name="village" placeholder="Desa/kelurahan" value="<?= !empty(session()->getFlashdata('errors')) ? old('village') : '' ?>">
                    <input type="text" id="district" name="sub_district" placeholder="Kecamatan" value="<?= !empty(session()->getFlashdata('errors')) ? old('sub_district') : '' ?>">
                    <input type="text" id="district" name="district" placeholder="Kabupaten" value="<?= !empty(session()->getFlashdata('errors')) ? old('district') : '' ?>">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="print">
                    <label for="date">Tanggal</label>
                </div>
                <div class="input">
                    <input type="date" id="date" name="date" placeholder="Tanggal Diadakan Acara">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="content">Penjelasan</label>
                </div>
                <div class="input">
                    <textarea name="content" class="content"><?= !empty(session()->getFlashdata('errors')) ? old('content') : '' ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="picture">Gambar</label>
                </div>
                <div class="input">
                    <label for="picture">Select a file:</label>
                    <input type="file" id="picture" name="picture"><br><br>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Submit">
                <a href="<?= base_url('admin/event') ?>">
                    <input type="reset" value="Kembali">
                </a>
            </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>


<!-- panggil ckeditor.js -->
<script type="text/javascript" src="<?php echo base_url('ckeditor/ckeditor.js'); ?>"></script>
<!-- setup selector -->
<script>
    CKEDITOR.replace("content")
</script>
<?= $this->endSection() ?>