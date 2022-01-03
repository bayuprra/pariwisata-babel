<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="data-guide" id="data-guide">


    <div class="content" action="">
        <h3>Tabel Data Verified Guide</h3>
        <div class="search-container">
            <input type="text" placeholder="Search.." name="search">
        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Nomor Telepon</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Sekolah</th>
                    <th>Pengalaman</th>
                    <th>Email</th>
                    <th>Facebook</th>
                    <th>Instagram</th>
                    <th>Twitter</th>
                    <th>Foto Diri</th>
                    <th>Video</th>
                    <th>Status</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            ?>
            <tbody>
                <?php foreach ($guide as $item) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $item->user_id ?></td>
                        <td><?= $item->name ?></td>
                        <td><?= $item->age ?></td>
                        <td><?= $item->phone ?></td>
                        <td><?= $item->gender ?></td>
                        <td><?= $item->religion ?></td>
                        <td><?= $item->address ?></td>
                        <td><?= $item->study ?></td>
                        <td><?= $item->experience ?></td>
                        <td><?= $item->email ?></td>
                        <td><?= $item->facebook ?></td>
                        <td><?= $item->instagram ?></td>
                        <td><?= $item->twitter ?></td>
                        <td> <a href="/image/<?= $item->identity_picture ?>"> <?= $item->guidePicture() ?></a></td>
                        <td><a href="/image/<?= $item->video ?>"><?= $item->guideVideo() ?></a></td>

                        <td>#</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>

</script>
<?= $this->endSection() ?>