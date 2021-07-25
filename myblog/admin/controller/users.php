<?php

$query = $db->prepare('SELECT * FROM users order by user_id desc ');
$query->execute();
$query = $query->fetchAll(PDO::FETCH_ASSOC);
require admin_view('users');