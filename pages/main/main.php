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

<div class="container">
        <div class="arrow l" onclick="prev()">
            <img src="./l.png" alt="l">
        </div>
        <div class="slide slide-1">
             <!-- <div class="caption">
                 <h3>New York</h3>
                 <p>We love the Big Apple!</p>
             </div> -->
        </div>
        <div class="slide slide-2">
            <!-- <div class="caption">
                <h3>Los Angeles</h3>
                <p>LA is always so much fun!</p>
            </div> -->
       </div>
       <div class="slide slide-3">
            <!-- <div class="caption">
                <h3>Bahar Dar</h3>
                <p>Thank you, Bahar Dar!</p>
            </div> -->
       </div>
       <div class="arrow r" onclick="next()">
            <img src="./r.png" alt="r">
        </div>
    </div>

    <!-- slider 주석처리
        <script>
        let slide = document.querySelectorAll('.slide');
        var current = 0;

        function cls(){
            for(let i = 0; i < slide.length; i++){
                  slide[i].style.display = 'none';
            }
        }

        function next(){
            cls();
            if(current === slide.length-1) current = -1;
            current++;

            slide[current].style.display = 'block';
            slide[current].style.opacity = 0.4;

            var x = 0.4;
            var intX = setInterval(function(){
                x+=0.1;
                slide[current].style.opacity = x;
                if(x >= 1) {
                    clearInterval(intX);
                    x = 0.4;
                }
            }, 100);

        }

        function prev(){
            cls();
            if(current === 0) current = slide.length;
            current--;

            slide[current].style.display = 'block';
            slide[current].style.opacity = 0.4;

            var x = 0.4;
            var intX = setInterval(function(){
                x+=0.1;
                slide[current].style.opacity = x;
                if(x >= 1) {
                    clearInterval(intX);
                    x = 0.4;
                }
            }, 100);

        }

        function start(){
            cls();
            slide[current].style.display = 'block';
        }
        start();
    </script> -->

    <!-- <style>
        *{
    padding: 0;
    margin: 0;
    font-family: sans-serif;
}
.container {
    position: relative;
    background: rgba(224, 224, 224, 0.5);
}
.slide-1 {
    background: url('./background.jpg');
}
.slide-2 {
    background: url('./background-1.jpg');
}
.slide-3 {
    background: url('./background-3.jpg');
}

.slide {
    width: 100%;
    height: 100vh;
    background-size: cover;
    background-position: center;
    position: relative;
    overflow-x: hidden;
  }
    </style> -->

