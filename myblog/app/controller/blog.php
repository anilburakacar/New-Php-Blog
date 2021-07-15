<?php
if(route(1) == 'kategori'){
    require controller('blog-category');
}else{
    if($post_url = route(1)){
        require controller('blog-detail');
    }
else {
$meta = [
    'title' => setting('title'),
    'description' => setting('description'),
    'keywords' => setting('keywords')
];

/*
$query = $db->prepare('SELECT * FROM posts where post_status = ? order by post_id asc ');
$query->execute([1]);
$query = $query->fetchAll(PDO::FETCH_ASSOC);
*/
$query = $db->prepare('select posts.*, group_concat(category_name) as category_name,group_concat(category_url) as category_url
from posts
inner join categories on find_in_set(categories.`category_id`, posts. `post_categories`)
where post_status = ?
group by posts.post_id 
order by post_id asc');
$query->execute([1]);
$query = $query->fetchAll(PDO::FETCH_ASSOC);

require view('blog');
    }
}
