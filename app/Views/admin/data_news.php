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
        <a href="<?= base_url('tesadmin/createnews') ?>"><button type="button" class="button-create" data-tooltip="tooltip" data-placement="top" title="Create">CREATE</button></a>

        <div class="search-container">
            <input type="text" placeholder="Search.." name="search">
        </div>
        <table id="example" class="table table-striped" style="width:100%">
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
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Pantai Matras</td>
                    <td>Jalan Pantai Matras</td>
                    <td>Sinar Baru</td>
                    <td>Sungailiat</td>
                    <td>Bangka</td>
                    <td>4000</td>
                    <td>
                        <a href="<?= base_url('tesadmin/editnews') ?>">
                            <button class="button-edit">Edit</button>
                        </a>
                        <button class="button-delete">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Pantai Matras</td>
                    <td>Jalan Pantai Matras</td>
                    <td>Sinar Baru</td>
                    <td>Sungailiat</td>
                    <td>Bangka</td>
                    <td>4000</td>
                    <td>
                        <button class="button-edit">Edit</button>
                        <button class="button-delete">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Pantai Matras</td>
                    <td>Jalan Pantai Matras</td>
                    <td>Sinar Baru</td>
                    <td>Sungailiat</td>
                    <td>Bangka</td>
                    <td>4000</td>
                    <td>
                        <button class="button-edit">Edit</button>
                        <button class="button-delete">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>

</script>
<?= $this->endSection() ?>