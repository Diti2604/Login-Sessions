<?php
    #Just Log Out and redirect in login page.
    session_start();
    session_destroy();
    header("Location: ../index.php");
?>