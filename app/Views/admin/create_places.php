<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<section class="place" id="place">


    <div class="content">
        <?= view('shared/flash_message') ?>

        <form action="<?= base_url('place') ?>" method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="print">
                    <label for="category">Kategori</label>
                </div>
                <div class="input">
                    <select id="category" name="category" required>
                        <option selected disabled>Plih</option>
                        <option value="tempat wisata">Tempat Wisata</option>
                        <option value="kuliner">Kuliner</option>
                        <option value="hotel dan penginapan">Hotel dan Penginapan</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="name">Nama Tempat Wisata</label>
                </div>
                <div class="input">
                    <input type="text" id="name" name="name" placeholder="Nama Tempat" required>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="street">Jalan</label>
                </div>
                <div class="input">
                    <input type="text" id="street" name="street" placeholder="nama jalan" required>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="village">Desa / Kelurahan</label>
                </div>
                <div class="input">
                    <input type="text" id="village" name="village" placeholder="Nama Desa/Kelurahan" required>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="sub_district">Kecamatan</label>
                </div>
                <div class="input">
                    <input type="text" id="sub_district" name="sub_district" placeholder="kecamatan" required>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="district">Kabupaten</label>
                </div>
                <div class="input">
                    <select id="district" name="district" required>
                        <option selected disabled>Plih</option>
                        <option value="Bangka">Bangka</option>
                        <option value="Bangka Barat">Bangka Barat</option>
                        <option value="Bangka Selatan">Bangka Selatan</option>
                        <option value="Bangka Tengah">Bangka Tengah</option>
                        <option value="Belitung">Belitung</option>
                        <option value="Belitung Timur">Belitung Timur</option>
                        <option value="Pangkal Pinang">Pangkal Pinang</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="print">
                    <label for="description">Deskripsi</label>
                </div>
                <div class="input">
                    <textarea type="text" id="description" name="description" placeholder="description" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="fee">Biaya Masuk</label>
                </div>
                <div class="input">
                    <input type="number" id="fee" name="fee" placeholder="Fee" required>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="maps">Link Gmaps</label>
                </div>
                <div class="input">
                    <input type="text" id="maps" name="maps" placeholder="gmaps" required>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="picture">Foto Tempat Wisata</label>
                </div>
                <div class="input">
                    <label for="picture">Select a file:</label>
                    <input type="file" id="picture" name="picture" required><br><br>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Submit">

                <a href="<?= base_url('/admin/vplace') ?>">
                    <input type="reset" value="Kembali">
                </a>
            </div>

        </form>
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
</script>
<?= $this->endSection() ?>