<?= $this->extend('layout/master_layout') ?>
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>/main/user.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="home" id="home">
    <?= view('shared/flash_message') ?>

    <div class="content2">
        <?php
        $session = session()->get('id');
        if ($session == 1) : ?>
            <a href="<?= base_url('admin/place') ?>"><button type="button" class="btn btn-warning btn-sm" data-tooltip="tooltip" data-placement="top" title="Dashboard">DASHBOARD</button></a>
        <?php endif; ?>
        <br><br><br>
    </div>
    <div class="content">
        <h3>Cari tempat yang ingin kamu kunjungi</h3>
        <form id="formPlace">
            <div class="inputBox">
                <input type="search" name="search" placeholder="cari" id="search" autocomplete="off">
            </div>
            <input type="submit" value="Cari lokasi" class="btn">
        </form>
        <br>
        <a href="<?= base_url('formforuser/place') ?>" class="addplace">
            <h5>Tempat yang anda cari tidak ada? tambahkan data</h5>
        </a>

        <!-- recommendation -->
        <div class="result-recom" id="result-recom">
            <div class="det">
                <a href="#" class="fa fa-star" aria-hidden="true"></a>
                <p>Rekomendasi</p>
            </div>
            <div class="recom-container">
                <?php foreach ($places as $item) : ?>
                    <div class="recomendation">
                        <a href="#" class="modaltrigger" data-id="<?= $item->id ?>"><?= $item->name ?></a>
                        <p><?= $item->district ?></p>
                        <div class="like">
                            <a href="#" class="fa fa-thumbs-up" aria-hidden="true"></a>
                            <p>disukai oleh 1023 orang</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- search -->
        <div class="result-search">
            <div class="recom-container result-container" id="places" data-place="<?= htmlspecialchars(json_encode($places), ENT_QUOTES, 'UTF-8') ?>">
            </div>
        </div>

    </div>

    <!-- modal -->
    <?php foreach ($places as $item) : ?>
        <div class="place-modal" id="place-modal-<?= $item->id ?>">
            <div class="modal-content">
                <span class="close">&times;</span>
                <img src="<?= $item->getPicture() ?>" alt="tempat wisata">
                <div class="detail">
                    <div class="nama">
                        <h3>pantai matras</h3>
                    </div>
                    <hr>
                    <table class="det">
                        <tr>
                            <td>nama jalan</td>
                            <td>:</td>
                            <td><?= $item->street ?></td>
                        </tr>
                        <tr>
                            <td>desa / kelurahan</td>
                            <td>:</td>
                            <td><?= $item->village ?></td>
                        </tr>
                        <tr>
                            <td>kecamatan</td>
                            <td>:</td>
                            <td><?= $item->sub_district ?></td>
                        </tr>
                        <tr>
                            <td>kabupaten / kota</td>
                            <td>:</td>
                            <td><?= $item->district ?></td>
                        </tr>
                        <tr>
                            <td>tiket masuk</td>
                            <td>:</td>
                            <td>Rp. <?= $item->fee ?></td>
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
                        <a href="#" class="comment" data-id="<?= $item->id ?>">Pengalaman </a>
                    </div>
                    <div class="map">
                        <a href="#" class="fa fa-map-marker" aria-hidden="true"></a>
                        <a href="<?= $item->maps ?>">petunjuk jalan</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- review modal -->
        <div class="review" id="review-modal-<?= $item->id ?>">
            <div class="container">
                <div class="col-md-12">
                    <div class="offer-dedicated-body-left">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                                <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
                                    <?php foreach ($reviews as $ite) : ?>
                                        <div class="reviews-members pt-4 pb-4">
                                            <div class="media">
                                                <a href="#"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar1.png" class="mr-3 rounded-pill"></a>
                                                <div class="media-body">
                                                    <div class="reviews-members-header">
                                                        <span class="star-rating float-right">
                                                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                                                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                                                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                                                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                                                            <a href="#"><i class="icofont-ui-rating"></i></a>
                                                        </span>
                                                        <h6 class="mb-1"><a class="text-black" href="#">Singh Osahan</a></h6>
                                                    </div>
                                                    <div class="reviews-members-body">
                                                        <p>vds</p>
                                                    </div>
                                                    <div class="reviews-members-footer">
                                                        <a class="total-like" href="#"><i class="icofont-thumbs-up"></i> </a> <a class="total-like" href="#"><i class="icofont-thumbs-down"></i> ROLE</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rate">
                    <div class="container-form">
                        <div class="star-widget">
                            <div id="status"></div>
                            <form action="<?= base_url('placecontroller/rate') ?>" method="POST" id="ratingForm" enctype="multipart/form-data">
                                <fieldset class="rating">
                                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5">5 stars</label>
                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4">4 stars</label>
                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3">3 stars</label>
                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2">2 stars</label>
                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1">1 star</label>
                                </fieldset>
                                <div class="textarea">
                                    <textarea cols="30" name="comment" placeholder="Masukkan Komentar dan Pendapatmu...." required></textarea>
                                </div>
                                <input type="hidden" name="place_id" value="<?= $item->id ?>" />

                                <button type="submit" class="submit clearfix" value="submit">Posting</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <button class="button1 add-coment">Tambahkan Komentar Anda</button>
            <button class="button2 tutup">Tutup</button>
        </div>

    <?php endforeach; ?>
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

        if (array.length > 0) {
            for (var i = 0; i < array.length; i++) {
                var place = array[i]
                tampung += `
                <div class="recomendation">
                    <a href="#" class="modaltrigger" data-id="${place.id}">${place.name}</a>
                    <p>${place.district}</p>
                    <div class="like">
                        <a href="#" class="fa fa-thumbs-up" aria-hidden="true"></a>
                        <p>disukai oleh 1023 orang</p>
                    </div>
                </div>`
            }
        } else {
            tampung = '<p>Data tidak ditemukan</p>'
        }

        resultContainer.innerHTML = tampung
    }

    function filter(kataKunci) {
        var filteredItems = []
        for (var j = 0; j < placeData.length; j++) {
            var place = placeData[j]
            let isMatch = false
            let searchBy = ['district', 'sub_district', 'village', 'street']

            if (place['name'].toLowerCase().includes(kataKunci.toLowerCase())) {
                isMatch = true
            }

            if (!isMatch) {
                for (let i = 0; i < searchBy.length; i++) {
                    isMatch = place[searchBy[i]].toLowerCase() === kataKunci.toLowerCase();
                    if (isMatch) break;
                }
            }

            if (isMatch) filteredItems.push(place);
        }
        return filteredItems
    }

    var formSearch = document.getElementById('formPlace')
    let recom = document.getElementById("result-recom")
    formSearch.addEventListener('submit', function(event) {
        event.preventDefault();
        var keyword = document.getElementById("search").value;
        var terfilter = keyword ? filter(keyword) : null;

        if (terfilter) {
            printItems(terfilter)
            recom.style.display = "none";
        } else {
            "Data tidak"
        }
    })



    // modal

    let btn = document.querySelectorAll(".modaltrigger");

    // When the user clicks the button, open the modal
    for (let i = 0; i < btn.length; i++) {
        let span = document.getElementsByClassName("close")[i];
        let dataId = btn[i].getAttribute("data-id");
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

    // modal

    let bbtn = document.querySelectorAll(".comment");
    // When the user clicks the button, open the modal
    for (let i = 0; i < bbtn.length; i++) {
        let spanreview = document.getElementsByClassName("tutup")[i];
        let dataIdReview = bbtn[i].getAttribute("data-id");
        let modalreview = document.getElementById(`review-modal-${dataIdReview}`);
        // when the user clicks the button, open the modal
        bbtn[i].onclick = function(e) {
            e.preventDefault();
            modalreview.style.display = "block";
        }
        // close the modal
        console.log(modalreview);
        spanreview.onclick = function() {
            modalreview.style.display = "none";
        }

        // close the modal when click out of modal
        window.addEventListener("click", function(event) {
            if (event.target == modalreview) {
                modalreview.style.display = "none";
            }
        });
    }


    // modal review
    // Get the button that opens the modal
    // let btnreview = document.querySelectorAll(".comment");

    // TODO: uncomment this code when integrating this view with partner controller
    // All page modals
    // let modals = document.querySelectorAll('.partner-modal');

    // TODO: remove this code when integrating this view with partner controller



    // Get the <span> element that closes the modal

    // When the user clicks the button, open the modal
    // for (let i = 0; i < btnreview.length; i++) {
    //     btnreview[i].onclick = function(e) {
    //         e.preventDefault();
    //         modalreview.style.display = "block";
    //     }
    // }

    // TODO: change this code when integrating this view with partner controller
    // When the user clicks on <span> (x), close the modal


    // TODO: remove this code when integrating this view with partner controller
    // When the user clicks anywhere outside of the modal, close it




    // rating
    $(document).ready(function() {
        $("form#ratingForm").submit(function(e) {
            e.preventDefault(); // prevent the default click action from being performed
            if ($("#ratingForm :radio:checked").length == 0) {
                $('#status').html("nothing checked");
                return false;
            } else {
                $('#status').html('You picked ' + $('input:radio[name=rating]:checked').val());
            }
        });
    });
</script>
<?= $this->endSection() ?>