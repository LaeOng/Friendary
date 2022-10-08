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


</style>

<html>
<br><br>
    <div class="library">Library</div>
    <br>
    <ul class="library_list">
        <li class="share_album" style="text-align: center;">
            <img class="album_logo"  src="../../asset/clarity_image-gallery-line.png" alt="album_logo">
            <span>공유 앨범</span>
        </li>
        <li class="image" style="text-align: center;">
            <img class="image_logo" src="../../asset/charm_image.png" alt="image_logo">
            <span>공유 앨범</span>
        </li>
        <li class="video"  style="text-align: center;">
            <img class="video_logo" src="../../asset/dashicons_video-alt3.png" alt="video_logo">
            <span>동영상</span>
        </li>
        <li class="folder"   style="text-align: center;">
            <img class="folder_logo" src="../../asset/folder.png" alt="folder_logo">
            <span>폴더</span>
        </li>
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