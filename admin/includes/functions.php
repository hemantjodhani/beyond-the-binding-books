<?php
    include '../../beyond-the-binding-books/includes/db.php';

    function logout_handler(){
        $_SESSION['username'] = null;
        $_SESSION['user_type'] = null;
        $_SESSION['user_id'] = null;
        header("Location: ../");
        exit;
    }
?>