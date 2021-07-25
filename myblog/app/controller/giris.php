<?php

$meta = [
    'title' => setting('Giriş Yap')
];

if(post('submit')){

    $username = post('username');
    $password = post('password');

    if(!$username){
        $error = 'Lütfen kullanıcı adınızı yazın.';
    }elseif(!$password){
        $error = 'Lütfen şifrenizi girin.';
    }else{
        //üye kontrolü
        /*
        $query = $db->prepare('select *from users where user_name = :username');
        $query->execute([
            'username' => $username
        ]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        */

        //clasımızdan yapacağız
        $row = User::userExist($username);
        print_r($row);

        if($row){
            echo $password;
            echo  $row['user_password'];
            //parola kontrolü
            //password fonksiyonu : password_verify
            $password_verify = password_verify($password, $row['user_password']);
            echo $password_verify;
            if($password_verify){
                $success = 'Başarıyla giriş yaptınız, yönlendiriliyorsunuz.';
                //verileri session ile alalım
                /*
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
                */
                //karışık olmaması için sessionları classa yazdım
                //rowda zaten id ve name var
                User::Login($row);

                header('Refresh:2;url=' . site_url());

            }else{
                $error = 'Şifreniz hatalı, lütfen kontrol edin!';
            }

        }else{
            $error = 'Böyle bir kullanıcı sistemde kayıtlı gözükmüyor.';
        }
    }
}

require view('login');