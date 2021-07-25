<?php

$query = $db->prepare('SELECT * FROM categories order by category_order asc ');
$query->execute();
$query = $query->fetchAll(PDO::FETCH_ASSOC);
require admin_view('categories');