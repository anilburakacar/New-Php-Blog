<?php

$query = $db->prepare('SELECT * FROM contact order by contact_id desc ');
$query->execute();
$query = $query->fetchAll(PDO::FETCH_ASSOC);
require admin_view('contact');