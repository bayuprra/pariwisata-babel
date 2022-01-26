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
            <a href="">
                <div class="user">
                    <img src="/images/z.jpg" alt="">
                    <p>Nama Saya</p>
                </div>
            </a>
            <a href="">
                <div class="user">
                    <img src="/images/z.jpg" alt="">
                    <p>Nama Saya</p>
                </div>
            </a>
            <a href="">
                <div class="user">
                    <img src="/images/z.jpg" alt="">
                    <p>Nama Saya</p>
                </div>
            </a>
            <a href="">
                <div class="user">
                    <img src="/images/z.jpg" alt="">
                    <p>Nama Saya</p>
                </div>
            </a>
            <a href="">
                <div class="user">
                    <img src="/images/z.jpg" alt="">
                    <p>Nama Saya</p>
                </div>
            </a>
        </div>
        <div class="res">
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
                    <div class="user">
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    // jQuery Document
    $(document).ready(function() {
        $("#submitmsg").click(function() {
            var clientmsg = $("#subject").val();
            $.post("post.php", {
                text: clientmsg
            });
            $("#subject").val("");
            return false;
        });

        function loadLog() {
            var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request

            $.ajax({
                url: "log.html",
                cache: false,
                success: function(html) {
                    $("#chatbox").html(html); //Insert chat log into the #chatbox div

                    //Auto-scroll			
                    var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request
                    if (newscrollHeight > oldscrollHeight) {
                        $("#chatbox").animate({
                            scrollTop: newscrollHeight
                        }, 'normal'); //Autoscroll to bottom of div
                    }
                }
            });
        }

        setInterval(loadLog, 2500);
    });
</script>
<?= $this->section('script') ?>

<?= $this->endSection() ?>