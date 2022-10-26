<!DOCTYPE html>
<style>
* {
    margin: 0;
    padding: 0;
}

html, body {
  height: 350px;
  width: 600px;
}

#nickname_window{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 60px 100px;
    border: 1px solid rgba(0,0,0,0.2);
    width: 400px;
    height: 200px;
    
}

#title{
    margin-top: 65px;
}

#nickname_form{
    display: flex;
    margin-top: 65px;
    background-color: #D9D9D9;
    border:none;
    width: 250px;
    height: 50px;
    border-radius: 10px;
    align-items: center;
}

#nickname_input{
    background-color: #D9D9D9;
    border: none;
}


#check_button{
    margin-top: 65px;
    width:100px;
    height: 50px;
    border-radius: 70px;
    border:none;
    background-color: #007AEB;
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
    <div id="nickname_window">
        <div id="title">닉네임을 입력해주세요</div>
        <form id="nickname_form" style="text-align: center;" method="POST">
            <input type="text"  id="nickname_input" name="nickname" placeholder="닉네임을 입력해주세요">
        </form>
        <button id="check_button">확인</button>
    </div>    
</body>

<style>
.header{
    height: 50px;
}
</style>
</html>