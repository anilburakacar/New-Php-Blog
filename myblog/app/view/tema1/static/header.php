<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $meta['title'] ?></title>

    <?php if (isset($meta['description'])): ?>
        <meta name="description" content="<?= $meta['description'] ?>">
    <?php endif; ?>

    <?php if (isset($meta['keywords'])): ?>
        <meta name="keywords" content="<?= $meta['keywords'] ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var api_url = '<?=site_url('api')?>';
    </script>
    <script src="<?=public_url('scripts/api.js')?>"></script>

    <link rel="stylesheet" href="<?= public_url('styles/main.css') ?>">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?=site_url()?>"><i class="fab fa-autoprefixer"></i><?=setting('logo')?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" style="font-size:22px;">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=site_url()?>">Anasayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('blog')?>">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('about-us')?>">Hakkımda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('iletisim')?>">İletişim</a>
                </li>
            </ul>
            <!--
            <form class="form-inline my-2 my-lg-0 mr-3">
                <input class="form-control mr-sm-2" type="search" placeholder="<?=setting('search_placeholder')?>" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Ara</button>
            </form>
    -->
            <!--Giriş yaptı ise kontrolü -->
            <?php if(session('user_id')): ?>
                <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=session('user_name')?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                   <!-- <a class="dropdown-item" href="<?=site_url('profil')?>">Profil</a> -->
                    <a class="dropdown-item" href="<?=site_url('cikis')?>">Çıkış Yap</a>
                </div>
            </div>
            <?php else: ?>
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Giriş Yap
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?=site_url('giris')?>">Giriş Yap</a>
                    <a class="dropdown-item" href="<?=site_url('kayit')?>">Kayıt Ol</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</nav>