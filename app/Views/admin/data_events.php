<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/main/form.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="data-event" id="data-event">


    <div class="content" action="">
        <h3>Tabel Data Event</h3><br>
        <a href="<?= base_url('/event/create') ?>"><button type="button" class="button-create" data-tooltip="tooltip" data-placement="top" title="Create">CREATE</button></a>
        <a href="<?= base_url('/event/index') ?>"><button type="button" class="button-home" data-tooltip="tooltip" data-placement="top" title="Home">HOME</button></a>
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
                    <th>Lokasi</th>
                    <th>Tanggal</th>
                    <th>Content</th>
                    <th>Picture</th>
                    <th>Action</th>

                </tr>
            </thead>
            <?php
            $no = 1 + (5 * ($currentPage - 1));
            ?>
            <tbody>
                <?php if (count($event)) : ?>
                    <?php foreach ($event as $item) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item->name ?></td>
                            <td><?= $item->village ?>,<?= $item->sub_district ?>,<?= $item->district ?></td>
                            <td><?= \CodeIgniter\I18n\Time::parse($item->date)->toLocalizedString('dd MMMM yyyy') ?></td>
                            <td><?= $item->content ?></td>
                            <td> <a href="<?= $item->picture ?>"> <?= $item->picture ?></a></td>
                            <td>
                                <a href="<?= base_url('/event/edit/' . $item->id) ?>">
                                    <button class="button-edit">Edit</button>
                                </a>
                                <form action="<?= base_url('event/' . $item->id) ?>" method="post" enctype="multipart/form-data">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="button-delete" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?= $pager->links('event', 'pagination'); ?>
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