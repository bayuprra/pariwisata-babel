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
            <?php foreach ($chatRoom as $room) : ?>

                <?php $name = $room->guide()->name; ?>

                <?php if ($room->user_id !== session()->get('id')) : ?>
                    <?php $name = $room->user()->name ?>
                <?php endif; ?>

                <a href="">
                    <div class="user selected-room" data-selected-roomid="<?= $room->id ?>" data-receiver="<?= $name ?>">
                        <img src="/images/z.jpg" alt="">
                        <p><?= $name ?></p>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
        <div class="res">
            <div class="chatbox">
                <?php $receiver = ''; ?>
                <?php if (session()->get('chat_room')) : ?>
                    <?php $receiver = session()->get('chat_room')->id ?>
                    <?php $receiver_name = session()->get('chat_room')->user_id === session()->get('id') ? session()->get('chat_room')->guide()->name : session()->get('chat_room')->user()->name ?>
                    <h1 id="receiver-name"><?= $receiver_name ?></h1>
                <?php else : ?>
                    <h1 id="receiver-name"></h1>
                <?php endif; ?>


                <div class="message" id="chatbox">
                </div>
                <form action="">
                    <textarea name="subject" id="subject" placeholder="tuliskan" data-userid="<?= session()->get('id') ?>" data-roomid="<?= $receiver ?>">

                        </textarea>
                    <a id="submitMsg" class="fa fa-paper-plane"></a>
                </form>
            </div>


            <div class="detail ">
                <h1>Detail Pemesanan</h1>
                <div class="tablesdet">
                    <table class="table table-dark">
                        <tbody>
                            <form action="<?= base_url('transaction/negotiate') ?>" method="POST" enctype="multipart/form-data">

                                <input type="hidden" id="chat_room_id" name="chat_room_id" data-roomId="<?= $receiver ?>" value="">
                                <input type="hidden" id="id" name="id" value="">

                                <tr>
                                    <th scope="col" class="col-3">Status</th>
                                    <th scope="col">
                                        <input class="form-control-lg" type="text" placeholder="Pending" readonly>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Nomor Telepon</th>
                                    <th scope="col">
                                        <input type="number" class="form-control-lg" id="phone" name="phone" value="">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Tanggal Sewa</th>
                                    <th scope="col">
                                        <input type="date" class="form-control-lg" id="date_start" name="date_start" value="">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Tanggal Selesai</th>
                                    <th scope="col">
                                        <input type="date" class="form-control-lg" id="date_finish" name="date_finish" value="">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Tempat Tujuan</th>
                                    <th scope="col">
                                        <textarea class="form-control" id="destination" name="destination" rows="3"></textarea>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Kendaraan</th>
                                    <th scope="col">
                                        <select class="form-control-lg" id="transport" name="transport">
                                            <option value="" disabled>-Pilih-</option>
                                            <option value="Dari Guide (mobil)">Dari Guide (mobil)</option>
                                            <option value="Dari Guide (motor)">Dari Guide (motor)</option>
                                            <option value="Dari pemesan (mobil)">Dari pemesan (mobil)</option>
                                            <option value="Dari pemesan (motor)">Dari pemesan (motor)</option>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Tipe Pembayaran</th>
                                    <th scope="col">
                                        <select class="form-control-lg">
                                            <option disabled>-Pilih-</option>
                                            <option value="Transfer">Transfer</option>
                                            <option value="DI Tempat">Di Tempat</option>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Lokasi Penjemputan</th>
                                    <th scope="col">
                                        <input type="text" class="form-control-lg" id="meetpoint" name="meetpoint" value="">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Catatan</th>
                                    <th scope="col">
                                        <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Action</th>
                                    <th scope="col" class="action">
                                        <button type="button" class="btn-success col-2 btn-lg">Deal</button>
                                        <button type="button" class="btn-info col-2 btn-lg">Nego</button>
                                        <button type="button" class="btn-danger col-2 btn-lg">Tolak</button>
                                        <button type="submit" class="btn-secondary col-2 btn-lg">Simpan</button>
                                        <button type="submit" class="btn-primary col-2 btn-lg">Buat</button>
                                    </th>
                                </tr>
                            </form>
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
    let rooms = document.querySelectorAll('.selected-room');
    let subject = document.getElementById('subject');
    let receiver = document.getElementById('receiver-name');

    for (let i = 0; i < rooms.length; i++) {
        rooms[i].onclick = function(e) {
            e.preventDefault();
            subject.setAttribute("data-roomid", rooms[i].getAttribute('data-selected-roomid'));
            receiver.innerHTML = rooms[i].getAttribute("data-receiver");

            $.ajax({
                url: `/transaction/${rooms[i].getAttribute('data-selected-roomid')}`,
                cache: false,
                success: function(data) {
                    document.getElementById("mytext").value = "My value";
                    console.log(data);

                }
            })
            // trying3


        }
    }

    // trying 4
    // for (let i = 0; i < rooms.length; i++) {
    //     rooms[i].onclick = function(e) {
    //         e.preventDefault();
    //         var roomId = $("#chat_room_id").data('roomid')
    //         var csrf_token = $('meta[name="csrf-token"]').attr('content');

    //         $.ajax({
    //             url: '/transaction/negotiate',
    //             type: "POST",
    //             data: {
    //                 chat_room_id: roomId,
    //                 '_token': csrf_token
    //             },
    //             success: function(data) {
    //                 console.log(data);
    //             }
    //         });
    //     }
    // }


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
                    user_id: userId, // key sesuaikan dengan nama request pada controller
                    chat_room_id: roomId,
                    message: clientMsg,
                    '_token': csrf_token
                },
                success: loadLog() // kelola data / meneruskan proses apabila url berhasil dijalankan
            });
            $("#subject").val("");
            return false;
        });

        function loadLog() {
            var oldScrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request
            var roomId = document.getElementById('subject').getAttribute('data-roomid')
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


    // trying 

    // triyng
</script>

<?= $this->endSection() ?>