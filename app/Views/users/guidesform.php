<?= $this->extend('layout/master_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="partner" id="partner">


    <div class="content" action="">

        <form action="#">
            <div class="row">
                <div class="print">
                    <label for="name">Nama Lengkap</label>
                </div>
                <div class="input">
                    <input type="text" id="name" name="name" placeholder="Nama Kamu..">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="phone">Nomor Telepon</label>
                </div>
                <div class="input">
                    <input type="text" id="phone" name="phone" placeholder="Nomor Telepon Aktif">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="gender">Jenis Kelamin</label>
                </div>
                <div class="input">
                    <select id="gender" name="gender">
                        <option selected>Jenis Kelamin</option>
                        <option value="male">Laki - Laki</option>
                        <option value="female">Wanita</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="address">Alamat</label>
                </div>
                <div class="input">
                    <input type="text" id="address" name="address" placeholder="Alamat Domisili">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="age">Umur</label>
                </div>
                <div class="input">
                    <input type="text" id="age" name="age" placeholder="Umur">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="religion">Agama</label>
                </div>
                <div class="input">
                    <input type="text" id="religion" name="religion" placeholder="Agama">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="experience">Pengalaman</label>
                </div>
                <div class="input">
                    <textarea id="experience" name="experience" placeholder="Tuliskan Pengalamanmu Dalam Bidang Pariwisata
                     Jika Tidak Ada, Tuliskan Apa Saja yang Kamu Tahu Tentang Pariwisata di Bangka Belitung"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="study">Sekolah</label>
                </div>
                <div class="input">
                    <input type="text" id="study" name="study" placeholder="Ijazah Terakhir">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="email">E-mail</label>
                </div>
                <div class="input">
                    <input type="text" id="email" name="email" placeholder="email">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="facebook">Akun Facebook</label>
                </div>
                <div class="input">
                    <input type="text" id="facebook" name="facebook" placeholder="Akun facebook">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="instagram">Akun Instagram</label>
                </div>
                <div class="input">
                    <input type="text" id="instagram" name="instagram" placeholder="Akun Instagram">
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="twitter">Akun Twitter</label>
                </div>
                <div class="input">
                    <input type="text" id="twitter" name="twitter" placeholder="Akun Twitter">
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
                <input type="submit" value="Submit">

                <input type="reset" value="Reset">
            </div>

        </form>
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
</script>
<?= $this->endSection() ?>