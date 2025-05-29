<?php 
    session_start();
    if(session_destroy()){
        header("Location: http://localhost:8080/web222/User/sign_in");
    }
?>