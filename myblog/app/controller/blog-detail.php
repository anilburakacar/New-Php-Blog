<?php

$row = Blog::findPost($post_url);

if (!$row){
    header('Location:' . site_url('404'));
    exit;
}


$seo = json_decode($row['post_seo'], true);

$meta = [
 'title' => $seo['title'] ? $seo['title'] : $row['post_title']
  //  'description' => $seo['description'] ? $seo['description'] : cut_text($row['post_short_content'])
];

$comments = $db->prepare('SELECT * FROM comments where comment_post_id = ? and comment_status = ? order by comment_id asc');
$comments->execute([$row['post_id'],1]);
$comments  = $comments->fetchAll(PDO::FETCH_ASSOC);



require view('blog-detail');