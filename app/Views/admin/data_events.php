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

        <div class="search-container">
            <input type="text" placeholder="Search.." name="search">
        </div>
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
            $no = 1;
            ?>
            <tbody>
                <?php foreach ($event as $item) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $item->name ?></td>
                        <td><?= $item->village ?>,<?= $item->sub_district ?>,<?= $item->district ?></td>
                        <td><?= Carbon\Carbon::parse($event->date)->format('d F') ?></td>
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
            </tbody>
        </table>
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>

</script>
<?= $this->endSection() ?>