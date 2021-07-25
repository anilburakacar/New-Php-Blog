<?php
$query = $db->prepare('SELECT * FROM posts order by post_id desc ');
$query->execute();
$query = $query->fetchAll(PDO::FETCH_ASSOC);
require admin_view('posts');