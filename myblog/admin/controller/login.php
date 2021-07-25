<?php

if (post('submit')){
    if ($data = form_control()){

        $row = $db->prepare('SELECT * FROM `users` WHERE user_name = ? and user_id = ?  ');
        $row->execute([$data['user_name'], 1 ]);
        $row = $row->fetch(PDO::FETCH_ASSOC);
        if (!$row){
            $error = 'Yetkiniz yok.';
        } else {
            print_r($data['user_password']); 
            echo '<br>';
            print_r($row['user_password']);
            //giriş sıkıntılı
            $password_verify = password_verify($data['user_password'], $row['user_password']);
            echo $password_verify;
            if (!$password_verify){
                    User::Login($row);
                    header('Location:' . admin_url());
            } else {
                $error = 'Girdiğiniz şifre hatalı, lütfen kontrol edin.';
            }

        }

    } else {
        $error = 'Lütfen bilgileriniz girin.';
    }
}

require admin_view('login');



