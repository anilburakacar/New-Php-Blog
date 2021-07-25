<?php
// site ve public oluşturarak kısalttık
function site_url($url = false)
{
    return URL . '/' . $url;
}

//temaları çekmek için
function public_url($url = false)
{
    return URL . '/public/' . setting('theme') . '/' . $url;
}

//error değişkenini fonksiyon yapalım 
function error(){
    global $error;
    return isset($error) ? $error : false;
}

function success(){
    global $success;
    return isset($success) ? $success : false;
}