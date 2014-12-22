<?php
    define("UPVOTE", 1);
    define("DOWNVOTE", -1);

    function add_link_from_user($title, $url, $user) {
        $new_links_row = ['title' => $title,
                          'url' => $url,
                          'user_id' => $user['id']];
        $sql = "INSERT INTO links (title, url, user_id, created_at) VALUES (:title, :url, :user_id, NOW())";
        return Database::prepare_and_execute($sql, $new_links_row);
    }

    function get_all_links() {
        $current_user = get_the_current_user();
        
        if ($current_user) {
            $current_user_id = $current_user['id'];
        } else {
            $current_user_id = 0;
        }
        $data = [];
        $sql = "SELECT links.url, links.title, links.user_id, links.created_at, users.id, users.username, COALESCE(SUM(link_votes.amount), 0) AS amount_sum, links.id AS link_id ";
        
        //if ($current_user) {
            $sql .= ", LV.amount as current_user_amount ";
        //}
        
        $sql .= "FROM links " .
                "LEFT OUTER JOIN users ON links.user_id = users.id " .
                "LEFT OUTER JOIN link_votes on links.id = link_votes.link_id  ";
        
        
        
        //if ($current_user) {
            $sql .= "LEFT OUTER JOIN (SELECT * FROM link_votes WHERE user_id = {$current_user_id}) LV on LV.link_id = links.id ";
        //}

        $sql .= "GROUP BY links.id " . 
                "ORDER BY amount_sum DESC";
                
        $links = Database::prepare_and_execute($sql, $data);
        return $links->fetchAll();
    }
    
    function find_link_by_id($id) {
      $link_data = ['id' => $id];
      $sql = "SELECT * FROM links WHERE id = :id";
      $links = Database::prepare_and_execute($sql, $link_data)->fetchAll();
      if (count($links) == 1) {
        return $links[0];
      } else {
        return false;
      }
    }
    
    function find_link_vote_by_link_and_user($link, $user) {
        $link_vote_data = ['link_id' => $link['id'], 'user_id' => $user['id']];
        $sql = "SELECT * FROM link_votes WHERE link_id = :link_id AND user_id = :user_id";
        $link_votes = Database::prepare_and_execute($sql, $link_vote_data)->fetchAll();
        if (count($link_votes) == 1) {
            return $link_votes[0];
        } else {
            return false;
        }
    }
    
    function vote_on_link_by_user_by_amount($link, $user, $amount) {
        $link_vote = find_link_vote_by_link_and_user($link, $user);
        
        if (!$link_vote) {
            $link_votes_data = ['user_id' => $user['id'], 'link_id' => $link['id'], 'amount' => $amount];
            $sql = "INSERT INTO link_votes (user_id, link_id, amount, created_at) VALUES (:user_id, :link_id, :amount, NOW())";
            Database::prepare_and_execute($sql, $link_votes_data);
        } else if ($link_vote && $link_vote['amount'] != $amount) {
            $link_votes_data = ['amount' => $amount, 'id' => $link_vote['id']];
            $sql = "UPDATE link_votes set amount = :amount WHERE id = :id";
            Database::prepare_and_execute($sql, $link_votes_data);
        }
    }
    
    function upvote_link_by_user($link, $user) {
        vote_on_link_by_user_by_amount($link, $user, UPVOTE);
    }
    
    function downvote_link_by_user($link, $user) {
        vote_on_link_by_user_by_amount($link, $user, DOWNVOTE);
    }
    
    function remove_vote_on_link_by_user_by_amount($link, $user, $amount) {
        $link_vote = find_link_vote_by_link_and_user($link, $user);
        if ($link_vote['amount'] == $amount) {
            $link_votes_data = ['id' => $link_vote['id']];
            $sql = "DELETE FROM link_votes WHERE id = :id";
            Database::prepare_and_execute($sql, $link_votes_data);
        }
    }
    
    function undo_upvote_link_by_user($link, $user) {
        remove_vote_on_link_by_user_by_amount($link, $user, UPVOTE);
    }
    
    function undo_downvote_link_by_user($link, $user) {
        remove_vote_on_link_by_user_by_amount($link, $user, DOWNVOTE);
    }
?>