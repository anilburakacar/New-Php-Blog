<?php
//admin için yaptık
if (!route(1)){
    $route[1] = 'index';
}

if (!file_exists(admin_controller(route(1)))){
    $route[1] = 'index';
}
//yönetici girişi
if (!session('user_rank') || session('user_rank') == 3){
    $route[1] = 'login';
}

//mainurller=>index, users, settings
$menus = [
    'index' => [
        'title' => 'Anasayfa',
        'icon' => 'tachometer'
    ],
    'users' => [
        'title' => 'Üyeler',
        'icon' => 'user'
        //'submenu' => [
            //'users' => 'Üyeleri Liste'
       // ]
    ],
    'posts' => [
        'title' => 'Konular',
        'icon' => 'rss'
    ],
    'categories' => [
        'title' => 'Kategoriler',
        'icon' => 'folder'
    ],
    'contact' => [
        'title' => 'İletişim Mesajları',
        'icon' => 'envelope'
    ],
    'settings' => [
        'title' => 'Ayarlar',
        'icon' => 'cog'
    ]
];


require admin_controller(route(1));