<?php
    include("ConnectDatabase.php");
    function match(){
        $usersql = 'SELECT user_name, eductional_level, major from user_profile WHERE user_name = '.$_SESSION["username"].'';
        $user_result = mysql_query($connect,$usersql);
        $userinfo = mysql_fetch_array($find_result, MYSQLI_ASSOC);
        echo $userinfo["user_name"];
    }
?>