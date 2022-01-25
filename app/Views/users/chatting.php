<?= $this->extend('layout/master_layout') ?>



<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/chatting.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="chatting" id="chatting">


    <div class="content">
        <?= view('shared/flash_message') ?>
        <!------ Include the above in your HEAD tag ---------->
        <div class="chatbox">
            <h1>kirim pesan dengan user1</h1>
            <div class="message">
                <div class="user">
                    <img src="/images/z.jpg" alt="">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, minus eveniet? In ducimus eligendi consequatur nihil eos doloremque debitis! Reprehenderit exercitationem fugit veritatis minus placeat neque et, in corrupti officiis.</p>
                </div>
                <div class="guide">
                    <img src="/images/z.jpg" alt="">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, minus eveniet? In ducimus eligendi consequatur nihil eos doloremque debitis! Reprehenderit exercitationem fugit veritatis minus placeat neque et, in corrupti officiis.</p>

                </div>
                <div class="guide">
                    <img src="/images/z.jpg" alt="">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, minus eveniet? In ducimus eligendi consequatur nihil eos doloremque debitis! Reprehenderit exercitationem fugit veritatis minus placeat neque et, in corrupti officiis.</p>
                </div>
            </div>
            <form action="">
                <textarea name="subject" id="subject" placeholder="tuliskan">

                </textarea>
                <a href="">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                </a>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>