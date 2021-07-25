<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Üye Düzenle
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="box-">
        <form action="" method="post" class="form label">
            <ul>
                <li>
                    <label>Kullanıcı Adı</label>
                    <div class="form-content">
                        <input type="text" name="user_name"
                               value="<?= post('[user_name]') ? post('[user_name]') : $row['user_name'] ?>">
                    </div>
                </li>
                <li>
                    <label>E-posta</label>
                    <div class="form-content">
                        <input type="text" name="user_email"
                               value="<?= post('user_email') ? post('user_email') : $row['user_email'] ?>">
                    </div>
                </li>
                
               

                <li class="submit">
                    <button name="submit" value="1" type="submit">Kaydet</button>
                </li>
            </ul>
        </form>
    </div>

<?php require admin_view('static/footer') ?>