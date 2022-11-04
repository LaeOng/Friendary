<?php 
    session_start();
    include('../../../dbconn/dbconn.php');
    include('../../../serverURL.php');

    if(!isset($_SESSION['ID'])) {
        echo "<script>alert('로그인 이후 이용 가능합니다.');location.href = '../main/home.php';</script>";
    }

    $sessionid = $_SESSION['ID'];
?>

<style>

#date {
    width: 100%;
    height: 60px;
    border: 1px solid;
}

#photos {
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    border: 1px solid;
}

#contents {
    width: 33%;
    height: 300px;
    border: 1px solid;
}

#content_image {
    overflow: hidden;
    margin: auto;
    margin-top: 5%;
    width: 90%;
    height: 65%;
    border: 1px solid;
}

#content_detail {
    overflow: hidden;
    display: flex;
    margin: auto;
    width: 90%;
    height: 15%;
    margin-top: 5%;
    border: 1px solid;
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

#search_bar {
    outline: none;
    font-size: 14px;
    border: none;
    background-color: #f7f7f7;
    padding-bottom: 8px;
}

#addGroup {
    float: right;
    margin-right: 20px;
    width: 100px;
    height: 50px;
    border: 1px solid;
}

.search_window {
    width: 100%;
    display: flex;
}

#contents {
    width: 33%
    height: 
}


</style>

<?php
    //데이터
    $query = "SELECT DATE_FORMAT(a.`reg_date`,'%Y-%m-%d') AS 'simple_date', a.`content_No`, a.`group_No`, a.`bundle_No`, a.`detail`, a.`location`, a.`love`, a.`hate`, a.`del` FROM `memory_content_table` AS a ".
             "INNER JOIN `memory_group_member_table` AS b ON a.`group_No` = b.`group_No` ".
             "INNER JOIN `memory_member_table` AS c ON b.`id_No` = c.`id_No` ".
             "WHERE c.`ID` = '$sessionid' ".
             "AND a.`del` = 'N' ".
             "ORDER BY a.`content_No` DESC ";
    $result = mysqli_query($conn,$query);


    //날짜분류
    $query_date = "SELECT `simple_date` FROM ($query) A GROUP BY `simple_date` ORDER BY `simple_date` DESC";
    $data_date = mysqli_fetch_array(mysqli_query($conn,$query_date));
    $result_date = mysqli_query($conn,$query_date);
?>

<html>
<body>
    <div class = photo_space>
        <div class="search_window" style="text-align:center">
            <div class="input_wrapper">
                <div class="img_input">
                    <img id="magnifier" src="../../asset/magnifier.png">
                    <input type="text" id = "search_bar" placeholder="search"/>
                </div>
            </div>
        </div>
        <br>
        <div class = content_list>
            <?php
            $i = 0;
            //파일 타입 임시, db에 실수로 filetype 안넣었음 pages/upload/upload.php 작업 완료되는대로 수정
            $ftype = "png";
            while ($row = mysqli_fetch_array($result_date)) {
            ?>
            <div id = "date">
                <?php
                    echo $row['simple_date'];
                    $simple_date = $row['simple_date'];
                ?>
            </div>

            <div id = "photos">
    
                <?php
                while($row2 = mysqli_fetch_array($result)) {
                    if($row2['simple_date'] == $simple_date) {                        
                ?>
                <div id = "contents">
                        <?php
                        $c_name = $row2['content_No'] . "_" . $row2['group_No'] . "_" . $row2['bundle_No'] . "." . "png";
                        ?>
                        <div id = "content_image">
                            <img src = "../../content/<?php echo $c_name?>">
                        </div>

                        <div id = "content_detail">
                            <img src = "../../asset/heart_before.png">
                            <img src = "../../asset/boundary.png.png">
                            <input type = "text" id = "comment" placeholder = "blablabla">
                        </div>
                </div>
                <?php
                    }
                }
                mysqli_data_seek($result, 0);
                ?>
            </div> 



            <?php
            }
            ?>

            <?php

            ?>

        </div>
    </div>
</body>
</html>
