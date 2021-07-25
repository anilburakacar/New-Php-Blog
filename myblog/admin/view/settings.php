<?php require admin_view('static/header')?>

<div class="box-">
        <h1>
            Ayarlar
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="box-">
        <form action="" class="form label" method="post">
            <ul>
                <li>
                    <label>Site Title</label>
                    <div class="form-content">
                        <input type="text" id="title" name="settings[title]" value="<?=setting('title')?>">
                    </div>
                </li>
               
                <li>
                    <label>Site Description</label>
                    <div class="form-content">
                        <input type="text" id="title" name="settings[description]" value="<?=setting('description')?>">
                    </div>
                </li>
               
                <li>
                    <label>Site Keywords</label>
                    <div class="form-content">
                        <input type="text" id="title" name="settings[keywords]" value="<?=setting('keywords')?>">
                    </div>
                </li>

                <li>
                    <label>Site Tema</label>
                    <div class="form-content">
                        <select name="settings[theme]">
                            <option value="">--tema seç--</option>
                            <?php foreach($themes as $theme): ?>
                                <option <?=setting('theme') == $theme ? 'selected' : null ?> value="<?=$theme?>"><?=$theme?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </li>

                <h1>Bakım Modu Ayarları</h1> <br>
            <ul>
                <li>
                    <label>Bakım Modu Açık mı?</label>
                    <div class="form-content">
                        <select name="settings[maintenance_mode]">
                            <option <?=setting('maintenance_mode') == 1 ? ' selected ' : null?> value="1">Evet</option>
                            <option <?=setting('maintenance_mode') == 2 ? ' selected ' : null?> value="2">Hayır</option>
                        </select>
                    </div>
                </li>
                <li>
                    <label>Bakım Modu Title</label>
                    <div class="form-content">
                        <input type="text" name="settings[maintenance_mode_title]" value="<?= setting('maintenance_mode_title') ?>">
                    </div>
                </li>
                <li>
                    <label>Bakım Modu Açıklama</label>
                    <div class="form-content">
                        <textarea name="settings[maintenance_mode_description]" cols="30" rows="5"><?= setting('maintenance_mode_description') ?></textarea>
                    </div>
                </li>
            </ul>
            <br>
            <h1>Yorum Ayarları</h1>
            <ul>
                        <li>
                            <label>Ziyaretçi Yorumu</label>
                            <div class="form-content">
                                <select name="settings[visitor_comment]">
                                    <option value="1" <?=setting('visitor_comment') == 1 ? ' selected' : null?>>Onaylı</option>
                                    <option value="2" <?=setting('visitor_comment') == 2 ? ' selected' : null?>>Onaylı Değil</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <label>Üye Yorumu</label>
                            <div class="form-content">
                                <select name="settings[user_comment]">
                                    <option value="1" <?=setting('user_comment') == 1 ? ' selected' : null?>>Onaylı</option>
                                    <option value="2" <?=setting('user_comment') == 2 ? ' selected' : null?>>Onaylı Değil</option>
                                </select>
                            </div>
                        </li>
                    </ul>
            <br>
            <h1>SMTP Mail Ayarları</h1>
            <ul>
                <li>
                <label>SMTP Host</label>
                    <div class="form-content">
                        <input type="text" name="settings[smpt_host]" value="<?= setting('smpt_host') ?>">
                    </div>
                </li>

                <li>
                <label>SMTP E-posta Adresi</label>
                    <div class="form-content">
                        <input type="text" name="settings[smpt_email]" value="<?= setting('smpt_email') ?>">
                    </div>
                </li>

                <li>
                <label>SMTP E-posta Şifresi</label>
                    <div class="form-content">
                        <input type="text" name="settings[smpt_password]" value="<?= setting('smpt_password') ?>">
                    </div>
                </li>

                <li>
                    <label>SMTP Secure</label>
                    <div class="form-content">
                        <select name="settings[smtp_secure]">
                            <option <?= setting('smtp_secure') == 'ssl' ? ' selected' : null ?> value="ssl">SSL</option>
                            <option <?= setting('smtp_secure') == 'tls' ? ' selected' : null ?> value="tls">TLS</option>
                        </select>
                    </div>
                </li>

                <li>
                <label>SMTP Port</label>
                    <div class="form-content">
                        <input type="text" name="settings[smpt_port]" value="<?= setting('smpt_port') ?>">
                    </div>
                </li>

                <li>
                <label>SMTP Gönderen <br> E-posta Adresi:</label>
                    <div class="form-content">
                        <input type="text" name="settings[smpt_send_email]" value="<?= setting('smpt_send_email') ?>">
                    </div>
                </li>

                <li>
                <label>SMTP Gönderen <br> Ad Soyad:</label>
                    <div class="form-content">
                        <input type="text" name="settings[smpt_send_name]" value="<?= setting('smpt_send_name') ?>">
                    </div>
                </li>

            </ul>

            <br>
            <h1>Tema Ayarları</h1> <br>
                <ul>
                <li>
                    <label>Logo Başlığı</label>
                    <div class="form-content">
                        <input type="text" name="settings[logo]" value="<?= setting('logo') ?>">
                    </div>
                </li>

                <li>
                    <label>Arama İnput Placeholder</label>
                    <div class="form-content">
                        <input type="text" name="settings[search_placeholder]" value="<?= setting('search_placeholder') ?>">
                    </div>
                </li>

                <li>
                    <label>Footer Hakkımda</label>
                    <div class="form-content">
                        <textarea name="settings[about]" cols="30" rows="5"><?= setting('about') ?></textarea>
                    </div>
                </li>


                <li>
                    <label>Facebook</label>
                    <div class="form-content">
                        <input type="text" name="settings[facebook]" value="<?= setting('facebook') ?>">
                    </div>
                </li>

                <li>
                    <label>Twitter</label>
                    <div class="form-content">
                        <input type="text" name="settings[twitter]" value="<?= setting('twitter') ?>">
                    </div>
                </li>


                <li>
                    <label>Instagram</label>
                    <div class="form-content">
                        <input type="text" name="settings[instagram]" value="<?= setting('instagram') ?>">
                    </div>
                </li>


                <li>
                    <label>Linkedin</label>
                    <div class="form-content">
                        <input type="text" name="settings[linkedin]" value="<?= setting('linkedin') ?>">
                    </div>
                </li>

                <li>
                    <label>Hoşgeldin Başlık</label>
                    <div class="form-content">
                        <input type="text" name="settings[welcome_title]" value="<?= setting('welcome_title') ?>">
                    </div>
                </li>

                <li>
                    <label>Hoşgeldin Yazı</label>
                    <div class="form-content">
                        <textarea name="settings[welcome_text]" cols="30" rows="5"><?= setting('welcome_text') ?></textarea>
                    </div>
                </li>


                </ul>                
            <ul>
               
                <li class="submit">
                    <input type="hidden" name="submit" value="1">
                    <button type="submit">Ayarları Kaydet</button>
                </li>
            </ul>
        </form>
    </div>

<?php require admin_view('static/footer')?>

