<?= $this->extend('layout/master_layout') ?>

<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/user.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="readnews" id="readnews">
    <div class="read">
        <h3><?= $news->title ?></h3>
        <p><?= $news->created_at ?></p>
        <img src="<?= $news->newsImage()->original ?>" alt="news">
        <div class="content">
            <?= $news->content ?>
        </div>
    </div>
    <div class="recom">
        <p>Terbaru</p>
        <hr>
        <?php if (count($recent)) : ?>
        <?php foreach ($recent as $item) : ?>
            <div class="terbaru">
                <img src="<?= $item->newsImage()->small ?>" alt="news">
                <a href="<?= base_url('news/show/' . $item->id) ?>">
                    <h3><?= $item->title ?></h3>
                </a>
            </div>
            <hr>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>

</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
</script>
<?= $this->endSection() ?>