<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<?= view('shared/flash_message') ?>

<section class="data-news" id="data-news">

    <div class="content">
        <h3>Tabel Data Berita</h3>
        <a href="<?= base_url('/news/create') ?>"><button type="button" class="button-create" data-tooltip="tooltip" data-placement="top" title="Create">CREATE</button></a>
        <br><br>
        <div class="row">
            <div class="col-6">
                <form action="" method="post">
                    <div class="input-group mb-2 mt-5">
                        <input type="text" class="form-control" placeholder="Cari Data" name="keyword">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Tanggal Posting</th>
                    <th>Tanggal Update</th>
                    <th>Action</th>

                </tr>
            </thead>
            <?php
            $no = 1 + (1 * ($currentPage - 1));
            ?>
            <tbody>
                <?php foreach ($news as $item) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $item->title ?></td>
                        <td><?= substr($item->content, 0, 100) ?></td>
                        <td><?= $item->category ?></td>
                        <td> <a href="<?= $item->newsImage()->original ?>"><?= $item->newsImage()->original ?></a> </td>
                        <td><?= Carbon\Carbon::parse($item->created_at)->format('d F Y , h:m') ?></td>
                        <td><?= Carbon\Carbon::parse($item->updated_at)->format('d F Y , h:m') ?></td>
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
        <?= $pager->links('news', 'pagination'); ?>
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>

</script>
<?= $this->endSection() ?>