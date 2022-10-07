<!-- มาจากหน้า edits.php -->

<?php include'config/db.php' ; 
$student_id = $_POST['student_id'];
$student_id_new = $_POST['student_id_new'];
$prefix = $_POST['prefix'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$section = $_POST['section'];

$sql = "UPDATE student set student_id = '$student_id_new' ,prefix = '$prefix', first_name = '$first_name', last_name = '$last_name', email = '$email', section = '$section' WHERE student_id = '$student_id' ";

$result = mysqli_query($conn,$sql);
     if($result){
         echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>" ;
         echo "<script>window.location = 'show_student.php' ;</script>" ;
     }else {
         echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');</script>" ;
     }
     mysqli_close($conn);

?>