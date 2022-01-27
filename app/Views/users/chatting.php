<?= $this->extend('layout/master_layout') ?>



<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/chatting.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="chatting" id="chatting">


    <div class="content">
        <?= view('shared/flash_message') ?>
        <div class="name">
            <a href="" data-id="">
                <div class="user">
                    <img src="/images/z.jpg" alt="">
                    <p>Nama Saya</p>
                </div>
            </a>
        </div>
        <div class="res">
            <div class="chatbox">
                <?php $guide = session()->get('dataGuide') ?>
                <?php if ($guide) : ?>
                    <h1>kirim pesan dengan <?= $chatRoom->user()->name ?></h1>
                <?php else : ?>
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


            <div class="detail ">
                <h1>Detail Pemesanan</h1>
                <div class="tablesdet">
                    <table class="table table-dark">
                        <tbody>
                            <tr>
                                <th scope="col" class="col-1">2</th>
                                <th scope="col" class="col-3">First</th>
                                <th scope="col">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="............">
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" class="col-1">3</th>
                                <th scope="col" class="col-3">First</th>
                                <th scope="col">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" class="col-1">4</th>
                                <th scope="col" class="col-3">First</th>
                                <th scope="col">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" class="col-1">4</th>
                                <th scope="col" class="col-3">First</th>
                                <th scope="col">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" class="col-1">4</th>
                                <th scope="col" class="col-3">First</th>
                                <th scope="col">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" class="col-1">4</th>
                                <th scope="col" class="col-3">First</th>
                                <th scope="col">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" class="col-1">4</th>
                                <th scope="col" class="col-3">Status</th>
                                <th scope="col">
                                    <input class="form-control" type="text" placeholder="Pending" readonly>
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" class="col-1">4</th>
                                <th scope="col" class="col-3">Action</th>
                                <th scope="col" class="action">
                                    <button type="button" class="btn-success col-2 btn-lg">Deal</button>
                                    <button type="button" class="btn-info col-2 btn-lg">Nego</button>
                                    <button type="button" class="btn-danger col-2 btn-lg">Tolak</button>
                                    <button type="button" class="btn-secondary col-2 btn-lg">Pending</button>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    // jQuery Document
    $(document).ready(function() {
        $('body').on('click', '#submitMsg', function(event) {
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
                success: function(html) {
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
                    if (newScrollHeight > oldScrollHeight) {
                        $("#chatbox").animate({
                            scrollTop: newScrollHeight
                        }, 'normal'); //Autoscroll to bottom of div
                    }
                }
            });
        }

        setInterval(loadLog, 1000);
    });
</script>
<script>
    let btn = document.querySelectorAll(".modaltrigger");
    // When the user clicks the button, open the modal
    for (let i = 0; i < btn.length; i++) {
        let dataId = btn[i].getAttribute("data-id");
        let span = document.getElementById(`place-modal-close-${dataId}`);
        let modal = document.getElementById(`place-modal-${dataId}`);

        // when the user clicks the button, open the modal
        btn[i].onclick = function(e) {
            e.preventDefault();
            modal.style.display = "block";
        }

        // close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // close the modal when click out of modal
        window.addEventListener("click", function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    }
</script>
<?= $this->endSection() ?>