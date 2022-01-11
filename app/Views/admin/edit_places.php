<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="place" id="place">


    <div class="content" action="">
        <?= view('shared/flash_message') ?>
        <form action="<?= base_url('place/' . $places->id) ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="print">
                    <label for="name">Nama Tempat Wisata</label>
                </div>
                <div class="input">
                    <input type="text" id="name" name="name" value="<?= $places->name ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="street">Jalan</label>
                </div>
                <div class="input">
                    <input type="text" id="street" name="street" value="<?= $places->street ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="village">Desa / Kelurahan</label>
                </div>
                <div class="input">
                    <input type="text" id="village" name="village" value="<?= $places->village ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="sub_district">Kecamatan</label>
                </div>
                <div class="input">
                    <input type="text" id="sub_district" name="sub_district" value="<?= $places->sub_district ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="district">Kabupaten</label>
                </div>
                <div class="input">
                    <select id="district" name="district" required>
                        <option selected value="<?= $places->district ?>"><?= $places->district ?></option>
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
                    <label for="fee">Biaya Masuk</label>
                </div>
                <div class="input">
                    <input type="text" id="fee" name="fee" value="<?= $places->fee ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="maps">Link Gmaps</label>
                </div>
                <div class="input">
                    <input type="text" id="maps" name="maps" value="<?= $places->maps ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="print">
                    <label for="picture">Foto Tempat Wisata</label>
                </div>
                <div class="input">
                    <label for="picture">Select a file:</label>
                    <input type="file" id="picture" name="picture"><br><br>
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
</script>
<?= $this->endSection() ?>