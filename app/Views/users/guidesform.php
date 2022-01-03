<?= $this->extend('layout/master_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="partner" id="partner">


    <div class="content">
        <?= view('shared/flash_message') ?>
        <form action="<?= base_url('guide') ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="print">
                    <label for="name">Nama Lengkap</label>
                </div>
                <div class="input">
                    <input type="text" id="name" name="name" value="<?= !empty(session()->getFlashdata('errors')) ? old('name') : '' ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="phone">Nomor Telepon</label>
                </div>
                <div class="input">
                    <input type="text" id="phone" name="phone" value="<?= !empty(session()->getFlashdata('errors')) ? old('phone') : '' ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="gender">Jenis Kelamin</label>
                </div>
                <div class="input">
                    <select id="gender" data-gender="<?= !empty(session()->getFlashdata('errors')) ? old('gender') : '' ?>" name="gender" required>
                        <option selected disabled>Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki - Laki</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="address">Alamat</label>
                </div>
                <div class="input">
                    <input type="text" id="address" name="address" value="<?= !empty(session()->getFlashdata('errors')) ? old('address') : '' ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="age">Umur</label>
                </div>
                <div class="input">
                    <input type="text" id="age" name="age" value="<?= !empty(session()->getFlashdata('errors')) ? old('age') : '' ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="religion">Agama</label>
                </div>
                <div class="input">
                    <input type="text" id="religion" name="religion" <?= !empty(session()->getFlashdata('errors')) ? old('religion') : '' ?>>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="experience">Pengalaman</label>
                </div>
                <div class="input">
                    <textarea id="experience" name="experience"><?= !empty(session()->getFlashdata('errors')) ? old('experience') : '' ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="study">Sekolah</label>
                </div>
                <div class="input">
                    <input type="text" id="study" name="study" value="<?= !empty(session()->getFlashdata('errors')) ? old('study') : '' ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="email">E-mail</label>
                </div>
                <div class="input">
                    <input type="email" id="email" name="email" value="<?= session()->get('email') ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="facebook">Akun Facebook</label>
                </div>
                <div class="input">
                    <input type="text" id="facebook" name="facebook" value="<?= !empty(session()->getFlashdata('errors')) ? old('facebook') : '' ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="instagram">Akun Instagram</label>
                </div>
                <div class="input">
                    <input type="text" id="instagram" name="instagram" value="<?= !empty(session()->getFlashdata('errors')) ? old('instagram') : '' ?>">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="twitter">Akun Twitter</label>
                </div>
                <div class="input">
                    <input type="text" id="twitter" name="twitter" value="<?= !empty(session()->getFlashdata('errors')) ? old('twitter') : '' ?>">
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
                <div class="print">
                    <label for="video">Video Perkenalan Diri</label>
                </div>
                <div class="input">
                    <label for="video">Select a file:</label>
                    <input type="file" id="video" name="video"><br><br>
                </div>
            </div>

            <div class="row">
                <input type="submit" value="Daftar">


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