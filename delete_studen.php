<!-- หน้าลบข้อมูลนิสิต Admin -->

<?php include'config/db.php' ; 

$ids = $_GET['student_id'] ;
$sql = "DELETE FROM student WHERE student_id = '$ids' " ;
if(mysqli_query($conn,$sql)){
    echo "<script>alert('ลบข้อมูลเรียบร้อย');</script>" ;
    echo "<script>window.location = 'show_student.php' ;</script>" ;
}else {
    echo "Error : " . $sql . "<br>" . mysqli_error($conn) ;
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>" ;
}
mysqli_close($conn);

?>