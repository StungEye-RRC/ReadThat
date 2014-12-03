<?php
    require('includes/includes.php');
    
    if ($_POST) {
        $user = get_the_current_user();
        
        
        if (!$user) {
            UserMessage::persist_message('error', 'You must be logged in to vote.');
            redirect_to('login.php');
        }
        
        $link = find_link_by_id((int)$_POST['id']);
        
        if (isset($_POST['up'])) {
            upvote_link_by_user($link, $user);
        } else if (isset($_POST['down'])) {
            downvote_link_by_user($link, $user);
        }
    }
    
   redirect_to('index.php');
?>