<style>
* {
    margin: 0;
    padding: 0;
}

html, body {
  height: 100%;
  width: 100%;
}

.library{
    font-size: 20px;
    margin-left: 30px;

}

.share_album{
    box-shadow:0px 1px 1px #DADADA;
    height: 60px;
    background-color: #E8E8E8;
    border-bottom: 1px solid rgba(0,0,0,0.2);

    display: flex;
    justify-content: center;
    align-items: center;
}

.album_logo{
    margin-right: 20px;
}

.image_logo{
    margin-right: 20px;
}

.video_logo{
    margin-right: 20px;
}

.folder_logo{
    margin-right: 20px;
}

.collection{
    font-size: 20px;
    margin-left: 30px;
}


.people{
    height: 60px;
    box-shadow:0px 1px 1px #DADADA;
    background-color: #E8E8E8;
    border-bottom: 1px solid rgba(0,0,0,0.2);

    display: flex;
    justify-content: center;
    align-items: center;
    
}

.people_logo{
    margin-right: 20px;
}

.location{
    height: 60px;
    box-shadow:0px 1px 1px #DADADA;
    background-color: #E8E8E8;
    border-bottom: 1px solid rgba(0,0,0,0.2);

    display: flex;
    justify-content: center;
    align-items: center;
}

.location_logo{
    margin-right: 20px;
}
.feed_menu_list {
    height: 100px;
    width: 100%;
    border: 1px solid;
}
.feed_menu_list ul {
    border: 1px solid;
}

.feed_menu_list ul li {
    border: 1px solid;
    height: 30px;
    width: 150px;
    text-align: center;
}



</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function(){

        $('#list_1').hide();
        $('#list_2').hide();
        $('#list_3').hide();
        $('#list_4').hide();

        $('#menu_1').click(function() {
            $("#list_1").slideToggle("fast");
        });

        $('#menu_2').click(function() {
            $("#list_2").slideToggle("fast");
        });
        $('#menu_3').click(function() {
            $("#list_3").slideToggle("fast");
        });
        $('#menu_4').click(function() {
            $("#list_4").slideToggle("fast");
        });
    });

</script>

<html>
<br><br>
    <div class="library">Library</div>
    <br>
    <ul class="library_list">
        <div id = "menu_1">
            <li class="share_album" style="text-align: center;">
                <img class="album_logo"  src="../../asset/clarity_image-gallery-line.png" alt="album_logo" >
                <span class = "feed_menu">공유 앨범</span>
            </li>
        </div>
        <div id = "list_1">
            <ul class = "feed_menu_list">
                <li>항목 1</li>
                <li>항목 2</li>
                <li>항목 3</li>
                <li>항목 4</li>
            </ul>
        </div>
        <div id = "menu_2">
            <li class="image" style="text-align: center;">
                <img class="image_logo" src="../../asset/charm_image.png" alt="image_logo">
                <span class = "feed_menu">공유 앨범</span>
            </li>
        </div>
        <div id = "list_2">
            <ul class = "feed_menu_list">
                    <li>항목 1</li>
                    <li>항목 2</li>
                    <li>항목 3</li>
                    <li>항목 4</li>
            </ul>
        </div>
        <div id = "menu_3">
            <li class="video"  style="text-align: center;">
                <img class="video_logo" src="../../asset/dashicons_video-alt3.png" alt="video_logo">
                <span class = "feed_menu">동영상</span>
            </li>
        </div>
        <div id = "list_3">
            <ul class = "feed_menu_list">
                    <li>항목 1</li>
                    <li>항목 2</li>
                    <li>항목 3</li>
                    <li>항목 4</li>
            </ul>
        </div>
        <div id = "menu_4">
            <li class="folder"   style="text-align: center;">
                <img class="folder_logo" src="../../asset/folder.png" alt="folder_logo">
                <span class = "feed_menu">폴더</span>
            </li>
        </div>
        <div id = "list_4">
            <ul class = "feed_menu_list">
                    <li>항목 1</li>
                    <li>항목 2</li>
                    <li>항목 3</li>
                    <li>항목 4</li>
            </ul>
        </div>
    </ul>
    <br><br><br>
    <div class="collection">Collection</div>
    <br>
    <ul class="library_list">
        <li class="people" style="text-align: center;">
            <img class="people_logo"  src="../../asset/people.png" alt="people_logo">
            <span>사람들</span>
        </li>
        <li class="location" style="text-align: center;">
            <img class="location_logo"  src="../../asset/location.png" alt="location_logo">
            <span>장소</span>
        </li>
    </ul>

</html>