<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="create-news" id="create-news">


    <div class="content" action="">

        <form action="#">
            <div class="row">
                <div class="print">
                    <label for="title">Judul Berita</label>
                </div>
                <div class="input">
                    <input type="text" id="title" name="title" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="content">Isi Berita</label>
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

        </form>
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