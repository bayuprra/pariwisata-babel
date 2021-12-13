<?= $this->extend('layout/master_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/login.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<section class="login" id="login">

    <div class="content" action="">

        <div class="title-text">
            <div class="title login">
                Login / Masuk
            </div>
            <div class="title signup">
                Pendaftaran
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
                <form action="#" class="login">
                    <div class="field">
                        <input type="text" placeholder="Alamat Email" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Kata Sandi" required>
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
                <form action="#" class="signup">
                    <div class="field">
                        <input type="text" placeholder="Alamat Email" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Kata Sandi" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Masukkan Ulang Kata Sandi" required>
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