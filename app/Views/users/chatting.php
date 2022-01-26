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
        <?php $guide = session()->get('dataGuide') ?>
        <?php if ($guide): ?>
            <h1>kirim pesan dengan <?= $chatRoom->user()->name ?></h1>
        <?php else: ?>
            <h1>kirim pesan dengan <?= $chatRoom->guide()->name ?></h1>
        <?php endif; ?>

        <div class="message" id="chatbox">
        </div>
            <form action="">
                <textarea name="subject" id="subject" placeholder="tuliskan" data-userid="<?= session()->get('id') ?>" data-roomid="<?= $chatRoom->id ?>">

                </textarea>
                <a id="submitMsg" class="fa fa-paper-plane"></a>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    // jQuery Document
    $(document).ready(function () {
        $('body').on('click', '#submitMsg', function (event) {
            event.preventDefault();

            var clientMsg = $("#subject").val()
            var userId = $("#subject").data('userid')
            var roomId = $("#subject").data('roomid')
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/direct-message/send',
                type: "POST",
                data: {
                    user_id: userId,
                    chat_room_id: roomId,
                    message: clientMsg,
                    '_token': csrf_token
                },
                success: loadLog()
            });
            $("#subject").val("");
            return false;
        });

        function loadLog() {
            var oldScrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request
            var roomId = $("#subject").data('roomid')
            var userId = $("#subject").data('userid')

            $.ajax({
                url: `/direct-message/chats/${roomId}`,
                cache: false,
                success: function (html) {
                    let message = ''

                    for (var i = 0; i < html.length; i++) {
                        if (html[i].user_id == userId) {
                            message += `<div class="guide">
                                            <img src="/images/z.jpg" alt="">
                                            <p>${html[i].message}</p>
                                        </div>`
                        } else {
                            message += `<div class="user">
                                            <img src="/images/z.jpg" alt="">
                                            <p>${html[i].message}</p>
                                        </div>`
                        }
                    }

                    $("#chatbox").html(message); //Insert chat log into the #chatbox div

                    //Auto-scroll
                    var newScrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                    if(newScrollHeight > oldScrollHeight){
                        $("#chatbox").animate({ scrollTop: newScrollHeight }, 'normal'); //Autoscroll to bottom of div
                    }
                }
            });
        }

        setInterval (loadLog, 1000);
    });
</script>
<?= $this->endSection() ?>