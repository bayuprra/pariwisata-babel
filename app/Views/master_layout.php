<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url()?>/main/master.css">
    <?= $this->renderSection('style') ?>
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"
            integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
</head>
<body>
<div class="container col-12">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Traveloha</a>

        <li><a class="nav-link active" href="#">Home</a></li>
        <li><a class="nav-link" href="#">Berita</a></li>
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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- content -->
        <?= $this->renderSection('content') ?>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $(".nav a").on("click", function(){
        $(".nav").find(".active").removeClass("active");
        $(this).parent().addClass("active");
    });
</script>
<?= $this->renderSection('script') ?>
</body>
</html>