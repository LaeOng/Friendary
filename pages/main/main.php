<style>
.main_window{
    width: 500px;
    height: 600px;
    background-color:rgba(255,255,255,0);
    border-radius: 70px;
    margin: 70px auto 0 auto;
    display: flex;
    flex-direction: column ;
    align-items: center;
}

.home_title{
    padding-top:170px;
    font-size: 20px;
    color:#ffffff;
}

.friendary_logo{
    padding-top: 10px;
    width:181px;
    height:42px;;
}

.description{
    color:#FFFFFF;
    width: 420px;
    height: 50px;
    background-color: #007AEB;
    border-radius: 100px;
    margin-top: 10px;
    text-align: center;
    font-size: 20px;
    padding-top: 16px;
    color:white;
}

.invite_button{
    margin-top: 3%;
    border: none;
    color:white;
    font-size: 20px;
    background-color:transparent;
}
</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('.description').click(function() {
            location.href = "../feed/feed.php";
        });

    });

</script>


<html>
    <div class="main_window">
        <div class="home_title">추억을 담다</div> 
        <img class="friendary_logo"  src="../../asset/FrienDary_home.png"/>
        <div class="description">소중한 사람들과 추억을 나누어 보세요</div>
        <button class="invite_button">함께 추억할 상대 초대하기</button>
    </div>
</html>
