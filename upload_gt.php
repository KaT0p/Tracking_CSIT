<!-- มาจากหน้า gt01-02 -->

<?php

$dir = "uploads/";
$date = date('dmyhis');
$basename = basename($_FILES["file"]["name"]);
$basename = explode(".",$basename);
$file = $dir . $basename[0]."__$date.".$basename[1];

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $file)) {
        
        session_start();
        
        //====================================================
        $userid = $_SESSION["aid"];
        include'config/db.php' ; //connect
        $gt_type = $_POST['gt_type'];
        $type_time = $gt_type."_timestamp";
        $type_admin = $gt_type."_admin_id";
        $ids = $_POST['ids'];
        $sql = "UPDATE `gtcsit` SET `$gt_type` = '$file', `$type_time` = current_timestamp(),  `$type_admin` = '$userid' WHERE gt_student_id = '$ids';";
        $result = mysqli_query($conn,$sql);

    //     echo "ไฟล์ชื่อ : " . "$date" . basename($_FILES["file"]["name"]) . "<br>" . " อัพโหลดเสร็จแล้ว" ;
    // } else{
    //     echo "เกิดข้อผิดพลาด" ;
    // }
        echo "<script>alert('อัพโหลดเสร็จเรียบร้อย');</script>";
        echo "<script>window.location ='gt01-02.php?student_id=$ids' ;</script>";
    } else {
        echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
    }

?>