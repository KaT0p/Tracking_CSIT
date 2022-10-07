<!-- มาจากหน้า editt.php -->

<?php include'config/db.php' ; 
// $teacher_id = $_POST['teacher_id'];
// $teacher_id_new = $_POST['teacher_id_new'];
$teachers_prefix = $_POST['teachers_prefix'];
$teachers_prefix_new = $_POST['teachers_prefix_new'];
$teachers_first_name = $_POST['teachers_first_name'];
$teachers_last_name = $_POST['teachers_last_name'];
$teachers_email = $_POST['teachers_email'];


$sql = "UPDATE teachers set teachers_prefix = '$teachers_prefix_new', teachers_first_name = '$teachers_first_name', teachers_last_name = '$teachers_last_name', teachers_email = '$teachers_email' WHERE teachers_prefix = '$teachers_prefix' ";

// สำรอง $sql = "UPDATE teachers set teacher_id = '$teacher_id_new' ,prefix = '$prefix', first_name = '$first_name', last_name = '$last_name', email = '$email' WHERE teacher_id = '$teacher_id' ";

  $result = mysqli_query($conn,$sql);
      if($result){
          echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>" ;
          echo "<script>window.location = 'show_teacher.php' ;</script>" ;
      }else {
          echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');</script>" ;
      }
      mysqli_close($conn);

?>