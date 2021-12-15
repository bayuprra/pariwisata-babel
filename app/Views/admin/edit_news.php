<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="add-news" id="add-news">


    <div class="content" action="">
        <div class="row">
            <div class="print">
                <label for="created_at">Tanggal Upload</label>
            </div>
            <div class="input">
                <input type="text" id="created_at" name="created_at" value="12 Januari 2020" disabled>
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="title">Judul Berita</label>
            </div>
            <div class="input">
                <input type="text" id="title" name="title" value="Judulnya Bla Bla">
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="content">Isi Berita</label>
            </div>
            <div class="input">
                <textarea name="content" class="content">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint quam iusto, ullam perferendis ducimus sequi tempore! Similique neque minima, ab velit harum, et repellendus sint quibusdam, nesciunt aperiam recusandae officia!</textarea>
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="image">Gambar</label>
            </div>
            <div class="input">
                <label for="image">Select a file:</label>
                <input type="file" id="image" name="image" value="# "><br><br>
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