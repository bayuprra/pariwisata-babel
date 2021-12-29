<?= $this->extend('layout/master_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/login.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<section class="login" id="login">

    <div class="wrapper">
        <div class="title-text">
            <div class="title login">
                Login
            </div>
            <div class="title signup">
                Daftar
            </div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Daftar</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <form action="<?= base_url('/authenticate') ?>" class="login" method="post" enctype="multipart/form-data">
                    <div class="field">
                        <input type="text" name="email_address" placeholder="Alamat Email" required>
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="Kata Sandi" required>
                    </div>
                    <div class="pass-link">
                        <a href="#">Lupa Kata Sandi?</a>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Masuk">
                    </div>
                    <div class="signup-link">
                        Belum Punya Akun? <a href="">Daftar Sekarang</a>
                    </div>
                </form>
                <form action="<?= base_url('/register') ?>" class="signup" method="post" enctype="multipart/form-data">
                    <div class="field">
                        <input type="text" name="email_address" placeholder="Alamat Email" required>
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="Kata Sandi" required>
                    </div>
                    <div class="field">
                        <input type="password" name="confirmPassword" placeholder="Ulang Kata Sandi" required>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Daftar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = (() => {
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
    });
    loginBtn.onclick = (() => {
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
    });
    signupLink.onclick = (() => {
        signupBtn.click();
        return false;
    });
</script>
<?= $this->endSection() ?>