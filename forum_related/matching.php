<?php
    define('MYSQL_ASSOC',MYSQLI_ASSOC);
    include("../ConnectDatabase.php");
        //now all the sql not working
        $username = $_SESSION["username"];
        $usersql = "SELECT username, education_level, major, institute from user_profile WHERE username = '".$username."'";
        //echo $usersql."\n";
        $user_result = mysqli_query($connect,$usersql);
        $userinfo = mysqli_fetch_array($user_result);
        //echo $userinfo["username"];
        $allsql = "SELECT user_id, username, education_level, major, institute, consult_rating from user_profile";
        //echo $allsql;
        $all_result = mysqli_query($connect,$allsql);
        $score_arr = array();
        $name_array = array();
        $userid_array = array();
        $col = mysqli_num_rows($all_result);
        for($x = 0; $x < $col; $x++){
            $oneuser = mysqli_fetch_array($all_result);
            $score = 0;
            if($oneuser["username"] != $userinfo["username"]){
                if($oneuser["education_level"] == $userinfo["education_level"]){
                    $score += 1;
                }
                if($oneuser["major"] == $userinfo["major"]){
                    $score += 1;
                }
                if($oneuser["institute"] == $userinfo["institute"]){
                    $score += 1;
                }
                $score += ($oneuser["consult_rating"] / 5); 
            }
            array_push($name_array, $oneuser["username"]);
            array_push($score_arr, $score);
            array_push($userid_array, $oneuser["user_id"]);
        }
        $key = array_keys($score_arr, max($score_arr))[0];
        echo $name_array[$key];
        $uid = $userid_array[$key];
        echo $uid;
        $sql = "SELECT username, education_level, major, institute from user_profile WHERE user_id = $uid";
        //echo $usersql."\n";
        header("Location: othersprofile.php?uid=$uid");
?>