<?php

if(post('submit')){

    $category_name = post('category_name');
    $category_url = post('category_url');
    if(!post('category_url')){
        $category_url = $category_name;
    }
    $category_seo = json_encode(post('category_seo'));
    if(!$category_name || !$category_url){
        $error = 'Lütfen kategori adını belirtin';
    }else{
        $query = $db->prepare('SELECT * FROM categories where category_url = ?');
        $query->execute([$category_url]);
        $query = $query->fetch(PDO::FETCH_ASSOC);

        if($query){
            $error = '<strong>' . $category_name . '</strong> adında zaten var, lütfen başka ekleyin.';

        }else{
            $query = $db->prepare('INSERT categories set category_name = ?, category_url = ? , category_seo = ?');
            $query->execute([$category_name, $category_url, $category_seo]);

            if($query){
                header('Location:' . admin_url('categories'));
            }else{
                $error = 'Bir sorun oluştu';
            }
        }
    }
}

require admin_view('add-category');