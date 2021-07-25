<?php require admin_view('static/header')?>

<div class="box-">
        <h1>
            Kategoriler
           <a href="<?=admin_url('add-category')?>">Yeni Ekle</a>
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Kategori Adı</th>
                    <th class="hide">Eklenme Tarihi</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($query as $row): ?>
                <tr>
                    <td>
                        <a href="<?= admin_url('edit-category?id=' . $row['category_id']) ?>" class="title">
                            <?=$row['category_name']?>
                        </a>
                    </td>
                    <td class="hide">
                    <?=$row['category_date']?>
                    </td>
                    <td>
                    <a href="<?= admin_url('edit-category?id=' . $row['category_id']) ?>" class="btn">Düzenle</a>
                        <a onclick="return confirm('Silme işlemine devam ediyorsunuz?')"
                           href="<?= admin_url('delete?table=categories&column=category_id&id=' . $row['category_id']) ?>"
                           class="btn">Sil</a>
                    </td>
                </tr>
              
               <?php endforeach; ?>
            </tbody>
        </table>
    </div>

   


<?php require admin_view('static/footer')?>

