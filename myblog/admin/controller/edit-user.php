<?php

$id = get('id');
if (!$id){
    header('Location:' . admin_url('users'));
    exit;
}

$row = $db->prepare('SELECT * FROM `users` WHERE user_id = ?');
$row->execute([$id]);
$row = $row->fetch(PDO::FETCH_ASSOC);


if(!$row){
    header('Location:' . admin_url('users'));
    exit;
}


if (post('submit')){

    if ($data = form_control('user_email')){

        $query = $db->prepare('UPDATE users set user_name = ?, user_email = ? where user_id = ?');
        $query->execute([$data['user_name'], $data['user_email'], $id]);

        if ($query){
            header('Location:' . admin_url('users'));
        } else {
            $error = 'Bir sorun oluştu.';
        }

    } else {
        $error = 'Eksik alanlar var, lütfen kontrol edin.';
    }

}

require admin_view('edit-user');
