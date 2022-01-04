<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="edit-event" id="edit-event">


    <div class="content" action="">
        <?= view('shared/flash_message') ?>
        <form action="<?= base_url('event/' . $event->id) ?>" method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="print">
                    <label for="name">Nama Acara</label>
                </div>
                <div class="input">
                    <input type="text" id="name" name="name" value="<?= $event->name ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="location">Lokasi Acara</label>
                </div>
                <div class="input">
                    <input type="text" id="location" name="village" value="<?= $event->village ?>">
                    <input type="text" id="location" name="sub_district" value="<?= $event->sub_district ?>">
                    <input type="text" id="location" name="district" value="<?= $event->district ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="date">Tanggal</label>
                </div>
                <div class="input">
                    <input type="date" id="date" name="date" value="<?= Carbon\Carbon::parse($event->date)->format('Y-m-d') ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="content">Penjelasan</label>
                </div>
                <div class="input">
                    <textarea name="content" class="content"><?= $event->content ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="image">Gambar</label>
                </div>
                <div class="input">
                    <label for="picture">Select a file:</label>
                    <input type="file" id="picture" name="picture" value="<?= $event->picture ?>"><br><br>
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


<!-- panggil ckeditor.js -->
<script type="text/javascript" src="<?php echo base_url('ckeditor/ckeditor.js'); ?>"></script>
<!-- setup selector -->
<script>
    CKEDITOR.replace("content")
</script>
<?= $this->endSection() ?>