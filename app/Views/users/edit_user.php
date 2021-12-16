<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="edit-user" id="edit-user">


    <div class="content" action="">

        <div class="row">
            <div class="print">
                <label for="name">Nama</label>
            </div>
            <div class="input">
                <input type="text" id="name" name="name" value="Bayu">
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="email">Email</label>
            </div>
            <div class="input">
                <input type="text" id="email" name="email" value="bbbb@gmail">
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="password">Password</label>
            </div>
            <div class="input">
                <input type="password" id="password" name="password" value="******">
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="password">Konfirmasi Password</label>
            </div>
            <div class="input">
                <input type="password" id="password" name="password" value="******">
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
            <input type="submit" value="Simpan">
            <input type="reset" value="Batal">
        </div>
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>


<!-- setup selector -->
<script>

</script>
<?= $this->endSection() ?>