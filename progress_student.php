<!-- หน้าความก้าวหน้าของ นิสิต -->

<?php include'config/db.php' ; 

 session_start();
 if(!isset($_SESSION["sid"])) {
    header('Location: login.php');
}

$ids = $_SESSION["sid"] ;
$sql = "SELECT * FROM student WHERE student_id = '$ids'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ความก้าวหน้า</title>
    <!-- CSS only -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="sass/custom.css">
    <!-- CSS only -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
<div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <li class="sidebar-item  ">
                            <a href="index_student.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>ข้อมูลนิสิต</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href= "gt01-02_student.php?student_id=<?=$row["student_id"]?>" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>GT01-02</span>
                            </a>
                        </li>

                        <li class="sidebar-item active ">
                            <a href="progress_student.php?student_id=<?=$row["student_id"]?>"  class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>ความก้าวหน้า</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="chapter_student.php?student_id=<?= $row["student_id"] ?>" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>บทความและการตีพิมพ์</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="logout.php" class='sidebar-link'>
                                <i class="bi bi-x-octagon-fill"></i>
                                <span>ออกจากระบบ</span>
                            </a>
                        </li>
                    </div>
            </div>
            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>
                <div class="page-heading">
                     <div class="col-12 ">
                                    <div class="card">
                                        <div class="card">
                                            <div class="card-body py-4 px-5">
                                              
                                            </div>
                                       
    <div class="container">
        <div class=" h4 text-center alert alert-primary mb-4 mt-4 " role="alert"> ความก้าวหน้า </div>

        <br>


        <div class="h5">รหัสนิสิต : <?= $row["student_id"] ?></div>
        <div class="h5">ชื่อ : <?= $row["prefix"] ?>
            <?= $row["first_name"] ?>
            <?= $row["last_name"] ?></div>
        <div class="h5">อีเมล : <?= $row["email"] ?></div>
        <div class="h5">ภาควิชา : <?= $row["section"] ?></div>

        <!-- <a href="index_student.php" class="btn btn-reds mb-4 mt-2">กลับ</a>

        <a href="gt01-02_student.php?student_id=<?= $row["student_id"] ?>" class="btn btn-success mb-4 mt-2"> GT01-02 </a>

        <a href="progress_student.php?student_id=<?= $row["student_id"] ?>" class="btn btn-light mb-4 mt-2"> ความก้าวหน้า </a>

        <a href="chapter_student.php?student_id=<?= $row["student_id"] ?>" class="btn btn-volet mb-4 mt-2"> บทความและการตีพิมพ์ </a> -->

        <?php
        $sql_pg = "SELECT * FROM progress WHERE pg_student_id = '$ids'";
        $result_pg = mysqli_query($conn, $sql_pg);
        $row_pg = mysqli_fetch_array($result_pg);

        ?>

        <br>

        <table class="table table-bordered">
        <thead class="table-danger">
            <tr>
                <th>ความก้าวหน้า</th>
                <th>สถานะ</th>
                <th>วันที่อัพโหลด</th>
                <th></th>
            </tr>
            </thead>
            <tr>
                <th>คะแนนภาษาอังกฤษ</th>
                <td><?php
                    if (empty($row_pg["pg_file_eng"])) {
                        echo "❌ไม่ได้อัพโหลด";
                    } else {
                        echo "✔อัพโหลดแล้ว";
                    } ?></td>
                <td><?= $row_pg["pg_file_eng_time"] ?></td>
                <!-- <td><?= $row_pg["pg_file_eng_admin_id"] ?></td> -->
                <td><?php if (!empty($row_pg["pg_file_eng"])) {
                    ?>
                    <a class="btn btn-success" href="<?= $row_pg["pg_file_eng"] ?>" target="_bank">ดูเอกสาร</a>
                    <?php }
                    ?>
                </td>
            </tr>

            <tr>
                <th>สอบ QE</th>
                <td><?php
                    if (empty($row_pg["pg_file_qe"])) {
                        echo "❌ไม่ได้อัพโหลด";
                    } else {
                        echo "✔อัพโหลดแล้ว";
                    } ?></td>
                <td><?= $row_pg["pg_file_qe_time"] ?></td>
                <!-- <td><?= $row_pg["pg_file_qe_admin_id"] ?></td> -->
                <td><?php if (!empty($row_pg["pg_file_qe"])) {
                    ?>
                    <a class="btn btn-success" href="<?= $row_pg["pg_file_qe"] ?>" target="_bank">ดูเอกสาร</a>
                    <?php }
                    ?>
                </td>
            </tr>

            <tr>
                <th>แต่งตั้งที่ปรึกษา</th>
                <td><?php
                    if (empty($row_pg["pg_file_adviser"])) {
                        echo "❌ไม่ได้อัพโหลด";
                    } else {
                        echo "✔อัพโหลดแล้ว";
                    } ?></td>
                <td><?= $row_pg["pg_file_adviser_time"] ?></td>
                <!-- <td><?= $row_pg["pg_file_adviser_admin_id"] ?></td> -->
                <td><?php if (!empty($row_pg["pg_file_adviser"])) {
                    ?>
                    <a class="btn btn-success" href="<?= $row_pg["pg_file_adviser"] ?>" target="_bank">ดูเอกสาร</a>
                    <?php }
                    ?>
                </td>
            </tr>

            <tr>
                <th>สอบโครงร่าง</th>
                <td><?php
                    if (empty($row_pg["pg_file_outline"])) {
                        echo "❌ไม่ได้อัพโหลด";
                    } else {
                        echo "✔อัพโหลดแล้ว";
                    } ?></td>
                <td><?= $row_pg["pg_file_outline_time"] ?></td>
                <!-- <td><?= $row_pg["pg_file_outline_admin_id"] ?></td> -->
                <td><?php if (!empty($row_pg["pg_file_outline"])) {
                    ?>
                    <a class="btn btn-success" href="<?= $row_pg["pg_file_outline"] ?>" target="_bank">ดูเอกสาร</a>
                    <?php }
                    ?>
                </td>
            </tr>

            <tr>
                <th>สอบจบ</th>
                <td><?php
                    if (empty($row_pg["pg_file_end"])) {
                        echo "❌ไม่ได้อัพโหลด";
                    } else {
                        echo "✔อัพโหลดแล้ว";
                    } ?></td>
                <td><?= $row_pg["pg_file_end_time"] ?></td>
                <!-- <td><?= $row_pg["pg_file_end_admin_id"] ?></td> -->
                <td><?php if (!empty($row_pg["pg_file_end"])) {
                    ?>
                    <a class="btn btn-success" href="<?= $row_pg["pg_file_end"] ?>" target="_bank">ดูเอกสาร</a>
                    <?php }
                    ?>
                </td>
            </tr>

</body>

</html>