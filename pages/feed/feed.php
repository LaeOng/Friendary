<?php 
    session_start();
    include('../../dbconn/dbconn.php');
    include('../../serverURL.php');

    if(!isset($_SESSION['ID'])) {
        echo "<script>alert('로그인 이후 이용 가능합니다.');location.href = '../main/home.php';</script>";
    }
    $ptype = "feed";
?>


<!DOCTYPE html>

<style>
* {
    margin: 0;
    padding: 0;
}

html, body {
  height: 100%;
  width: 100%;
}

ul, li {
    list-style: none;
    padding: 0;
    margin: 0;
}


.main{
    display: flex;
    width: 1080px;
    height: 100%;
}

.list{
    background-color: #F0F0F0;
    width: 30%; 
    height: 100%;
}

.image{
    box-shadow:0px 1px 1px #DADADA;
    height: 60px;
    background-color: #E8E8E8;
    border-bottom: 1px solid rgba(0,0,0,0.2);

    display: flex;
    justify-content: center;
    align-items: center;
}

.video{
    box-shadow:0px 1px 1px #DADADA;
    height: 60px;
    background-color: #E8E8E8;
    border-bottom: 1px solid rgba(0,0,0,0.2);

    display: flex;
    justify-content: center;
    align-items: center;
}

.folder{
    box-shadow:0px 3px 3px #DADADA;
    height: 60px;
    background-color: #E8E8E8;
    border-bottom: 1px solid rgba(0,0,0,0.2);

    display: flex;
    justify-content: center;
    align-items: center;

}

.photo_space {
    display: flex;
    flex-direction: column;
} 

.input_wrapper {
    display: flex; 
    align-items: center;
    border-radius: 100px;
    width: 382px;
    height: 38px;
    background-color: #f7f7f7;
    margin-top: 20px;
    margin-left:20px;
    border: 1px solid; 
}

#magnifier{
    margin-left: 10px;
    width: 15px;
    height: 15px;
    padding-top: 8px;
}

#search_bar {
    outline: none;
    font-size: 14px;
    border: none;
    background-color: #f7f7f7;
    padding-bottom: 8px;
}
</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $('.feed_head').load("feed_head.php", {ptype: 'feed'});

        $('.list').load("feed_list.php");

        $('.photo_space').load("pages/show_recent.php");
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
    <div class="feed_head">

    </div>
    <button id = "test" onclick = "popup()">테스트</button>
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