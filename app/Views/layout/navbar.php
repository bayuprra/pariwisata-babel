<header>

    <a href="#" class="logo"><span>SI pariwisata</span>Bangka Belitung</a>

    <nav class="navbar">
        <a href="<?= base_url('placecontroller/index') ?>">home</a>
        <a href="<?= base_url('news/index') ?>">News</a>
        <a href="<?= base_url('guide/index') ?>">Guide</a>
        <a href="<?= base_url('event/index') ?>">event</a>
    </nav>
    <div class="dropdown">
        <?php if (session()->get('isLoggedIn')) : ?>
            <button class="btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profil
            </button>
        <?php else : ?>
            <button class="btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Masuk atau Daftar
            </button>
        <?php endif; ?>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php if (session()->get('isLoggedIn')) : ?>
                <li><a class="dropdown-item" href="<?= base_url('/edit-profile') ?>">Edit Profil</a></li>
                <li><a class="dropdown-item" href="<?= base_url('/message') ?>">Transaksi</a>
                <li><a class="dropdown-item" href="<?= base_url('/logout') ?>">Keluar</a></li>
            <?php else : ?>
                <li><a href="<?= base_url('/login') ?>">Masuk / Daftar</a></li>
            <?php endif; ?>
        </div>
    </div>

    </div>
</header>


<script>
</script>


</body>

</html>