<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="create-event" id="create-event">


    <div class="content" action="">

        <div class="row">
            <div class="print">
                <label for="name">Nama Acara</label>
            </div>
            <div class="input">
                <input type="text" id="name" name="name" placeholder="Nama Acara">
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="location">Lokasi Acara</label>
            </div>
            <div class="input">
                <input type="text" id="location" name="location" placeholder="Lokasi Acara Event">
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="date">Tanggal</label>
            </div>
            <div class="input">
                <input type="text" id="date" name="date" placeholder="Tanggal Diadakan Acara">
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="content">Penjelasan</label>
            </div>
            <div class="input">
                <textarea name="content" class="content"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="image">Gambar</label>
            </div>
            <div class="input">
                <label for="image">Select a file:</label>
                <input type="file" id="image" name="image"><br><br>
            </div>
        </div>
        <div class="row">
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
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