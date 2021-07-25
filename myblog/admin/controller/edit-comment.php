<?php

$id = get('id');
if (!$id){
    header('Location:' . admin_url('comments'));
    exit;
}

$row = $db->prepare('SELECT * FROM comments 
left join users on users.user_id = comments.comment_user_id
where comment_id = ?');
$row->execute([$id]);
$row = $row->fetch(PDO::FETCH_ASSOC);


if(!$row){
    header('Location:' . admin_url('comments'));
    exit;
}


if (post('submit')){

    if ($data = form_control('comment_status')){

        $data['comment_status'] = post('comment_status');

        $query = $db->prepare('UPDATE comments set comment_name = ?, comment_email = ?, comment_content = ?, comment_status = ? where comment_id = ?');
        $query->execute([$data['comment_name'], $data['comment_email'], $data['comment_content'], $data['comment_status'], $id]);

        if ($query){
            header('Location:' . admin_url('comments'));
        } else {
            $error = 'Bir sorun oluştu.';
        }

    } else {
        $error = 'Eksik alanlar var, lütfen kontrol edin.';
    }

}

require admin_view('edit-comment');
