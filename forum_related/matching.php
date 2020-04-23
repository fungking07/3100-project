<?php
    include("../ConnectDatabase.php");
    //function match(){
        //now all the sql not working
        $usersql = 'SELECT user_name, eductional_level, faculty, institute from user_profile WHERE user_name = "'.$_SESSION["username"].'"';
        $user_result = mysql_query($connect,$usersql);
        $userinfo = mysql_fetch_array($find_result, MYSQLI_ASSOC);
        echo $userinfo["user_name"];
        $allsql = 'SELECT user_id, user_name, eductional_level, faculty, institute, consult_rating from user_profile';
        $all_result = mysql_query($connect,$usersql);
        $allinfo = mysql_fetch_array($find_result, MYSQLI_ASSOC);
        echo "matching";
        $score_arr = array();
        $name_array = array();
        $userid_array = array();
        $userinfo = ("username" => "henry", "eductional_level" => "Undergrad", "faculty" => "Engineering", "institute" => "CUHK");
        foreach($userinfo as $key => $oneuser){
            $score = 0;
            if($oneuser["username"] != $userinfo["username"]){
                if($oneuser["eductional_level"] == $userinfo["educational_level"]){
                    $score += 1;
                }
                if($oneuser["faculty"] == $userinfo["faculty"]){
                    $score += 1;
                }
                if($oneuser["institute"] == $userinfo["institute"]){
                    $score += 1;
                }
                $score += ($oneuser["consult_rating"] / 5); 
            }
            array_push($name_array, $oneuser["username"]);
            array_push($score_arr, $score);
            array_push($userid_array, $user_id);
        }
        $key = array_keys($score_arr, max($score_arr))[0];
        echo $name_array[$key];
        $uid = $userid_array[$key];
        echo "<a href='othersprofile.php?uid=$uid'></a>"
        //if have time, then do pop to archeive top 3
        //}
    //}
?>