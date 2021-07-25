<?php
if ($status = get('status')){
    $query = $db->prepare('SELECT * FROM comments 
    left join users on users.user_id = comments.comment_user_id
    where comment_status = ?
    order by comment_id desc ');
    $query->execute([$status == 2 ? 0 : $status]);
    $query = $query->fetchAll(PDO::FETCH_ASSOC); 
}else{
    $query = $db->prepare('SELECT * FROM comments 
    left join users on users.user_id = comments.comment_user_id
    order by comment_id desc ');
    $query->execute();
    $query = $query->fetchAll(PDO::FETCH_ASSOC);
}
require admin_view('comments');

//eklenmedi
//inner join posts on posts.post_id = comments.comment_id
/*
$query = $db->prepare('SELECT * FROM comments 
left join users on users.user_id = comments.comment_user_id
order by comment_id desc ');
$query->execute();
$query = $query->fetchAll(PDO::FETCH_ASSOC);
require admin_view('comments');
*/