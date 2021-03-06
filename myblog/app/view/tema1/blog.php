<?php require view('static/header') ?>


<section class="jumbotron text-center"  style="height:400px; background-image: url('https://media.wired.com/photos/5cc244c9af643e2f373ebb28/191:100/w_2400,h_1256,c_limit/Coding-Becomes-Criminal.jpg');">
    <div class="container text-light">
        <h1>BLOG</h1>
        <div class="breadcrumb-custom">
            <a href="#">Anasayfa</a> /
            <a style="text-light" href="#" class="active">Blog</a>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <h4 class="pb-3">Son Konular</h4>
            <?php foreach($query as $row):?>
            <div class="card mb-3">
                <div class="card-header">
                    <?=$row['category_name']?>
                    <div class="date">
                        <?=$row['post_date']?>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?=$row['post_title']?></h5>
                    <div class="card-text">
                    <?=htmlspecialchars_decode($row['post_short_content'])?>
                    </div>
                    <br>
                    <a href="<?=site_url('blog/' .$row['post_url'])?>" class="btn btn-dark">Görüntüle</a>
                </div>
            </div>

           
            <?php endforeach; ?>

       

        </div>
        <div class="col-md-4">
            <h4 class="pb-3">
                <i class="fa fa-folder"></i>
                Kategoriler
            </h4>
            <ul class="list-group mb-4">
                <?php foreach (Blog::Categories() as $category): ?>
                    <li class="list-group-item">
                        <a href="<?= site_url('blog/kategori/' . $category['category_url']) ?>" style="color: #333;"
                           class="d-flex justify-content-between align-items-center">
                            <?= $category['category_name'] ?>
                            <span class="badge badge-dark badge-pill"><?=$category['total']?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <!--
            <h4 class="pb-3">
                <i class="fa fa-hashtag"></i>
                Etiketler
            </h4>
            <a href="#" class="badge badge-light badge-pill">html5 video</a>
            <a href="#" class="badge badge-light badge-pill">html5 audio</a>
            <a href="#" class="badge badge-light badge-pill">css ie7</a>
            <a href="#" class="badge badge-light badge-pill">jquery dersleri</a>
            <a href="#" class="badge badge-light badge-pill">css3 calc()</a>
            <a href="#" class="badge badge-light badge-pill">php array_shift()</a>
            <a href="#" class="badge badge-light badge-pill">gökhan toy</a>
            <a href="#" class="badge badge-light badge-pill">aile</a>
            <a href="#" class="badge badge-light badge-pill">hayat</a>
                -->
        </div>
    </div>

<?php require view('static/footer') ?>

