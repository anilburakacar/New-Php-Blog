<?php

//ziyaret
$name = post('name');
$email = post('email');
$post_id = post('post_id');
$comment = post('comment');

//üye
if(session('user_id')){
    $name = session('user_name');
    $email = session('user_email');
}

if(!$name || !$email || !$post_id){
    $json['error'] = 'Lütfen adınızı ve e-posta adresinizi belirtin.';
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $json['error'] = 'Lütfen geçerli bir e-posta adresi belirtin.';
}elseif(!$comment){
    $json['error'] = 'Lütfen yorumunuzu belirtin.';
}else{
    //giriş yapmışşsa
    if(session('user_id')){
        $status = setting('user_comment') == 1 ? 1 : 0;
    }else{
        $status = setting('visitor_comment') == 1 ? 1 : 0;
    }
    //blog konusunu bul
  /* $row = Blog::findPostById($post_id);
    if(!$row){
        $json['error'] = 'Beklenmedik bir hata oluştu';
    }else{*/
        //yorumu ekle


        $insert = $db->prepare('INSERT INTO comments SET comment_user_id = ?, comment_post_id = ?, comment_name = ?, comment_email = ?, comment_content = ?, comment_status = ? ');
        $insert = $insert->execute([
            session('user_id'), $post_id, $name, $email, $comment, $status
        ]);

        if($insert){
            if ($status == 0){
                $json['success'] = 'Yorumunuz gönderildi. Onaylandıktan sonra yayınlanacaktır. Teşekkürler.';
            }else {
                $json['success'] = 'Yorumunuz yapıldı.';
/*
                $comment['comment_date'] = date('Y-m-d H:i:s');
                ob_start();
                require view('static/comment');
                $output = ob_get_clean();
                $json['comment'] = $output;
*/
            }
        }else{
            $json['error'] = 'Yorumunuzu eklerken bir hata oldu.';
        }
    }
