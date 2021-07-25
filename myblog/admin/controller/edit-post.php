<?php

$id = get('id');
if(!$id){
    header('Location:' . admin_url('posts'));
    exit;
}

$row = $db->prepare('SELECT * FROM posts where post_id = ?');
$row->execute([$id]);
$row = $row->fetch(PDO::FETCH_ASSOC);
if(!$row){
    header('Location:' . admin_url('posts'));
    exit;
}

$categories = $db->prepare('SELECT * FROM categories order by category_name asc');
$categories->execute();
$categories = $categories->fetchAll(PDO::FETCH_ASSOC);


if(post('submit')){

    $post_title = post('post_title');
    $post_url = post('post_url');
    if(!post('post_url')){
        $post_url = $post_title;
    }
    $post_content = post('post_content');
    $post_short_content = post('post_short_content');
    $post_categories = implode(',', post('post_categories'));
    $post_status = post('post_status');
    $post_tags = post('post_tags');
    $post_seo = json_encode(post('post_seo'));

    if(!$post_url|| !$post_content || !$post_status || !$post_categories ){
        $error = 'Lütfen tüm alanları doldurun.';
    }else{
        //konu kontrolü
        $query = $db->prepare('SELECT * FROM posts where post_url = ? and post_id != ?'); 
        $query->execute([$post_url, $id]);
        $query = $query->fetch(PDO::FETCH_ASSOC);

        if($query){
            $error = '<strong>' . $post_title . '</strong> adında zaten var, lütfen başka ekleyin.';

        }else{
            $query = $db->prepare('UPDATE posts set post_title = ?, post_url = ? , post_content = ?, post_short_content = ?, post_categories = ?, post_seo = ?, post_status = ? where post_id = ?');
            $query->execute([$post_title, $post_url, $post_content, $post_short_content, $post_categories, $post_seo, $post_status, $id]);
            
          if($query){
                header('Location:' . admin_url('posts'));
            }else{
                $error = 'Bir sorun oluştu';
            }
        }
    }
}

$seo = json_decode($row['post_seo'], true);

require admin_view('edit-post');