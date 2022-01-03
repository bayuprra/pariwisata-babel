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
            <a href="<?= base_url('formguides/index') ?>">
                <input type="submit" value="daftar sekarang" class="btn">
            </a>
        </div>
        <br>
        <div class="content12">
            <?php
            $session = session()->get('email');
            if ($session) : ?>
                <a href="<?= base_url('admin/guide') ?>"><button type="button" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Dashboard">DASHBOARD</button></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="content2">
        <div class="box-container">
            <div class="box">
                <a href="#" class="fas fa-envelope"></a>
                <a href="#" class="fas fa-phone"></a>
                <img src="/image/b.jpg" alt="">
                <a href="#" class="name">
                    <h3>john deo</h3>
                </a>
                <span>tour guide</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
            <div class="box">
                <a href="#" class="fas fa-envelope"></a>
                <a href="#" class="fas fa-phone"></a>
                <img src="/image/b.jpg" alt="">
                <a href="#" class="name">
                    <h3>Ahmat</h3>
                </a>
                <span>tour guide</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
            <div class="box">
                <a href="#" class="fas fa-envelope"></a>
                <a href="#" class="fas fa-phone"></a>
                <img src="/image/b.jpg" alt="">
                <a href="#" class="name">
                    <h3>Dedi</h3>
                </a>
                <span>tour guide</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
            <div class="box" style="display: none;">
                <a href="#" class="fas fa-envelope"></a>
                <a href="#" class="fas fa-phone"></a>
                <img src="/image/b.jpg" alt="">
                <a href="#" class="name">
                    <h3>john deo</h3>
                </a>
                <span>tour guide</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
            <div class="box" style="display: none;">
                <a href="#" class="fas fa-envelope"></a>
                <a href="#" class="fas fa-phone"></a>
                <img src="/image/b.jpg" alt="">
                <a href="#" class="name">
                    <h3>john deo</h3>
                </a>
                <span>tour guide</span>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="partner-modal" id="partner-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="box">
                <div class="image">
                    <img src="/image/b.jpg" alt="">
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
                            <p>john deo</p>
                            <p>laki-laki</p>
                            <p>islam</p>
                            <p>sungailiat</p>
                            <p>18 tahun</p>
                            <p>1 Tahun</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?= $this->endSection() ?>


<?= $this->section('script') ?>

<script>
    // Get the button that opens the modal
    let btn = document.querySelectorAll(".name");

    // TODO: uncomment this code when integrating this view with partner controller
    // All page modals
    // let modals = document.querySelectorAll('.partner-modal');

    // TODO: remove this code when integrating this view with partner controller
    let modal = document.getElementById("partner-modal");
    let span = document.getElementsByClassName("close")[0];


    // Get the <span> element that closes the modal
    let spans = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    for (let i = 0; i < btn.length; i++) {
        btn[i].onclick = function(e) {
            e.preventDefault();
            modal.style.display = "block";
        }
    }

    // TODO: change this code when integrating this view with partner controller
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // TODO: remove this code when integrating this view with partner controller
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // TODO: uncomment this code when integrating this view with partner controller
    // When the user clicks on <span> (x), close the modal
    // for (let i = 0; i < spans.length; i++) {
    //     spans[i].onclick = function() {
    //         for (let index in modals) {
    //             if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";
    //         }
    //     }
    // }

    // TODO: uncomment this code when integrating this view with partner controller
    // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {
    //     if (event.target.classList.contains('modal')) {
    //         for (let index in modals) {
    //             if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";
    //         }
    //     }
    // }
</script>

<?= $this->endSection() ?>