<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="edit-user" id="edit-user">


    <div class="content">
        <?= view('shared/flash_message') ?>

        <form action="<?= base_url('user/update/'.session()->get('id')) ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="print">
                <label for="name">Nama</label>
            </div>
            <div class="input">
                <input type="text" id="name" name="name" value="<?= session()->get('name') ?>">
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="email">Email</label>
            </div>
            <div class="input">
                <input type="text" id="email" name="email_address" value="<?= session()->get('email') ?>">
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="password">Password</label>
            </div>
            <div class="input">
                <input type="password" id="password" name="password">
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="password">Konfirmasi Password</label>
            </div>
            <div class="input">
                <input type="password" id="password" name="confirmPassword">
            </div>
        </div>
        <div class="row">
            <div class="print">
                <label for="image">Gambar</label>
            </div>
            <div class="input">
                <label for="image">Select a file:</label>
                <input type="file" id="image" name="picture"><br><br>
            </div>
        </div>
        <div class="row">
            <input type="submit" value="Simpan">
            <input type="reset" value="Batal">
        </div>
        </form>
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>


<!-- setup selector -->
<script>

</script>
<?= $this->endSection() ?>