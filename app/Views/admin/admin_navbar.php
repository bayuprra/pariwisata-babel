<div class="sidebar close">
    <div class="logo-details">
        <span class="logo_name">Sistem Informasi Pariwsata Babel</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="#">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Category</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bxs-tree'></i>
                    <span class="link_name">Tempat Wisata</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Tempat Wisata</a></li>
                <li><a href="<?= base_url('tesadmin/dataplace') ?>">Data</a></li>
                <li><a href="<?= base_url('tesadmin/createplace') ?>">Buat Tempat Wisata</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-news'></i>
                    <span class="link_name">Berita</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Berita</a></li>
                <li><a href="<?= base_url('/admin/news') ?>">Data</a></li>
                <li><a href="<?= base_url('/news/create') ?>">Buat Berita</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-user-pin'></i>
                    <span class="link_name">Guide</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Guide</a></li>
                <li><a href="<?= base_url('/admin/guide') ?>">Pendaftaran</a></li>
                <li><a href="<?= base_url('/admin/vguide') ?>">Terverifikasi</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="<?= base_url('/admin/event') ?>">
                    <i class='bx bx-calendar'></i>
                    <span class="link_name">Event</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Event</a></li>
                <li><a href="<?= base_url('/admin/event') ?>">Data</a></li>
                <li><a href="<?= base_url('/event/create') ?>">Tambah Event</a></li>
            </ul>
        </li>
        <li>
            <a href="<?= base_url('tesadmin/datauser') ?>">
                <i class='bx bx-pie-chart-alt-2'></i>
                <span class="link_name">User Data</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="<?= base_url('tesadmin/datauser') ?>">User Data</a></li>
            </ul>
        </li>
        <li>
            <a href="<?= base_url('tesadmin/datareview') ?>">
                <i class='bx bx-star'></i>
                <span class="link_name">Review Data</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="<?= base_url('tesadmin/datareview') ?>">Review Data</a></li>
            </ul>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <!-- <img src="/image/a.jpg" alt=""> -->
                </div>
                <div class="name-job">
                    <div class="profile_name">Bayu Pratama</div>
                    <div class="job">Admin</div>
                </div>
                <i class='bx bx-log-out'></i>
            </div>
        </li>
    </ul>
</div>

<div class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <!-- <span class="text">Drop Down Sidebar</span> -->
    </div>
</div>





<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });
</script>
</body>

</html>