<!DOCTYPE html>
<style>
* {
    margin: 0;
    padding: 0;
}

html, body {
  height: 300px;
  width: 400px;
}

#check_msg{
    margin-top: 80px;
}

#check_button{
    margin-top: 65px;
    width:100px;
    height: 50px;
    border-radius: 70px;
    border:none;
    background-color: #007AEB;
}

#check_window{
    display: flex;
    flex-direction: column;
    align-items: center;
}

</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.header').load("../feed/feed_head.php");
    });
</script>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class = "header">
    
    </div>
    <div id="check_window">
        <div id="check_msg" style="text-align: center;">중복되는 닉네임입니다<br>다시 입력해주세요</div>
        <button id="check_button">확인</button>
    </div>
</body> 

<style>
.header{
    height: 50px;
}
</style>

</html>