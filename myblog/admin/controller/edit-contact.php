<?php

$id = get('id');
if (!$id){
    header('Location:' . admin_url('contact'));
    exit;
}

$row = $db->prepare('SELECT * FROM `contact` WHERE contact_id = ?');
$row->execute([$id]);
$row = $row->fetch(PDO::FETCH_ASSOC);


if(!$row){
    header('Location:' . admin_url('contact'));
    exit;
}

if($row['contact_read'] == 0 ){
    $query = $db->prepare('UPDATE contact set contact_read = ?, contact_read_date = ? where contact_id = ?');
    $query->execute([1, date('Y-m-d H:i:s'), $id]);
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

require admin_view('edit-contact');
