<!-- มาจากหน้า adds.php -->

<?php include 'config/db.php'; ?>

<?php

$dir = "pic/";
$date = date('dmyhis');
$basename = basename($_FILES["file"]["name"]);
$basename = explode(".", $basename);
$file = $dir . $basename[0] . "__$date." . $basename[1];
if (move_uploaded_file($_FILES["file"]["tmp_name"], $file)) {

    session_start();
    //print_r($_POST);
    //$student_pic = $_POST['student_pic'];
    $student_id = $_POST['student_id'];
    $prefix = $_POST['prefix'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $section = $_POST['section'];
    $student_user = $_POST['student_user'];
    $student_password = $_POST['student_password'];

    $sql = "INSERT INTO student (student_pic, student_id, prefix ,first_name, last_name, email, section, student_user, student_password)
                                VALUES ('$file' ,'$student_id', '$prefix' ,'$first_name', '$last_name', '$email', '$section', '$student_user',  '$student_password')";

    $result = mysqli_query($conn, $sql);

    $sql_gt = "INSERT INTO `gtcsit` (`gt_id`, `gt_file_01`, `gt_file_02`, `gt_file_03`, `gt_file_01_timestamp`, `gt_file_02_timestamp`, `gt_file_03_timestamp`, `gt_file_01_admin_id`, `gt_file_02_admin_id`, `gt_file_03_admin_id`, `gt_student_id`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$student_id');";
    $result_gt = mysqli_query($conn, $sql_gt);

    $sql_pg = "INSERT INTO `progress` (`pg_id`, `pg_file_eng`, `pg_file_qe`, `pg_file_adviser`, `pg_file_outline`, `pg_file_end`, `pg_file_eng_time`, `pg_file_qe_time`, `pg_file_adviser_time`, `pg_file_outline_time`, `pg_file_end_time`, `pg_file_eng_admin_id`, `pg_file_qe_admin_id`, `pg_file_adviser_admin_id`, `pg_file_outline_admin_id`, `pg_file_end_admin_id`, `pg_student_id`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$student_id');";
    $result_pg = mysqli_query($conn, $sql_pg);

    echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
    echo "<script>window.location = 'show_student.php' ;</script>";
} else {
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
}
mysqli_close($conn);


?>