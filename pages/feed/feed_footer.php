<style>
* {
    margin: 0;
    padding: 0;
}
html,body {
    width: 100%;
    height: 100%;
}

.friendary{
    padding: 60px;
    margin-right: 20%;
    
}

.total_footer{
    display: flex;
    flex-direction: row;
    bottom:0;
    background-color: #D9D9D9;
    height: 300px;
}

.footer_description{
    margin-right: 20%;
    margin-top:60px;
}

.follow_us{
    width:20%;
    margin-top:80px;
    font-size: 20px;
}

.follow_image{
    margin-top: 20px;
    display: flex;
}

.facebook{
    margin-right: 10px;
}

.instagram{
    margin-right: 10px;
}

.github{
    margin-right:10px;
}
</style>

<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="footer.css">
    <title>Document</title>
</head>
<body>
        <footer class="total_footer">
            <div class="friendary">
                <div class="icon">
                    <img class="boundary" src="../../asset/boundary.png"/>
                    <img class="Friendary" src="../../asset/FrienDary.png"/>
                </div>
            </div>
            <div class="footer_description">
                <br>
                <p>경기 용인시 수지구 죽전로 152</p>
                <br>
                <p>TEL 031-8005-2114</p>
                <br>
                <p>FrienDary@dankook.ac.kr</p>
                <br>
                <p>Copyright  2022 All Rights</p>
                <p>Reserved by FrienDary.</p>
            </div>
            <div class="follow_us">Follow us
                <div class="follow_image">
                    <img class="facebook" src="../../asset/facebook.png"></img>
                    <img class="instagram" src="../../asset/instagram.png"></img>
                    <img class="github" src="../../asset/github.png"></img>
                    <img class="youtube" src="../../asset/youtube.png"></img>
                </div>
            </div>
        </footer>
    </body>
</html>