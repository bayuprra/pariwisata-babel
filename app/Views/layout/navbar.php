<div class="container col-12">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Traveloha</a>

        <li><a class="nav-link active" href="<?= base_url('users/index'); ?>">Home</a></li>
        <li><a class="nav-link" href="<?= base_url('news/index'); ?>">Berita</a></li>
        <li><a class="nav-link" href="#">Tempat Wisata</a></li>
        <li><a class="nav-link" href="#">Partner</a></li>

        <!-- Logout -->
        <div class="logout">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-2x"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <!-- condition if the user is admin-->
                    <!--                        <a class="dropdown-item" data-toggle="modal" data-target="#profileAdmin" data-backdrop="static" data-keyboard="false">Profile</a>-->
                    <!-- end-->
                    <!-- condition if the user is user-->
                    <!--                        <a class="dropdown-item" data-toggle="modal" data-target="#profileUser" data-backdrop="static" data-keyboard="false">Profile</a>-->
                    <!-- end-->
                    <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false">Reset Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('#').submit();">Logout
                        <form id="logout-form" action="#" method="POST" style="display: none;">
                        </form>
                    </a>
                </div>
            </div>
        </div>
    </nav>