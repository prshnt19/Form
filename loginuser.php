<?php
if ( is_user_logged_in() ) {
   header('Location: demo1.php');
} else {
    header('Location: login.php');
}
?>
