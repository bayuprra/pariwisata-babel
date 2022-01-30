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
                        <img src="/images/y.jpg" alt="">
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
                <?php $receiver_picture = session()->get('chat_room')->user_id === session()->get('id') ? session()->get('chat_room')->guide()->picture : session()->get('chat_room')->user()->picture ?>
                <h1 id="receiver-name"><?= $receiver_name ?></h1>
            <?php else : ?>
                <h1 id="receiver-name"><-- Klik Salah Satu Nama</h1>
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
                            <form>

                                <input type="hidden" id="chat_room_id" name="chat_room_id" value="">
                                <input type="hidden" id="transaction_id" name="transaction_id" value="">

                                <tr>
                                    <th scope="col" class="col-3">Status</th>
                                    <th scope="col">
                                        <input class="form-control-lg" type="text" placeholder="Pending" name="status" id="status" value="" readonly>
                                    </th>

                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Nomor Telepon</th>
                                    <th scope="col">
                                        <input type="number" class="form-control-lg" id="phone" name="phone" value="" required>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Tanggal Sewa</th>
                                    <th scope="col">
                                        <input type="date" class="form-control-lg" id="date_start" name="date_start" value="" required>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Tanggal Selesai</th>
                                    <th scope="col">
                                        <input type="date" class="form-control-lg" id="date_finish" name="date_finish" value="" required>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Tempat Tujuan</th>
                                    <th scope="col">
                                        <textarea class="form-control" id="destination" name="destination" rows="3" required></textarea>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Kendaraan</th>
                                    <th scope="col">
                                        <select class="form-control-lg" id="transport" name="transport" required>
                                            <option value="" disabled>-Pilih-</option>
                                            <option value="Dari Guide (mobil)">Dari Guide (mobil)</option>
                                            <option value="Dari Guide (motor)">Dari Guide (motor)</option>
                                            <option value="Dari pemesan (mobil)">Dari pemesan (mobil)</option>
                                            <option value="Dari pemesan (motor)">Dari pemesan (motor)</option>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Biaya</th>
                                    <th scope="col">
                                        <input type="number" class="form-control-lg" id="price" name="price" value="" required>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Tipe Pembayaran</th>
                                    <th scope="col">
                                        <select class="form-control-lg" id="payment" name="payment" required>
                                            <option disabled>-Pilih-</option>
                                            <option value="Transfer">Transfer</option>
                                            <option value="Di Tempat">Di Tempat</option>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Lokasi Penjemputan</th>
                                    <th scope="col">
                                        <input type="text" class="form-control-lg" id="meetpoint" name="meetpoint" value="" required>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Catatan</th>
                                    <th scope="col">
                                        <textarea class="form-control" id="note" name="note" rows="3" required></textarea>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="col-3">Action</th>
                                    <th scope="col" class="action">
                                    <?php if (session()->get('isGuide')) : ?>
                                        <button type="button" id="tolak" onclick="stat('Tolak')" class="nego btn-danger col-2 btn-lg">Tolak</button>
                                        <button type="submit" id="buat" class="nego btn-primary col-2 btn-lg">Buat</button>
                                        <button type="submit" id="simpan" class="nego btn-secondary col-2 btn-lg">Simpan</button>
                                    <?php else : ?>
                                        <button type="button" id="deal" onclick="stat('Deal')" class="nego btn-success col-2 btn-lg">Deal</button>
                                        <button type="button" id="tolak" onclick="stat('Tolak')" class="nego btn-danger col-2 btn-lg">Tolak</button>
                                        <button type="submit" id="simpan" class="nego btn-secondary col-2 btn-lg">Simpan</button>
                                    <?php endif; ?>
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
            var selectedRoom = rooms[i].getAttribute('data-selected-roomid')

            $.ajax({
                url: `/transaction/${selectedRoom}`,
                cache: false,
                success: function(data) {
                    let buat = document.getElementById('buat');
                    let simpan = document.getElementById('simpan');
                    let deal = document.getElementById('deal');
                    let tolak = document.getElementById('tolak');


                    if (data.status == 'Deal' || data.status == 'Tolak') {
                        //    readonly
                        document.getElementById("phone").readOnly = true;
                        document.getElementById("date_start").readOnly = true;
                        document.getElementById("date_finish").readOnly = true;
                        document.getElementById("destination").readOnly = true;
                        document.getElementById("transport").disabled = true;
                        document.getElementById("payment").disabled = true;
                        document.getElementById("meetpoint").readOnly = true;
                        document.getElementById("note").readOnly = true;
                        document.getElementById("price").readOnly = true;
                        // button

                        if (buat) buat.style.display = "none";
                        simpan.style.display = "none";
                        if (deal) deal.style.display = "none";
                        tolak.style.display = "none";
                    } else {
                        document.getElementById("phone").readOnly = false;
                        document.getElementById("date_start").readOnly = false;
                        document.getElementById("date_finish").readOnly = false;
                        document.getElementById("destination").readOnly = false;
                        document.getElementById("transport").disabled = false;
                        document.getElementById("payment").disabled = false;
                        document.getElementById("meetpoint").readOnly = false;
                        document.getElementById("note").readOnly = false;
                        document.getElementById("price").readOnly = false;
                        // button
                        if (buat) buat.style.display = "none";
                        simpan.style.display = "inline";
                        if (deal) deal.style.display = "inline";
                        tolak.style.display = "inline";
                    }

                    if (data === '') {

                        if (buat) buat.style.display = "block";
                        simpan.style.display = "none";
                        if (deal) deal.style.display = "none";
                        tolak.style.display = "none";
                    } else {
                        if (buat) buat.style.display = "none";
                        simpan.style.display = "inline";
                        if (deal) deal.style.display = "inline";
                        tolak.style.display = "inline";
                    }

                    detail(data, selectedRoom)

                },
                error: function(data) {
                    alert(data);
                    return false;
                }
            });

        }

        function detail(params, chat_room) {
            document.getElementById("chat_room_id").value = chat_room;
            document.getElementById("transaction_id").value = params.id !== undefined ? params.id : '';
            document.getElementById("phone").value = params.phone !== undefined ? params.phone : '';
            document.getElementById("date_start").value = params.date_start !== undefined ? params.date_start : '';
            document.getElementById("date_finish").value = params.date_finish !== undefined ? params.date_finish : '';
            document.getElementById("destination").value = params.destination !== undefined ? params.destination : '';
            document.getElementById("transport").value = params.transport !== undefined ? params.transport : '';
            document.getElementById("payment").value = params.payment !== undefined ? params.payment : '';
            document.getElementById("meetpoint").value = params.meetpoint !== undefined ? params.meetpoint : '';
            document.getElementById("note").value = params.note !== undefined ? params.note : '';
            document.getElementById("price").value = params.price !== undefined ? params.price : '';
            document.getElementById("status").value = params.status !== undefined ? params.status : 'Pending';

        }


    }

    function stat(value) {
        document.getElementById("status").value = value;
    }

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

        $('body').on('click', '.nego', function(event) {
            event.preventDefault();


            var transaction_id = $("#transaction_id").val()
            var roomId = $("#subject").data('roomid')
            var phone = $("#phone").val()
            var date_start = $("#date_start").val()
            var date_finish = $("#date_finish").val()
            var destination = $("#destination").val()
            var transport = $("#transport").val()
            var payment = $("#payment").val()
            var meetpoint = $("#meetpoint").val()
            var note = $("#note").val()
            var status = $("#status").val()
            var price = $("#price").val()
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: 'transaction/negotiate',
                type: "POST",
                data: {
                    transaction_id: transaction_id,
                    chat_room_id: roomId,
                    phone: phone,
                    date_start: date_start,
                    date_finish: date_finish,
                    destination: destination,
                    transport: transport,
                    payment: payment,
                    meetpoint: meetpoint,
                    note: note,
                    status: status,
                    price: price,
                    '_token': csrf_token
                },
                success: function(data) {
                    let buat = document.getElementById('buat');
                    if (data === 'success') {
                        buat.style.display = "none";
                        alert('Transaksi berhasil disimpan')
                    }
                },
                error: function(data) {
                    data = data.responseJSON['messages']
                    let messages = ''
                    for (let i in data) {
                        messages += data[i] + '\n'
                    }
                    alert(messages)
                    return false;
                }

            });
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
                                            <img src="/images/y.jpg" alt="">
                                            <p>${html[i].message}</p>
                                        </div>`
                        } else {
                            message += `<div class="user">
                                            <img src="/images/y.jpg" alt="">
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