<?php

class Blog {

    public static function Categories()
    {
        global $db;
        $query = $db->prepare('select categories.*, count(post_id) as total from categories inner join posts 
        on find_in_set(category_id, post_categories)
        group by category_id');
        $query->execute();
        $query = $query->fetchAll(PDO::FETCH_ASSOC);
        return $query;
    }

    public static function findPost($post_url)
    {
        global $db;
        $query = $db->prepare('select posts.*, group_concat(category_name) as category_name,
        group_concat(category_url) as category_url
        from posts
        inner join categories on find_in_set(categories.`category_id`, posts.`post_categories`)
        where post_url = ? and post_status = ? ');
        $query->execute([$post_url, 1]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query ;
        
    }
}