<?php
    require('includes/includes.php');
    UserMessage::persist_message('success', 'You have successfully logged out.');
    log_out_user();
?>