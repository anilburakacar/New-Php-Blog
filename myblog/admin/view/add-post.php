<?php require admin_view('static/header')?>

<div class="box-">
        <h1>
            Konu Ekle
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="box-">
        <form action="" class="form label" method="post">
            <ul>
                <li>
                    <label>Konu Başlığı</label>
                    <div class="form-content">
                    <input type="text" name="post_title" value="<?=post('post_title')?>">
                    </div>
                </li>
               
                <li>
                    <label>Konu (Kısa) İçeriği</label>
                    <div class="form-content">
                        <textarea name="post_short_content" cols="30" rows="5"><?=post('post_short_content')?></textarea>
                    </div>
                </li>

                <li>
                    <label>Konu İçeriği</label>
                    <div class="form-content">
                        <textarea name="post_content" cols="30" rows="5"><?=post('post_content')?></textarea>
                    </div>
                </li>

                <li>
                            <label>Konu Kategorisi</label>
                            <div class="form-content">
                                <select name="post_categories[]" multiple size="6">
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= $category['category_id'] ?>"><?=$category['category_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                </li>

                <li>
                    <label>Konu Durumu</label>
                    <div class="form-content">
                        <select name="post_status" id="">
                                <option value="1" <?=post('post_status') == 1 ? 'selected' : null ?>>Yayında</option>
                                <option value="2" <?=post('post_status') == 2 ? 'selected' : null ?>>Taslak</option>
                        </select>
                    </div>
                </li>

                <li>
                    <label>Konu Etiketleri</label>
                    <div class="form-content">
                        <textarea name="post_tags" cols="30" rows="5"><?=post('post_tags')?></textarea>
                        <p>
                            Birden fazla etiketi alt alta yazın.
                        </p>
                    </div>
                </li>
               

                  <br>                  


                  <h1>Seo Ayarları</h1> <br>
                <ul>

                <li>
                    <label>SEO Url</label>
                    <div class="form-content">
                        <input type="text" name="post_url" value="<?=post('post_url')?>">
                        <p>Eğer boş bırakyıysanız kategorinin ismini alır.</p>
                    </div>
                </li>

                <li>
                    <label>SEO Title</label>
                    <div class="form-content">
                        <input type="text" name="post_seo[title]">
                    </div>
                </li>

                <li>
                    <label>SEO Description</label>
                    <div class="form-content">
                        <textarea name="post_seo[decription]" cols="30" rows="5"></textarea>
                    </div>
                </li>


               <ul>
               
                <li class="submit">
                    <input type="hidden" name="submit" value="1">
                    <button type="submit">Ayarları Kaydet</button>
                </li>
            </ul>
        </form>
    </div>

<?php require admin_view('static/footer')?>

