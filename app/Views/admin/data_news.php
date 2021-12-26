<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="data-news" id="data-news">


    <div class="content" action="">
        <h3>Tabel Data Berita</h3>
        <a href="<?= base_url('/news/create') ?>"><button type="button" class="button-create" data-tooltip="tooltip" data-placement="top" title="Create">CREATE</button></a>

        <div class="search-container">
            <input type="text" placeholder="Search.." name="search">
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
            $no = 1;
            ?>
            <tbody>
                <?php foreach ($news as $item) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $item->title ?></td>
                        <td><?= substr($item->content, 0, 100) ?></td>
                        <td><?= $item->category ?></td>
                        <td><?= $item->newsImage()->original ?></td>
                        <td><?= $item->readableCreatedAt() ?></td>
                        <td><?= $item->readableUpdatedAt() ?></td>
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