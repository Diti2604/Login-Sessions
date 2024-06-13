<?php
    session_start();
    if (!isset($_SESSION["username"])){
        //If session doesn't exist
        //Meaning if user is not logged in
        //So redirect to loggin page and 
        //stop executing the script.
        header('Location: ../index.php');
        exit();
    }
?>
<?php echo $_SESSION["username"] . " " ;?>
<h1>This is admin panel</h1>