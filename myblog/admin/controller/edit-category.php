<?php

$id = get('id');
if (!$id){
    header('Location:' . admin_url('categories'));
    exit;
}

    $row = $db->prepare('SELECT * FROM categories where category_id = ?');
    $row->execute([$id]);
    $row = $row->fetch(PDO::FETCH_ASSOC);
    if(!$row){
        header('Location:' . admin_url('categories'));
        exit;
    }

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
        $query = $db->prepare('SELECT * FROM categories where category_url = ? and category_id != ?');
        $query->execute([$category_url, $id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);

        if($query){
            $error = '<strong>' . $category_name . '</strong> adında zaten var, lütfen başka ekleyin.';

        }else{
            $query = $db->prepare('UPDATE categories set category_name = ?, category_url = ? , category_seo = ? WHERE category_id = ?');
            $query->execute([$category_name, $category_url, $category_seo, $id]);

            if($query){
                header('Location:' . admin_url('categories'));
            }else{
                $error = 'Bir sorun oluştu';
            }
        }
    }
}

$category_seo = json_decode($row['category_seo'], true);

require admin_view('edit-category');