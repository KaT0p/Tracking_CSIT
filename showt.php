<!-- หน้าดูข้อมูลอาจารย์ Admin -->

<?php include 'config/db.php';

session_start();
if (!isset($_SESSION["aid"])) {
    header('Location: login.php');
}

$idt = isset($_GET['teachers_id']) ? $_GET['teachers_id'] : '';
$sql = "SELECT * FROM teachers WHERE teachers_id  = '$idt'";
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
    <title>ข้อมูลอาจารย์</title>
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
            <div class="container">
                <main class="content">
                    <div class="card-body">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-sm-6">
                                        <div class=" h3 text-center alert alert-primary mb-4 mt-4 " role="alert"> ข้อมูลอาจารย์ </div>


                                        <div class="h5">ตำแหน่งทางวิชาการ : <?= $row["teachers_prefix"] ?></div>
                                        <div class="h5">ชื่อ : <?= $row["teachers_prefix"] ?> <?= $row["teachers_first_name"] ?>
                                            <?= $row["teachers_last_name"] ?> </div>
                                        <div class="h5">อีเมล : <?= $row["teachers_email"] ?></div>


                                        <a href="show_teacher.php" class="btn btn-danger mb-4 mt-2">กลับ</a>

                                    </div>
                                </div>

                            </div>
                            <script src="js/app.js"></script>
</body>

</html>