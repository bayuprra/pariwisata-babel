<style>
    .alert-danger {
        margin-left: 150px;
    }

    p {
        background-color: red;
        width: 40%;
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
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (!empty(session()->getFlashdata('error'))) : ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>