<?php 
    session_start();
    include('../../dbconn/dbconn.php');
    include('../../serverURL.php');

    if(!isset($_SESSION['ID'])) {
        echo "<script>alert('로그인 이후 이용 가능합니다.');location.href = '../main/home.php';</script>";
    }
?>


<!DOCTYPE html>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('.header').load("feed_head.php");

        $('.list').load("feed_list.php");
    });
</script>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="feed.css">
    <title>FrienDary</title>
</head>
<body>
    <div class="header">

    </div>
    <div class="main">
        <div class="list">

        </div>

        <div class="photo_space">
            <div class="search_window"style="text-align:center">
                <div class="input_wrapper">
                    <div class="img_input">
                        <img id="magnifier" src="../../asset/magnifier.png">
                        <input type="text" id = "search_bar" placeholder="search"/>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>