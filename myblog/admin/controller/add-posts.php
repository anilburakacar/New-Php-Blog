<?php

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
        $query = $db->prepare('SELECT * FROM posts where post_url = ?');
        $query->execute([$post_url]);
        $query = $query->fetch(PDO::FETCH_ASSOC);

        if($query){
            $error = '<strong>' . $post_title . '</strong> adında zaten var, lütfen başka ekleyin.';

        }else{
            $query = $db->prepare('INSERT posts set post_title = ?, post_url = ? , post_content = ?, post_categories = ?, post_short_content = ?, post_seo = ?, post_status = ? ');
            $query->execute([$post_title, $post_url, $post_content, $post_categories, $post_short_content, $post_seo, $post_status]);
            header('Location:' . admin_url('posts'));
          if($query){
                $postID = $db->lastInsertId();
                //etiketleri kontrol edicem
                $post_tags =explode("\n", $post_tags);
                foreach($post_tags as $tag){
                    $row = $db->prepare('SELECT * FROM tags where tag_url = ?');
                    $row->execute([$tag]);
                    $row = $row->fetch(PDO::FETCH_ASSOC);

                    if(!$row){
                        $tagInsert = $db->prepare('INSERT tags set tag_name = ?, tag_url = ? ');
                        $tagInsert->execute([$tag, $tag]);

                        $tagId = $db->lastInsertId();
                    }else{
                        $tag = $row['tag_id'];
                    }
                    //konuya ait etiket var mı
                    $row = $db->prepare('SELECT * FROM post_tags where tag_post_id = ?, tag_id = ? ');
                    $row->execute([$postID, $tagId]);
                    $row = $row->fetch(PDO::FETCH_ASSOC);

                    if(!$row){
                        $db->prepare('INSERT post_tags set tag_post_id = ?, tag_id = ? ');
                        $db->execute([$postID, $tagId]);
                    }
                }


                header('Location:' . admin_url('posts'));
            }else{
                $error = 'Bir sorun oluştu';
            }
        }
    }
}

require admin_view('add-post');