<?php
    session_start();
    include('../../dbconn/dbconn.php');

    header("Content-Type: application/json"); //json 필수

    $ID = $_POST['ID'];
    $PW = $_POST['PW'];

    $query = "SELECT * FROM `memory_member_table` WHERE `ID` ='".$ID."' AND `PW` = '".$PW."'";
    $query2 = "SELECT * FROM `memory_member_table` WHERE `ID` ='".$ID."'";
        
    $result = mysqli_query($conn,$query);
    $result2 = mysqli_query($conn,$query2);

    $user_data = mysqli_fetch_array($result);
    $user_data2 = mysqli_fetch_array($result2);

    if(isset($user_data)){
        $_SESSION['ID'] = $user_data['ID'];
        echo "s1";
    }
    else if(isset($user_data2)){
        echo "e1";
    }
    else {
        echo "e2";
    }

?>





