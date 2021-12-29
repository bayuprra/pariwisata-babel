<header>

    <a href="#" class="logo"><span>SI pariwisata</span>Bangka Belitung</a>

    <nav class="navbar">
        <a href="<?= base_url('users/index') ?>">home</a>
        <a href="<?= base_url('news/index') ?>">News</a>
        <a href="<?= base_url('guide/index') ?>">Guide</a>
        <a href="<?= base_url('event/index') ?>">event</a>
    </nav>
    <div class="icons" onclick="myFunction()">
        <div class="menu togle">
            <a href="#" class="fas fa-user"></a>
        </div>
    </div>
</header>


<div class="kontainer" id="profile">
    <div class="triangle-up"></div>
    <div class="dropmenu">
        <div class="icon">
            <ul>
                <?php if (session()->get('isLoggedIn')): ?>
                <li class="fa fa-user"></li>
                <li class="fa fa-sign-out"></li>
                <?php else: ?>
                <li class="fa fa-sign-in"></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="usermenu">
            <ul>
                <?php if (session()->get('isLoggedIn')): ?>
                <li>Edit Profil</li>
                <li><a href="<?= base_url('/logout') ?>">Logout</a></li>
                <?php else: ?>
                <li><a href="<?= base_url('/login') ?>">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>

<script>
    function myFunction() {
        var element = document.getElementById("profile");
        element.classList.toggle("kontainer");
    }
</script>


</body>

</html>