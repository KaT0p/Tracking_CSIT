<!-- หน้าลบข้อมูลอาจารย์ Admin -->

<?php include'config/db.php' ; 

$idt = isset($_GET['teachers_id']) ? $_GET['teachers_id'] : '';
$sql = "DELETE FROM teachers WHERE teachers_id  = '$idt' " ;

if(mysqli_query($conn,$sql)){
    echo "<script>alert('ลบข้อมูลเรียบร้อย');</script>" ;
    echo "<script>window.location = 'show_teacher.php' ;</script>" ;
}else {
    echo "Error : " . $sql . "<br>" . mysqli_error($conn) ;
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>" ;
}
mysqli_close($conn);

?>