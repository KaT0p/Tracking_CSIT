<!-- มาจากหน้า progress_pg.php -->

<?php

    $dir = "uploads/";
    $date = date('dmyhis');
    $basename = basename($_FILES["file"]["name"]);
    $basename = explode(".",$basename);
    $file = $dir . $basename[0]."__$date.".$basename[1];
    //echo "$newbasename";
    
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $file)) {

        session_start();
        $_SESSION["userid"] = "2"; //กำหนดตอน login
        //====================================================
        $userid = $_SESSION["userid"];
        include'config/db.php' ; //connect
        $pg_type = $_POST['pg_type'];
        $type_time = $pg_type."_time";
        $type_admin = $pg_type."_admin_id";
        $ids = $_POST['ids'];
        $sql = "UPDATE `progress` SET `$pg_type` = '$file', `$type_time` = current_timestamp(), `$type_admin` = '$userid' WHERE pg_student_id = $ids;";
        $result = mysqli_query($conn,$sql);

        
        echo "<script>alert('อัพโหลดเสร็จเรียบร้อย');</script>";
        echo "<script>window.location ='progress_pg.php?student_id=$ids' ;</script>";
    } else {
        echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
    }
    

?>