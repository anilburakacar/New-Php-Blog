<?php require admin_view('static/header')?>

<div class="box-">
        <h1>
            Kategori Ekle
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="box-">
        <form action="" class="form label" method="post">
            <ul>
                <li>
                    <label>Kategori Adı</label>
                    <div class="form-content">
                        <input type="text" id="title" name="category_name" value="<?=post('category_name')?>">
                    </div>
                </li>
               
               


            <br>
            <h1>Tema Ayarları</h1> <br>
                <ul>

                <li>
                    <label>SEO Url</label>
                    <div class="form-content">
                        <input type="text" name="category_url" value="<?=post('category_url')?>">
                        <p>Eğer boş bırakyıysanız kategorinin ismini alır.</p>
                    </div>
                </li>

                <li>
                    <label>SEO Title</label>
                    <div class="form-content">
                        <input type="text" name="category_seo[title]">
                    </div>
                </li>

                <li>
                    <label>SEO Description</label>
                    <div class="form-content">
                        <textarea name="category_seo[decription]" cols="30" rows="5"></textarea>
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

