<?= $this->extend('layout/master_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/user.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="home" id="home">
    <?= view('shared/flash_message') ?>

    <div class="content">
        <h3>Cari tempat yang ingin kamu kunjungi</h3>
        <form id="formPlace">
        <div class="inputBox">
            <input type="search" name="search" placeholder="cari" id="search">
        </div>
        <input type="submit" value="Cari lokasi" class="btn">
        </form>

        <!-- recommendation -->
        <div class="result-recom">
            <div class="det">
                <a href="#" class="fa fa-star" aria-hidden="true"></a>
                <p>Rekomendasi</p>
            </div>
            <div class="recom-container">
                <div class="recomendation">
                    <a href="#" class="modaltrigger">Pantai Matras</a>
                    <p>kabupaten</p>
                    <div class="like">
                        <a href="#" class="fa fa-thumbs-up" aria-hidden="true"></a>
                        <p>disukai oleh 1023 orang</p>
                    </div>
                </div>
                <div class="recomendation">
                    <a href="#" class="modaltrigger">Pantai Sungailiat</a>
                    <p>kabupaten</p>
                    <div class="like">
                        <a href="#" class="fa fa-thumbs-up" aria-hidden="true"></a>
                        <p>disukai oleh 1023 orang</p>
                    </div>
                </div>
                <div class="recomendation">
                    <a href="#" class="modaltrigger">Pantai Koba</a>
                    <p>kabupaten</p>
                    <div class="like">
                        <a href="#" class="fa fa-thumbs-up" aria-hidden="true"></a>
                        <p>disukai oleh 1023 orang</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- search -->
        <div class="result-search">
            <div class="det">
                <a href="#" class="fa fa-search" aria-hidden="true"></a>
                <p>hasil</p>
            </div>

            <div class="recom-container result-container" id="places" data-place="<?= htmlspecialchars(json_encode($places),ENT_QUOTES,'UTF-8') ?>">
            </div>
        </div>
    </div>

    <!-- modal -->


    <div class="place-modal" id="place-modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img src="/image/c.jpg" alt="tempat wisata">
            <div class="detail">
                <div class="nama">
                    <h3>pantai matras</h3>
                </div>
                <hr>
                <table class="det">
                    <tr>
                        <td>nama jalan</td>
                        <td>:</td>
                        <td>Jalan Pantai Matras</td>
                    </tr>
                    <tr>
                        <td>desa / kelurahan</td>
                        <td>:</td>
                        <td>Sinar Baru</td>
                    </tr>
                    <tr>
                        <td>kecamatan</td>
                        <td>:</td>
                        <td>Sungai Liat</td>
                    </tr>
                    <tr>
                        <td>kabupaten / kota</td>
                        <td>:</td>
                        <td>Bangka</td>
                    </tr>
                    <tr>
                        <td>tiket masuk</td>
                        <td>:</td>
                        <td>Rp. 5000</td>
                    </tr>
                </table>
            </div>
            <div class="more">
                <div class="like">
                    <a href="#" class="fa fa-heart" aria-hidden="true"></a>
                    <a>2019 like</a>
                </div>
                <div class="coment">
                    <a href="#" class="fa fa-comment" aria-hidden="true"></a>
                    <a href="#" class="comment">komentar</a>
                </div>
                <div class="map">
                    <a href="#" class="fa fa-map-marker" aria-hidden="true"></a>
                    <a href="#">petunjuk jalan</a>
                </div>
            </div>

            <!-- review modal -->
            <div class="review" id="review-modal">
                <div class="people-review">
                    <div class="content">
                        <h3>bayu pratama</h3>

                        <p>Tempatnya sangat bersih</p>
                    </div>
                    <div class="content">
                        <h3>Julianto</h3>

                        <p>Suasanya sangat nyaman juga sangat bersih</p>
                    </div>
                    <div class="content">
                        <h3>abun</h3>

                        <p>warung disekitar pantai masih belum banyak</p>
                    </div>
                    <div class="content">
                        <h3>bayu pratama</h3>

                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit commodi nobis sed inventore, rem reiciendis autem cumque a deleniti eos provident voluptates facere sint laborum eius sequi facilis quaerat ipsum?</p>
                    </div>
                    <div class="content">
                        <h3>bayu pratama</h3>

                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit commodi nobis sed inventore, rem reiciendis autem cumque a deleniti eos provident voluptates facere sint laborum eius sequi facilis quaerat ipsum?</p>
                    </div>
                </div>
                <button class="button1 add-coment">Tambahkan Komentar Anda</button>
                <button class="button2 tutup">Tutup</button>

                <div class="fillreview">
                    <!-- <form action="#">
                        <div class="textarea">
                            <textarea cols="30" placeholder=""></textarea>
                        </div>
                        <div class="btn">
                            <button type="submit">Post</button>
                        </div>
                    </form> -->

                </div>

            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>


<?= $this->section('script') ?>
<script>
    // search
    var resultContainer = document.getElementById('places');
    var placeData = document.getElementById('places').getAttribute("data-place");
    placeData = JSON.parse(placeData)

    function printItems(array) {
        var tampung = '';

        for (var i = 0; i < array.length; i++) {
            var place = array[i]
            tampung += `
            <div class="recomendation">
                <a href="#" class="modaltrigger">${place.name}</a>
                <p>${place.district}</p>
                <div class="like">
                    <a href="#" class="fa fa-thumbs-up" aria-hidden="true"></a>
                    <p>disukai oleh 1023 orang</p>
                </div>
            </div>`
        }
        resultContainer.innerHTML = tampung
    }

    function filter(kataKunci) {
        var filteredItems = []
        for (var j = 0; j < placeData.length; j++) {
            var place = placeData[j]
            console.log(place)
            var placeName = place.name
            var isMatch = placeName.toLowerCase().includes(kataKunci.toLowerCase())

            if (isMatch) filteredItems.push(place);
        }
        return filteredItems
    }

    var formSearch = document.getElementById('formPlace')
    formSearch.addEventListener('submit', function(event) {
        event.preventDefault();
        var keyword = document.getElementById("search").value;

        var terfilter = filter(keyword)
        printItems(terfilter)
    })



    // modal

    // Get the button that opens the modal
    let btn = document.querySelectorAll(".modaltrigger");

    // TODO: uncomment this code when integrating this view with partner controller
    // All page modals
    // let modals = document.querySelectorAll('.partner-modal');

    // TODO: remove this code when integrating this view with partner controller
    let modal = document.getElementById("place-modal");
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


    // modal review
    // Get the button that opens the modal
    let btnreview = document.querySelectorAll(".comment");

    // TODO: uncomment this code when integrating this view with partner controller
    // All page modals
    // let modals = document.querySelectorAll('.partner-modal');

    // TODO: remove this code when integrating this view with partner controller
    let modalreview = document.getElementById("review-modal");
    let spanreview = document.getElementsByClassName("tutup")[0];


    // Get the <span> element that closes the modal
    let spansreview = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    for (let i = 0; i < btnreview.length; i++) {
        btnreview[i].onclick = function(e) {
            e.preventDefault();
            modalreview.style.display = "block";
        }
    }

    // TODO: change this code when integrating this view with partner controller
    // When the user clicks on <span> (x), close the modal
    spanreview.onclick = function() {
        modalreview.style.display = "none";
    }

    // TODO: remove this code when integrating this view with partner controller
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modalreview) {
            modalreview.style.display = "none";
        }
    }
</script>
<?= $this->endSection() ?>