<?= $this->extend('master_layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="row col-md-12 mt-2"  id="listBarang" >

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
        var tampung = "";
        for(var i=0; i <array.length; i++){
            var databarang = array[i]
            tampung += `
            <!-- Component Card dari Bootstrap -->
            <div class ="col-4 mt-2">
            <div class="card" style="width: 18rem;">
            <img src="${databarang[3]}" class="card-img-top" height="200px" width="200px" alt="...">
            <div class="card-body">
            <h5 class="card-title" id="itemDesc">${databarang[2]}</h5>
            <p class="card-text" id="itemName">${databarang[1]}</p>
            <a href="#" class="btn btn-primary" id="addCart" onClick="addCart()">Add To Cart</a>
            </div>
            </div>
            </div>`
        }
        tampungbarang.innerHTML = tampung
    }

    printItems(items)

    function filter(kataKunci) {
        var filteredItems = []
        for(var j=0; j<items.length; j++){
            var barang = items[j]
            var namaitem = barang[2]
            var isMatch = namaitem.toLowerCase().includes(kataKunci.toLowerCase())

            if(isMatch) filteredItems.push(barang);
        }
        return filteredItems
    }

    var formSearch = document.getElementById('formItem')
    formSearch.addEventListener('submit', function(event){
        event.preventDefault();
        var keyword = document.getElementById("keyword").value;

        var terfilter = filter(keyword)
        printItems(terfilter)
    })

    var cart = document.getElementById("cart")
    var carNumber = cart.value
    function addCart() {
        carNumber++;
        cart.innerHTML = `<i class="fas fa-shopping-cart"></i>(${carNumber})`
    }
</script>
<?= $this->endSection() ?>
