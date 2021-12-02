<?= $this->extend('layout/master_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/main.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="wrapper row">
    <div class="col-md-6 mt-2"></div>

</div>

<div class="wrapper row">
    <div class="col-md-6 mt-2">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://asset.kompas.com/crops/A-10Y09CvBgLvsZ7i4FtOiJSdNA=/2x151:1079x869/750x500/data/photo/2020/11/11/5fabf60a4db83.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://img.okezone.com/content/2019/06/06/406/2064174/5-tempat-wisata-di-bandung-yang-cocok-untuk-liburan-lebaran-jRc1eFQ2QO.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://asset.kompas.com/crops/dbjCKOaKpWze7jbMRFHwTZTMXsQ=/0x0:1080x720/750x500/data/photo/2020/11/11/5fabf25c3111b.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <p></p>
        <h4>
            <pre>       Temukan Tempat Wisata yang Ingin

       Kamu Kunjungi di Bangka Belitung</pre>
        </h4>
    </div>
    <div class="row col-md-6 mt-2 bg-light main" id="listBarang">
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    var items = [
        ['001', 'Bandung Barat', 'Farmhouse Lembang', 'https://img.okezone.com/content/2019/06/06/406/2064174/5-tempat-wisata-di-bandung-yang-cocok-untuk-liburan-lebaran-jRc1eFQ2QO.png'],
        ['002', 'Bandung Barat', 'Dago Dreampark', 'https://dagodreampark.co.id/media/k2/items/cache/7a6fe08027b80ee08bda1ed60d73e334_XL.jpg'],
        ['003', 'Bandung Selatan', 'Driam Riverside', 'https://asset.kompas.com/crops/dbjCKOaKpWze7jbMRFHwTZTMXsQ=/0x0:1080x720/750x500/data/photo/2020/11/11/5fabf25c3111b.jpg'],
        ['004', 'Bandung Selatan', 'Barusen Hills', 'https://asset.kompas.com/crops/A-10Y09CvBgLvsZ7i4FtOiJSdNA=/2x151:1079x869/750x500/data/photo/2020/11/11/5fabf60a4db83.jpg'],
        ['004', 'Bandung Selatan', 'Barusen Hills', 'https://asset.kompas.com/crops/A-10Y09CvBgLvsZ7i4FtOiJSdNA=/2x151:1079x869/750x500/data/photo/2020/11/11/5fabf60a4db83.jpg'],
        ['004', 'Bandung Selatan', 'Barusen Hills', 'https://asset.kompas.com/crops/A-10Y09CvBgLvsZ7i4FtOiJSdNA=/2x151:1079x869/750x500/data/photo/2020/11/11/5fabf60a4db83.jpg']
    ];
    var tampungbarang = document.getElementById('listBarang');

    function printItems(array) {
        var tampung = '';

        for (var i = 0; i < array.length; i++) {
            var tempatWisata = array[i]
            tampung += `
            <!-- Component Card dari Bootstrap -->
            <div class ="col-4 mt-2">
            <div class="card" style="width: 12rem;">
            <img src="${tempatWisata[3]}" class="card-img-top" height="120px" width="120px" alt="...">
            <div class="card-body">
            <h5 class="card-title" id="itemDesc">${tempatWisata[2]}</h5>
            <p class="card-text" id="itemName">${tempatWisata[1]}</p>
            <a href="#" class="btn btn-primary">Detail</a>
            </div>
            </div>
            </div>`
        }
        tampungbarang.innerHTML = tampung
    }

    printItems(items)

    function filter(kataKunci) {
        var filteredItems = []
        for (var j = 0; j < items.length; j++) {
            var barang = items[j]
            var namaitem = barang[2]
            var isMatch = namaitem.toLowerCase().includes(kataKunci.toLowerCase())

            if (isMatch) filteredItems.push(barang);
        }
        return filteredItems
    }

    var formSearch = document.getElementById('formItem')
    formSearch.addEventListener('submit', function(event) {
        event.preventDefault();
        var keyword = document.getElementById("keyword").value;

        var terfilter = filter(keyword)
        printItems(terfilter)
    })
</script>
<?= $this->endSection() ?>