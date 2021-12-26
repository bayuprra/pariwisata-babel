<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<?= view('shared/flash_message') ?>

<section class="add-news" id="add-news">

    <div class="content">

        <form action="<?= base_url('news/' . $news->id) ?>" method="POST" enctype="multipart/form-data">
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
                    <label for="category">Kategori Berita</label>
                </div>
                <div class="input">
                    <select id="category" data-category="<?= $news->category ?>" name="category" required>
                        <option value="general">General</option>
                        <option value="headline">Headline</option>
                    </select>
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
                    <input type="file" id="image" name="image" value="<?= $news->newsImage()->original ?>"><br><br>
                </div>
            </div>


            <div class="row">
                <input type="submit" value="Update">

                <input type="reset" value="Batal">
            </div>
        </form>

    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
    let category = document.getElementById('category').getAttribute("data-category")
    document.getElementById('category').value = category;
</script>
<!-- panggil ckeditor.js -->
<script type="text/javascript" src="<?php echo base_url('ckeditor/ckeditor.js'); ?>"></script>
<!-- setup selector -->
<script>
    CKEDITOR.replace("content")
</script>
<?= $this->endSection() ?>