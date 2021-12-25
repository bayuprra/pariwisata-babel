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
                <input type="text" id="created_at" value="<?= $news->created_at ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="title">Judul Berita</label>
            </div>
            <div class="input">
                <input type="text" id="title" name="title" value="<?= $news->title ?>">
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="content">Isi Berita</label>
            </div>
            <div class="input">
                <textarea name="content" class="content"><?= $news->content ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="image">Gambar</label>
            </div>
            <div class="input">
                <label for="image">Select a file:</label>
                <input type="file" id="image" name="image" value="<?= $news->created_at ?>"><br><br>
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