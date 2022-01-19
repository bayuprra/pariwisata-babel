<?= $this->extend('layout/master_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/user.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="partner" id="partner">

    <div class="content1">
        <div class="content11">
            <h3>Tertarik menjadi tour guide ?</h3>
            <a href="<?= base_url('formforuser/guide') ?>">
                <input type="submit" value="daftar sekarang" class="btn">
            </a>
        </div>
        <br>
        <div class="content12">
            <?php
            $session = session()->get('id');
            if ($session == 1) : ?>
                <a href="<?= base_url('admin/guide') ?>"><button type="button" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Dashboard">DASHBOARD</button></a>
            <?php endif; ?>
        </div>
        <div class="content12">
            <?= view('shared/flash_message') ?>
        </div>
    </div>
    <div class="content2">
        <div class="box-container">
            <?php foreach ($guide as $item) : ?>
                <div class="box">
                    <a href="#" class="fas fa-envelope"></a>
                    <a href="#" class="fas fa-phone"></a>
                    <img src="/image/<?= $item->identity_picture ?>" alt="guide image">
                    <a href="#" data-id="<?= $item->id ?>" class="name">
                        <h3><?= $item->name ?></h3>
                    </a>
                    <span>tour guide</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php foreach ($guide as $item) : ?>
            <div class="partner-modal" id="partner-modal-<?= $item->id ?>">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="box">
                        <div class="image">
                            <img src="/image/<?= $item->identity_picture ?>" alt="">
                        </div>
                        <div class="line"></div>
                        <div class="bio-medsos">
                            <div class="biodata">
                                <div class="bio">
                                    <p>nama</p>
                                    <p>jenis kelamin</p>
                                    <p>agama</p>
                                    <p>alamat</p>
                                    <p>umur</p>
                                    <p>Pengalaman</p>
                                </div>
                                <div>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                </div>
                                <div>
                                    <p><?= $item->name ?></p>
                                    <p><?= $item->gender ?></p>
                                    <p><?= $item->religion ?></p>
                                    <p><?= $item->address ?></p>
                                    <p><?= $item->age ?></p>
                                    <p><?= $item->experience ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</section>
<?= $this->endSection() ?>


<?= $this->section('script') ?>

<script>
    let btn = document.querySelectorAll(".name");
    let spans = document.getElementsByClassName("close")[0];


    for (let i = 0; i < btn.length; i++) {
        let span = document.getElementsByClassName("close")[i];
        let dataId = btn[i].getAttribute("data-id");
        let modal = document.getElementById(`partner-modal-${dataId}`);

        // When the user clicks the button, open the modal
        btn[i].onclick = function(e) {
            e.preventDefault();
            modal.style.display = "block";
        }

        // When the user clicks the button, close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks out of modal, close the modal
        window.addEventListener("click", function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    }
</script>

<?= $this->endSection() ?>