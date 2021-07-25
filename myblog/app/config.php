<?php

//realpath verisi nerede olduğumuzu belirtir
define('PATH', realpath('.'));
//ben öylesine oluşturdum
define('SUBFOLDER', true);

define('URL', 'http://localhost/myblog');

//veritaban verilerimiz
return [
    'db' => [
        'name' => 'myblog',
        'host' => 'localhost',
        'user' => 'root',
    ]
];