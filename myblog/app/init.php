<?php

//oturumu başlattık
session_start();
ob_start();

//sınıfları otomatik olarak allıyoruz
function loadClasses($className)
{
    require __DIR__ . '/classes/' . strtolower($className) . '.php';
}
spl_autoload_register('loadClasses');

//veritabanı bağlantısı
$config = require __DIR__ . '/config.php';

try {
    $db = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'], $config['db']['user']);
} catch (PDOException $e){
    die($e->getMessage());
}

//ayarları çağırdık
require __DIR__ . '/settings.php';

//helperın içindeki dosyaları tarama
foreach (glob(__DIR__ . '/helper/*.php') as $helperFile){
    require $helperFile;
}