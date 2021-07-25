<?php

if($data = form_control('phone')){

    //email kontrolü
    if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        $json['error'] = 'Lütfen geçerli bir e-posta adresi girin.';
    }else{

    $query = $db->prepare('INSERT contact set contact_name = ?, contact_email = ? , contact_phone = ?, contact_subject = ?, contact_message = ?');
    $query->execute([$data['name'], $data['email'], $data['phone'], $data['subject'], $data['message']]);

    if($query){
        $json['success'] = 'Mesajınız bize ulaştı, teşekkür ederiz.';
    }else{
        $json['error'] = 'Bir sorun oluştu ve mesajınız gönderilemedi.';
    }
    }
}else{
    $json['error'] = 'Lütfen tüm alanları doldurup tekrar deneyin.';
}

