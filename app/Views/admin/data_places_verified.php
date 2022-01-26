<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="place" id="place">


    <div class="content" action="">
        <h3>Tabel Data Tempat Wisata Terverifikasi</h3>
        <a href="<?= base_url('/') ?>"><button type="button" class="button-home" data-tooltip="tooltip" data-placement="top" title="Home">HOME</button></a>

        <br><br>
        <div class="row">
            <div class="col-6">
                <form action="" method="get">
                    <div class="input-group mb-2 mt-5">
                        <input type="text" class="form-control" placeholder="Cari Data" name="keyword" autocomplete="off">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <?= view('shared/flash_message') ?>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Jalan</th>
                    <th>Desa/kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten/Kota</th>
                    <th>Fee</th>
                    <th>Deskripsi</th>
                    <th>Maps</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $no = 1 + (5 * ($currentPage - 1));
            ?>
            <tbody>
                <?php foreach ($places as $item) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $item->name ?></td>
                        <td><?= $item->category ?></td>
                        <td><?= $item->street ?></td>
                        <td><?= $item->village ?></td>
                        <td><?= $item->sub_district ?></td>
                        <td><?= $item->district ?></td>
                        <td><?= $item->fee ?></td>
                        <td><?= $item->description ?></td>
                        <td> <a href="<?= $item->maps ?>"><?= $item->maps ?></a></td>
                        <td><a href="<?= $item->getPicture() ?>"><?= $item->getPicture() ?></a></td>
                        <td>
                            <a href="<?= base_url('/place/edit/' . $item->id) ?>">
                                <button class="button-edit">Edit</button>
                            </a>
                            <form action="<?= base_url('place/' . $item->id) ?>" method="post" enctype="multipart/form-data">
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="button-delete" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <?= $pager->links('places', 'pagination'); ?>
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>

</script>
<?= $this->endSection() ?>