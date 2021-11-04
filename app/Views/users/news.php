<?= $this->extend('layout/master_layout') ?>

<?= $this->section('style') ?>
<!-- recomendation's style -->
<link rel="stylesheet" href="<?php echo base_url() ?>/main/main.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="news-container">
        <div class="row justify-content-left">
            <?php $a = 1; ?>
            <?php foreach ($news as $n) : ?>
                <div class="col-sm-4">
                    <div class="col-md-4 mt-3 h-100">
                        <div class="card shadow" style="width: 20rem; height: 50rem;">
                            <?php $a++; ?>
                            <div class="row" style="height: 30%;">
                                <div class="col"></div>
                                <div class="col-8">
                                    <div class="card-header bg-transparent">
                                        <img src="/image/<?= $n->picture; ?>" class="card-img-top img-fluid rounded-start" alt="..." width="20%">
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>
                            <div class="row" style="height: 5%;">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?= $n->title; ?></a></h5>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent" style="height: 40%;">
                                <p class="card-text"><?= $n->preview; ?></p>
                            </div>
                            <div class="card" style="width: 100%">
                                <a href="<?= $n->content; ?>" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>

<?= $this->endSection() ?>