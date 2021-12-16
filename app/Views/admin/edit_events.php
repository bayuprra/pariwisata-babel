<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="edit-event" id="edit-event">


    <div class="content" action="">

        <div class="row">
            <div class="print">
                <label for="name">Nama Acara</label>
            </div>
            <div class="input">
                <input type="text" id="name" name="name" value="Nama Acara">
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="location">Lokasi Acara</label>
            </div>
            <div class="input">
                <input type="text" id="location" name="location" value="Sungailiat">
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="date">Tanggal</label>
            </div>
            <div class="input">
                <input type="date" id="date" name="date" value="21/07/1990">
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="content">Penjelasan</label>
            </div>
            <div class="input">
                <textarea name="content" class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda quam totam sed nemo! Officiis modi exercitationem soluta dolorem molestias ullam error repudiandae animi, ad harum! Aliquid quo provident saepe porro!</textarea>
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
            <input type="submit" value="Update">
            <input type="reset" value="Batal">
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