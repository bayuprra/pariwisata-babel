<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="data-guide" id="data-guide">


    <div class="content">
        <h3>Tabel Data Pendaftaran Guide</h3>
        <a href="<?= base_url('/guide/index') ?>"><button type="button" class="button-home" data-tooltip="tooltip" data-placement="top" title="Home">HOME</button></a>

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
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>Include</th>
                    <th>Description</th>
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
                    <th>Disetujui</th>
                </tr>
            </thead>
            <?php
            $no = 1 + (5 * ($currentPage - 1));
            ?>
            <tbody>
                <?php if (count($guide)) : ?>
                    <?php foreach ($guide as $item) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item->user_id ?></td>
                            <td><?= $item->name ?></td>
                            <td><?= $item->include ?></td>
                            <td><?= $item->description ?></td>
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
                            <td><a href="<?= $item->getIdentityPicture() ?>"> <?= $item->getIdentityPicture() ?></a></td>
                            <td><a href="<?= $item->getVideo() ?>"><?= $item->getVideo() ?></a></td>
                            <td>
                                <a href="#">
                                    <form action="<?= base_url('guide/approve/' . $item->id) ?>" method="POST">
                                        <button type="submit" class="button-edit">Ya</button>
                                    </form>
                                </a>
                                <form action="<?= base_url('guide/' . $item->id) ?>" method="post" enctype="multipart/form-data">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="button-delete" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?= $pager->links('guide', 'pagination'); ?>
                <?php else : ?>
                    <tr>Data Tidak DItemukan</tr>
                <?php endif; ?>
            </tbody>

        </table>
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>

</script>
<?= $this->endSection() ?>