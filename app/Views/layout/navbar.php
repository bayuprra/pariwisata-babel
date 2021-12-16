<header>

    <a href="#" class="logo"><span>SI pariwisata</span>Bangka Belitung</a>

    <nav class="navbar">
        <a href="<?= base_url('users/index') ?>">home</a>
        <a href="<?= base_url('news/index') ?>">News</a>
        <a href="<?= base_url('partner/index') ?>">Partner</a>
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
                <li class="fa fa-user"></li>
                <li class="fa fa-sign-in"></li>
                <li class="fa fa-sign-out"></li>
            </ul>
        </div>
        <div class="usermenu">
            <ul>
                <li>Edit Profil</li>
                <li>Login</li>
                <li>Logout</li>
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