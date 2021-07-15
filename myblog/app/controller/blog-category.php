<?php

$category_url = route(2);
if(!$category_url){
    header('Location:' . site_url('404'));
    exit;
}

$category = $db->prepare('SELECT * FROM categories where category_url = ?');
$category->execute([$category_url]);
$category  = $category ->fetch(PDO::FETCH_ASSOC);
if(!$category ){
    header('Location:' . site_url('404'));
    exit;
}

$seo = json_decode($category['category_seo'], true);


$meta = [
        'title' => $seo['title'] ? $seo['title'] : $category['category_name'],
        //'description' => $seo['description'] ? $seo['description'] : null
];

$query = $db->prepare('select posts.*, group_concat(category_name) as category_name,
group_concat(category_url) as category_url
from posts
inner join categories on find_in_set(categories.`category_id`, posts.`post_categories`) and find_in_set(posts.`post_categories`, ? )
where post_status = ? 
group by posts.post_id 
order by post_id asc');
$query->execute([1, $category['category_id']]);
$query = $query->fetchAll(PDO::FETCH_ASSOC);


require view('blog-category');