<?php

$meta = [
    'title' => setting('Kayıt Ol')
];

if(post('submit')){

    $username = post('username');
    $email = post('email');
    $password = post('password');
    $password_again = post('password_again');

    if(!$username){
        $error = 'Lütfen kullanıcı adınızı yazın.';
    }elseif(!$email){
        $error = 'Lütfen e-posta adresinizi yazın.';
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){//email kontrolü bu şekilde yapılır
        $error = 'Lütfen geçerli bir e-posta adresi yazın.';
    }elseif(!$password || !$password_again){
        $error = 'Lütfen şifrenizi girin.';
    }elseif($password != $password_again){
        $error = 'Girdiğiniz şifreler birbirleriyle uyuşmuyor.';
    }else{
        //aynı üyeden var mı diye kontrol edeceğiz
        $query = $db->prepare('SELECT * FROM users WHERE user_name = :username || user_email = :email');
        $query->execute([
            'username' => $username,
            'email' => $email
        ]);

        $row = $query->fetch(PDO::FETCH_ASSOC);

        if ($row){
            $error = 'Bu kullanıcı adı ya da e-posta zaten kullanılıyor. Lütfen başka bir tane deneyin.';
        } else {
            //şimdi üye ekleyelim
            $query = $db->prepare('INSERT INTO users SET user_name = :username,  user_email = :email, user_password = :password ');
            $result = $query->execute([
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);

            if($result){
                $success = 'Üyeliğiniz başarıyla oluşturuldu, yönlendiriliyorsunuz.';
                header('Refresh:2;url=' .site_url());
            }else{
                $error = 'Bir sorun oluştu, lütfen daha sonra tekrar deneyin.';
            }
        }
    }
}

require view('register');