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
                    <i class="fa fa-paper-plane" id="submitmsg" aria-hidden="true"></i>
                </a>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function () {
    $("#submitmsg").click(function () {
        var clientmsg = $("#subject").val();
        $.post("post.php", { text: clientmsg });
        $("#subject").val("");
        return false;
    });

    function loadLog() {
        var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request

        $.ajax({
            url: "log.html",
            cache: false,
            success: function (html) {
                $("#chatbox").html(html); //Insert chat log into the #chatbox div

                //Auto-scroll			
                var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                if(newscrollHeight > oldscrollHeight){
                    $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                }	
            }
        });
    }

    setInterval (loadLog, 2500);
});
</script>
<?= $this->section('script') ?>

<?= $this->endSection() ?>