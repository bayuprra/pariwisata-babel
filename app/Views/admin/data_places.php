<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="place" id="place">


    <div class="content" action="">
        <h3>Tabel Data Tempat Wisata</h3><br><br>
        <div class="search-container">
            <input type="text" placeholder="Search.." name="search">
        </div>
        <?= view('shared/flash_message') ?>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jalan</th>
                    <th>Desa/kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten/Kota</th>
                    <th>Fee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            ?>
            <tbody>
            <?php foreach ($places as $item) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $item->name ?></td>
                    <td><?= $item->street ?></td>
                    <td><?= $item->village ?></td>
                    <td><?= $item->sub_district ?></td>
                    <td><?= $item->district ?></td>
                    <td><?= $item->fee ?></td>
                    <td>
                        <a href="<?= base_url('/news/edit/' . $item->id) ?>">
                            <button class="button-edit">Edit</button>
                        </a>
                        <form action="<?= base_url('news/' . $item->id) ?>" method="post" enctype="multipart/form-data">
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="button-delete" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>

</script>
<?= $this->endSection() ?>