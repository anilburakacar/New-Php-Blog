<?php require admin_view('static/header')?>

<div class="box-">
        <h1>
            Yorumlar
        </h1>
    </div>


    <div class="filter">
        <ul>
            <li class="<?=!get('status') ? 'active' : null?>">
                <a href="<?=admin_url('comments')?>">
                    Tümü
                </a>
            </li>
            <li class="<?=get('status') == 1 ? 'active' : null?>">
                <a href="<?=admin_url('comments?status=1')?>">
                    Onaylananlar
                </a>
            </li>
            <li class="<?=get('status') == 2 ? 'active' : null?>">
                <a href="<?=admin_url('comments?status=2')?>">
                    Onay Bekleyenler
                </a>
            </li>
        </ul>
    </div>


    <div class="table">
        <table>
            <thead>
                <tr>
                <th width="10"></th>
                <th>Yorum</th>
                <th>Konu</th>
                <th class="hide">Yazım Tarihi</th>
                <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($query as $row): ?>
                <tr>
                <td>
                        <img src="<?= get_gravatar($row['comment_email']) ?>" alt="" height="40"
                             style="border-radius: 50%">
                    </td>
                    <td>
                    <p style="font-size: 12px; color: #666;">
                        <?=$row['comment_name']?> (<?=$row['comment_email']?>)
                        <?php if ($row['comment_status'] == 0): ?>
                                <span style="background: #999; margin-left: 10px; border-radius: 3px; color:#fff; padding: 2px 5px;">Onay bekliyor</span>
                            <?php endif; ?>
                        </p>
                        <p>
                        <?=$row['comment_content']?>
                        </p>
                    </td>
                    <td>
                   <!--post title yapılacak -->
                    </td>
                    <td class="hide">
                    <?=$row['comment_date']?>
                    </td>
                    <td>
                    <a href="<?= admin_url('edit-comment?id=' . $row['comment_id']) ?>" class="btn">Düzenle</a>
                        <a onclick="return confirm('Silme işlemine devam ediyorsunuz?')"
                           href="<?= admin_url('delete?table=comments&column=comment_id&id=' . $row['comment_id']) ?>"
                           class="btn">Sil</a>
                    </td>
                </tr>
              
               <?php endforeach; ?>
            </tbody>
        </table>
    </div>

   


<?php require admin_view('static/footer')?>

