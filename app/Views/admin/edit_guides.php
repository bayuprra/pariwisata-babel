<?php if (session()->get('dataGuide')) : ?>
    <?= $this->extend('layout/master_layout') ?>
<?php endif; ?>
<?php
$session = session()->get('id');
if ($session == 1) : ?>
    ?>
    <?= $this->extend('admin/admin_layout') ?>
    <style>
        .edit-guide {
            margin-top: 100px;
        }
    </style>
<?php endif; ?>
<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">

<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="edit-guide" id="edit-guide">


    <div class="content">
        <?= view('shared/flash_message') ?>
        <form action="<?= base_url('guide/' . $guide->id) ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="print">
                    <label for="name">Nama Lengkap</label>
                </div>
                <div class="input">
                    <input type="text" id="name" name="name" value="<?= $guide->name ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="phone">Nomor Telepon</label>
                </div>
                <div class="input">
                    <input type="text" id="phone" name="phone" value="<?= $guide->phone ?>">
                </div>
            </div>

            <div class="row">
                <div class="print">
                    <label for="address">Alamat</label>
                </div>
                <div class="input">
                    <input type="text" id="address" name="address" value="<?= $guide->address ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="facebook">Akun Facebook</label>
                </div>
                <div class="input">
                    <input type="text" id="facebook" name="facebook" value="<?= $guide->facebook ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="instagram">Akun Instagram</label>
                </div>
                <div class="input">
                    <input type="text" id="instagram" name="instagram" value="<?= $guide->instagram ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="twitter">Akun Twitter</label>
                </div>
                <div class="input">
                    <input type="text" id="twitter" name="twitter" value="<?= $guide->twitter ?>">
                </div>
            </div>

            <div class="row">
                <div class="print">
                    <label for="identity_picture">Foto Diri</label>
                </div>
                <div class="input">
                    <label for="identity_picture">Select a file:</label>
                    <input type="file" id="identity_picture" name="identity_picture"><br><br>
                </div>
            </div>

            <div class="row">

                <input type="submit" value="Update">

                <input type="reset" value="Cancel">
            </div>
        </form>
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    let gender = document.getElementById('gender').getAttribute("data-gender")
    document.getElementById('gender').value = gender;
</script>
<?= $this->endSection() ?>