<?php
    require_once("config.php");
    session_start(); #Everytime we have to use sessions, we have to start session first.
    if (isset($_SESSION["username"])){
        #If user is already logged in (so if session exists), redirect in admin panel.
        #Next break executing/rendering the rest part of the page.
        header("Location: ./admin/index.php");
        exit();
    }
    
    #Normally we get username and password by Post Request.
    #The correct password is 123123
    $username = "admin";
    $password = "123123sdf";

    #Salt has to be a strong string.
    #It must not be found in any hashing database.
    $salt = "3P0K4!@##@!_7!r4n3";

    #Concatinate password with salt.
    $password .= $salt;

    #Encrypt password + hash

    $password = md5($password);

    #Execute query in Database
    #If result is 0 rows, than failed to log in
    #If result is 1 row, it means that username and password exists on database
    #So the user is logged in.

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        
        $_SESSION["username"] = $username;
        header("Location: ./admin/index.php");
        exit();

    } else {
        echo "Invalid username or password. Please try again.";
    }

    $conn->close();

?>

<h1>This is login page</h1>