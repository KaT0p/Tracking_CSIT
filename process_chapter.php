<!-- มาจากหน้า progress_chapter.php -->

<?php include 'config/db.php'; ?>

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
    //print_r($_POST);
    //$student_id = $_POST['student_id'];
    $type1 = $_POST['chapter_type1']; //=ประชุมวิชาการ
    $type2 = $_POST['chapter_type2'];
    $chapter_name = $_POST['chapter_name'];
    //$chapter_filename = $_POST['chapter_filename'];
    //$chapter_admin_id = $_POST['chapter_admin_id'];
    $ids = $_POST['ids'];
    //$chapter_student_id = $_POST['chapter_student_id'];

    $sql = "INSERT INTO `chapter` (`chapter_id`, `chapter_type1`, `chapter_type2`, `chapter_timestamp`, `chapter_name`, `chapter_filename`, `chapter_admin_id`, `chapter_student_id`) 
            VALUES (NULL, '$type1', '$type2', current_timestamp(), '$chapter_name', '$file', '$userid', '$ids')";

    $result = mysqli_query($conn, $sql);

    // if ($result) {
    //     echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
    //     echo "<script>window.location = 'progress_chapter.php' ;</script>";
    // } else {
    //     echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
    // }
    // mysqli_close($conn);
    // echo "ไฟล์ชื่อ : " . "$date" . basename($_FILES["file"]["name"]) . "<br>" . " อัพโหลดเสร็จแล้ว" ;
    // } else{
    //     echo "เกิดข้อผิดพลาด" ;
    // }

    echo "<script>alert('อัพโหลดเสร็จเรียบร้อย');</script>";
    echo "<script>window.location ='progress_chapter.php?student_id=$ids' ;</script>";
} else {
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
}

?>