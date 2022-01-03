<style>
    .alert-danger {}


    .alert-success,
    .alert-danger {
        position: absolute;
        width: 20%;
        height: auto;
        font-weight: bold;
        font-size: 15px;
        left: 0;
        top: 20%;
        padding: 15px;
    }
</style>




<?php if (!empty(session()->getFlashdata('errors'))) : ?>
    <div class="alert alert-danger" role="alert">
        <p><strong>Whoops!</strong> There are some problems with your input.</p>
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $field => $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<?php if (!empty(session()->getFlashdata('success'))) : ?>
    <div class="alert alert-success" id="sukses">
        <?= session()->getFlashdata('success') ?>
    </div>

    <script>
        const appear = setTimeout(appears, 5000)
    </script>
<?php endif; ?>

<?php if (!empty(session()->getFlashdata('error'))) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>