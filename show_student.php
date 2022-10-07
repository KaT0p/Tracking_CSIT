<!-- หน้าดูรายชื่อ นิสิต ทั้งหมดที่มีในระบบ Admin -->

<?php include 'config/db.php';

session_start();

if (!isset($_SESSION["aid"])) {
    header('Location: login.php');
}
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
    <title>รายชื่อนิสิต</title>
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
                                    <h1 class="h3 mb-3"><strong>แสดง</strong> ข้อมูลนิสิต</h1>
                                    <div class="row">
                                        <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                                            <h5><a href="adds.php" class="btn btn-primary mb-4 mt-2"> <i class="align-middle me-2" data-feather="user-plus"></i> <span class="align-middle">เพิ่มรายชื่อนิสิต</a></h5>
                                        </div>
                                        <form action="show_student.php" class="form-inline" method="GET">
                                            <label for="">ค้นหานิสิต</label>
                                            <input type="text" placeholder="ป้อนชื่อนิสิต" name="search" class="form-control mr-sm-">
                                            <input type="submit" value="ค้นหา" class="btn btn-outline-success my-2 my-sm-8">
                                        </form>
                                        <table class="table table-hover my-0">
                                            <thead>
                                                <tr>
                                                    <th>รหัสนิสิต</th>
                                                    <th class="d-none d-xl-table-cell">คำนำหน้า</th>
                                                    <th class="d-none d-md-table-cell">ชื่อ</th>
                                                    <th class="d-none d-md-table-cell">นามสกุล</th>
                                                    <!-- <th class="d-none d-md-table-cell">อีเมล</th> -->
                                                    <th class="d-none d-md-table-cell">สาขา</th>
                                                    <th>GT01-02</th>
                                                    <th class="d-none d-md-table-cell">ความก้าวหน้า</th>
                                                    <th class="d-none d-md-table-cell">ดูข้อมูล</th>
                                                    <th>แก้ไข</th>
                                                    <th>ลบ</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $sql = "SELECT * FROM student";
                                            if (isset($_GET['search'])) {
                                                $sql .= " WHERE first_name LIKE '%" . $_GET['search'] . "%' or student_id LIKE '%" . $_GET['search'] . "%'
                                                                                      or section LIKE '%" . $_GET['search'] . "%'";
                                            }
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td><?= $row["student_id"] ?></td>
                                                    <td><?= $row["prefix"] ?></td>
                                                    <td><?= $row["first_name"] ?></td>
                                                    <td><?= $row["last_name"] ?></td>
                                                    <!-- <td><?= $row["email"] ?></td> -->
                                                    <td><?= $row["section"] ?></td>
                                                    <td><a href="gt01-02.php?student_id=<?= $row["student_id"] ?>" class="btn btn-success"> GT01-02 </a></td>
                                                    <td><a href="progress_pg.php?student_id=<?= $row["student_id"] ?>" class="btn btn-info"> ความก้าวหน้า </a></td>
                                                    <td><a href="shows.php?student_id=<?= $row["student_id"] ?>" class="btn btn-primary"> ดูข้อมูล </a></td>
                                                    <td><a href="edits.php?student_id=<?= $row["student_id"] ?>" class="btn btn-warning"> ✏แก้ไข </a></td>
                                                    <td><a href="delete_studen.php?student_id=<?= $row["student_id"] ?>" class="btn btn-danger" onclick="Del(this.href);return false;"> ลบ </a></td>
                                                </tr>
                                            <?php
                                            }
                                            mysqli_close($conn); //ปิดการเชื่อมฐานข้อมูล
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
            </main>

            <footer class="footer">

            </footer>
        </div>
    </div>
    <script language="JavaScript">
        function Del(mypage) {
            var agree = confirm("คุณต้องการลบรายชื่อหรือไม่");
            if (agree) {
                window.location = mypage;
            }
        }
    </script>
    <script src="js/app.js"></script>
</body>

</html>