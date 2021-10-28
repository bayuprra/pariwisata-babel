<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <?= $this->renderSection('style') ?>
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"
            integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Traveloha</a>
        <form class="form-inline" id="formItem">
            <input class="form-control mr-sm-2" type="search" placeholder="Search"  id="keyword" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="searchItem">Search</button>
        </form>
        <button class="btn btn-primary" id="cart"><i class="fas fa-shopping-cart"></i>(0)</button>
    </nav>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- content -->
        <?= $this->renderSection('content') ?>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?= $this->renderSection('script') ?>
</body>
</html>