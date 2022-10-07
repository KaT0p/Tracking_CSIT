<!-- หน้าเพิ่ม GT01-02 และดูข้อมูล ฝั่ง Admin -->

<?php include 'config/db.php';

session_start();
if (!isset($_SESSION["aid"])) {
    header('Location: login.php');
}

$ids = $_GET['student_id'];
$sql = "SELECT * FROM student WHERE student_id = '$ids'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GT01-02</title>
    <!-- CSS only -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="sass/custom.css">
    <!-- CSS only -->
    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.php">
                    <span class="align-middle">Admin</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="index.php">
                            <i class="align-middle" data-feather="home"></i> <span class="align-middle">หน้าแรก</span>
                        </a>
                    </li>
                    <li class="sidebar-header">
                        สำหรับนิสิต
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" a href="adds.php">
                            <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle">เพิ่มรายชื่อนิสิต</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="show_student.php">
                            <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">แสดงรายชื่อนิสิต</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        สำหรับอาจารย์
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="addT.php">
                            <i class="align-middle" data-feather="edit-2"></i> <span class="align-middle">เพิ่มรายชื่ออาจารย์</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="show_teacher.php">
                            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">แสดงรายชื่ออาจารย์</span>
                        </a>
                    </li>
                </ul>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="logout.php">
                        <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">ออกจากระบบ</span>
                    </a>
                </li>
                </ul>
                <div class="sidebar-cta">
                    <div class="">
                        <strong class="d-inline-block mb-2"></strong>
                        <div class="mb-3 text-sm">
                        </div>
                        <div class="d-grid">
                            <a class=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                        <li class="nav-item dropdown">
                            <marquee direction="left">
                                <h3><span class="text-white">ระบบติดตามความก้าวหน้า</span>
                            </marquee>
                            <h3>
                                </marquee>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content">
                <div class="card-body">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="container">
                                        <div class=" h4 text-center alert alert-success mb-4 mt-4 " role="alert"> GT01-02 </div>

                                        <br>


                                        <div class="h5">รหัสนิสิต : <?= $row["student_id"] ?></div>
                                        <div class="h5">ชื่อ : <?= $row["prefix"] ?>
                                            <?= $row["first_name"] ?>
                                            <?= $row["last_name"] ?></div>
                                        <div class="h5">อีเมล : <?= $row["email"] ?></div>
                                        <div class="h5">ภาควิชา : <?= $row["section"] ?></div>

                                        <a href="show_student.php" class="btn btn-danger mb-4 mt-2">กลับ</a>

                                        <a href="gt01-02.php?student_id=<?= $row["student_id"] ?>" class="btn btn-success mb-4 mt-2"> GT01-02 </a>

                                        <a href="progress_pg.php?student_id=<?= $row["student_id"] ?>" class="btn btn-info mb-4 mt-2"> ความก้าวหน้า </a>

                                        <a href="progress_chapter.php?student_id=<?= $row["student_id"] ?>" class="btn btn-warning  mb-4 mt-2"> บทความและการตีพิมพ์ </a>

                                        <br>
                                        <?php
                                        $sql_gt = "SELECT * FROM gtcsit WHERE gt_student_id = '$ids'";
                                        $result_gt = mysqli_query($conn, $sql_gt);
                                        $row_gt = mysqli_fetch_array($result_gt);

                                        ?>
                                        <form action="upload_gt.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="ids" value="<?= $row["student_id"] ?>">
                                            เพิ่มเอกสาร :
                                            <select class="form-select" name="gt_type" aria-label="Default select example" required>
                                                <option value>- เลือก -</option>
                                                <option value="gt_file_01">GT-CSIT-01</option>
                                                <option value="gt_file_02">GT-CSIT-02</option>
                                                <option value="gt_file_03">GT-CSIT-03</option>
                                            </select> <br>

                                            <!-- <input type="file" name="file" id="file" class="form-control" required>  <br> -->
                                            <input name="file" type="file" accept="application/pdf" />
                                            <input type="submit" value="Upload" name="submit" class="btn btn-success">
                                        </form>

                                        <br>

                                        <table class="table table-hover my-0">
                                            <tr>
                                                <th>ความก้าวหน้า</th>
                                                <th>สถานะ</th>
                                                <th>วันที่อัพโหลด</th>
                                                <th></th>
                                            </tr>

                                            <tr>
                                                <th>GT-CSIT01</th>
                                                <td><?php
                                                    if (empty($row_gt["gt_file_01"])) {
                                                        echo "❌ไม่ได้อัพโหลด";
                                                    } else {
                                                        echo "✔อัพโหลดแล้ว";
                                                    } ?></td>
                                                <td><?= $row_gt["gt_file_01_timestamp"] ?></td>
                                                <td><?php if (!empty($row_gt["gt_file_01"])) {
                                                    ?>
                                                        <a class="btn btn-success" href="<?= $row_gt["gt_file_01"] ?>" target="_bank">ดูเอกสาร</a>
                                                    <?php }
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>GT-CSIT02</th>
                                                <td><?php
                                                    if (empty($row_gt["gt_file_02"])) {
                                                        echo "❌ไม่ได้อัพโหลด";
                                                    } else {
                                                        echo "✔อัพโหลดแล้ว";
                                                    } ?></td>
                                                <td><?= $row_gt["gt_file_02_timestamp"] ?></td>
                                                <td><?php if (!empty($row_gt["gt_file_02"])) {
                                                    ?>
                                                        <a class="btn btn-success" href="<?= $row_gt["gt_file_02"] ?>" target="_bank">ดูเอกสาร</a>
                                                    <?php }
                                                    ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>GT-CSIT03</th>
                                                <td><?php
                                                    if (empty($row_gt["gt_file_03"])) {
                                                        echo "❌ไม่ได้อัพโหลด";
                                                    } else {
                                                        echo "✔อัพโหลดแล้ว";
                                                    } ?></td>
                                                <td><?= $row_gt["gt_file_03_timestamp"] ?></td>
                                                <td><?php if (!empty($row_gt["gt_file_03"])) {
                                                    ?>
                                                        <a class="btn btn-success" href="<?= $row_gt["gt_file_03"] ?>" target="_bank">ดูเอกสาร</a>
                                                    <?php }
                                                    ?>
                                                </td>
                                            </tr>

                                        </table>

                                        <script src="js/app.js"></script>
</body>

</html>