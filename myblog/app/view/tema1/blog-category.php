<?php require view('static/header') ?>


<section class="jumbotron text-center">
    <div class="container">
        <h1><?=$category['category_name']?></h1>
        <div class="breadcrumb-custom">
            <a href="<?= site_url() ?>">Anasayfa</a> /
            <a href="<?= site_url('blog') ?>">Blog</a> /
            <a href="<?= site_url('kategori/' . $category['category_url']) ?>"
               class="active"><?= $category['category_name'] ?></a>
        </div>
    </div>
    
</section>
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <h4 class="pb-3">Son Konular</h4>

            <?php foreach ($query as $row): ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <?= $row['category_name'] ?>
                            <div class="date">
                                <?= $row['post_date'] ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['post_title'] ?></h5>
                            <div class="card-text">
                                <?= htmlspecialchars_decode($row['post_short_content']) ?>
                            </div>
                            <a href="<?= site_url('blog/' . $row['post_url']) ?>" class="btn btn-dark">Görüntüle</a>
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
                <li class="list-group-item <?=$category['category_url'] ==route(2) ? 'active' : null ?>">
                    <a href="<?= site_url('blog/kategori/' . $category['category_url']) ?>" style="color: #333;" class="d-flex justify-content-between align-items-center">
                        <?=$category['category_name']?>
                        <span class="badge badge-dark badge-pill"><?=$category['total']?></span> 
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

<?php require view('static/footer') ?>

