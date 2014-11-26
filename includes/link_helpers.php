<?php
    function add_link_from_user($title, $url, $user) {
        $new_links_row = ['title' => $title,
                          'url' => $url,
                          'user_id' => $user['id']];
        $sql = "INSERT INTO links (title, url, user_id, created_at) VALUES (:title, :url, :user_id, NOW())";
        return Database::prepare_and_execute($sql, $new_links_row);
    }

?>
