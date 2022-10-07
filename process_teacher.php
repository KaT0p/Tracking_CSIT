<!-- มาจากหน้า addT.php -->

<?php include 'config/db.php'; ?>

<?php

$dir = "pic_teachers/";
$date = date('dmyhis');
$basename = basename($_FILES["file"]["name"]);
$basename = explode(".", $basename);
$file = $dir . $basename[0] . "__$date." . $basename[1];
if (move_uploaded_file($_FILES["file"]["tmp_name"], $file)) {

    session_start();

    //print_r($_POST);
    //$teacher_id = $_POST['teacher_id'];
    $teachers_prefix = $_POST['teachers_prefix'];
    $teachers_first_name = $_POST['teachers_first_name'];
    $teachers_last_name = $_POST['teachers_last_name'];
    $teachers_email = $_POST['teachers_email'];
    //$teachers_pic = $_POST['teachers_pic'];
    $teachers_user = $_POST['teachers_user'];
    $teachers_password = $_POST['teachers_password'];

    $sql = "INSERT INTO teachers (teachers_id , teachers_prefix, teachers_first_name, teachers_last_name, teachers_email, teachers_user, teachers_password, teachers_pic)
                                VALUES (NULL, '$teachers_prefix', '$teachers_first_name', '$teachers_last_name', '$teachers_email', '$teachers_user', '$teachers_password', '$file')";


    $result = mysqli_query($conn, $sql);
    // print_r($_POST);
    echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
    echo "<script>window.location = 'show_teacher.php' ;</script>";
} else {
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
}
mysqli_close($conn);

?>