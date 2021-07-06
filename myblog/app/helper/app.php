<?php
//controllerimizi çağrımak için hem de index.php kısaltmak için oluşturduk
function controller($controllerName){
    $controllerName = strtolower($controllerName);
    return PATH . '/app/controller/' . $controllerName . '.php';
}
//view dosyalarını çağırmak için, settingleri de ekledik temaları çekmek için
function view($viewName){
    return PATH . '/app/view/' . setting('theme') . '/' . $viewName . '.php';
}

//route değişkenini düzenledik
function route($index)
{
    global $route;
    return isset($route[$index]) ? $route[$index] : false;
}

//ayarlar fonksiyonu bu fonksiyonla her yerde gösterebiliriz
function setting($name){
    //appdeki settingsten çektik
    global $settings;
    //varsa yazdır
    return isset($settings[$name]) ? $settings[$name] : false ;

}
