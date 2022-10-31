<?php include ("dbconn.php");?>

<html>
    <?php
    $query = "SELECT `id_No`, `ID`, `Name`, `PW`, `authority` FROM memory_member_table LIMIT 1";
    $result = mysqli_query($conn,$query);

    $data = mysqli_fetch_array($result);
    ?>

    <p> 
        id_No = <?php echo $data['id_No'];?><br>
        ID = <?php echo $data['ID'];?><br>
        Name = <?php echo $data['Name'];?><br>
        PW = <?php echo $data['PW'];?><br>
        authority = <?php echo $data['authority']?><br>

    </p>
</html>