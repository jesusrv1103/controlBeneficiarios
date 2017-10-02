<?php
session_start();
        session_destroy();
        unset($_SESSION['user_session']);
    echo  "<script type='text/javascript'>
    window.location='index.php'
    </script>"; 
       
?>