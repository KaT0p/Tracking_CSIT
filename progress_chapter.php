<!-- หน้าเพิ่มบทความและการตีพิมพ์ Admin -->

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
    <title>บทความและการตีพิมพ์</title>
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
                                        <div class=" h4 text-center alert alert-success mb-4 mt-4 " role="alert"> บทความและการตีพิมพ์ </div>

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

                                        <a href="progress_chapter.php?student_id=<?= $row["student_id"] ?>" class="btn btn-warning mb-4 mt-2"> บทความและการตีพิมพ์ </a>

                                        <br>

                                        <?php
                                        $sql_c = "SELECT * FROM chapter WHERE chapter_id  = '$ids'";
                                        $result_c = mysqli_query($conn, $sql_c);
                                        $row_c = mysqli_fetch_array($result_c);

                                        ?>


                                        <form action="process_chapter.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="ids" value="<?= $row["student_id"] ?>">

                                            <label>ชื่อบทความและการตีพิมพ์ :</label>
                                            <input type="text" name="chapter_name" class="control" placeholder="ชื่อบทความ" required><br> <br>

                                            เพิ่มเอกสาร :
                                            <select class="control" name="chapter_type1" aria-label="Default select example" required>
                                                <option value>- เลือก -</option>
                                                <option value="ประชุมวิชาการ">ประชุมวิชาการ</option>
                                                <option value="วารสารระดับชาติ">วารสารระดับชาติ</option>
                                                <option value="วารสารนานาชาติ">วารสารนานาชาติ</option>
                                            </select>

                                            <select class="control" name="chapter_type2" aria-label="Default select example" required>
                                                <option value>- เลือก -</option>
                                                <option value="ระดับชาติ">ระดับชาติ</option>
                                                <option value="นานาชาติ">นานาชาติ</option>
                                                <option value="">---------------</option>
                                                <option value="TCI">TCI</option>
                                                <option value="อื่นๆระดับชาติ">อื่นๆระดับชาติ</option>
                                                <option value="">---------------</option>
                                                <option value="ISI">ISI</option>
                                                <option value="SCOPUS">SCOPUS</option>
                                                <option value="อื่นๆนานาชาติ">อื่นๆนานาชาติ</option>
                                            </select>
                                            <br>
                                            <br>

                                            <!-- <input type="file" name="file" id="file" class="form-control" required>  <br> -->
                                            <input type="file" name="file" accept="application/pdf">
                                            <input type="submit" value="Upload" name="submit" class="btn btn-success">
                                        </form>

                                        <!-- chapter -->
                                        <?php
                                        $sql_c = "SELECT *, SUM(CASE WHEN true THEN 1 END) as sumt FROM `chapter` WHERE `chapter_student_id` = '$ids' GROUP BY `chapter_type2` ORDER BY `chapter_type1`,`chapter_type2`;";
                                        $result_c = mysqli_query($conn, $sql_c);
                                        $row_c = mysqli_fetch_array($result_c);
                                        ?>
                                        <table class="table table-bordered "> <br>
                                            <tr>
                                                <th>บทความและการตีพิมพ์</th>
                                                <th></th>
                                                <th>จำนวนบทความ</th>
                                            </tr>

                                            <tr>
                                                <th>ประชุมวิชาการ</th>
                                                <td>ระดับชาติ</td>
                                                <td>
                                                    <?php if (!empty($row_c['chapter_type2']) && $row_c['chapter_type2'] == "ระดับชาติ") {
                                                        echo "<a href='show_chapter.php?student_id=$ids&type=ระดับชาติ 'class='link-dark'>" . $row_c['sumt'] . "</a>";
                                                        $row_c = mysqli_fetch_array($result_c);
                                                    } ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td>นานาชาติ</td>
                                                <td><?php if (!empty($row_c['chapter_type2']) && $row_c['chapter_type2'] == "นานาชาติ") {
                                                        echo "<a href='show_chapter.php?student_id=$ids&type=นานาชาติ 'class='link-dark'>" . $row_c['sumt'];
                                                        $row_c = mysqli_fetch_array($result_c);
                                                    } ?></td>

                                            </tr>

                                            <tr>
                                                <th>วารสารระดับชาติ</th>
                                                <td>TCI</td>
                                                <td><?php if (!empty($row_c['chapter_type2']) && $row_c['chapter_type2'] == "TCI") {
                                                        echo "<a href='show_chapter.php?student_id=$ids&type=TCI 'class='link-dark'>" . $row_c['sumt'];
                                                        $row_c = mysqli_fetch_array($result_c);
                                                    } ?></td>

                                            </tr>

                                            <tr>
                                                <th></th>
                                                <td>อื่นๆระดับชาติ</td>
                                                <td><?php if (!empty($row_c['chapter_type2']) && $row_c['chapter_type2'] == "อื่นๆระดับชาติ") {
                                                        echo "<a href='show_chapter.php?student_id=$ids&type=อื่นๆระดับชาติ 'class='link-dark'>" . $row_c['sumt'];
                                                        $row_c = mysqli_fetch_array($result_c);
                                                    } ?></td>

                                            </tr>

                                            <tr>
                                                <th>วารสารนานาชาติ</th>
                                                <td>ISI</td>
                                                <td><?php if (!empty($row_c['chapter_type2']) && $row_c['chapter_type2'] == "ISI") {
                                                        echo "<a href='show_chapter.php?student_id=$ids&type=ISI 'class='link-dark'>" . $row_c['sumt'];
                                                        $row_c = mysqli_fetch_array($result_c);
                                                    } ?></td>

                                            </tr>

                                            <tr>
                                                <th></th>
                                                <td>SCOPUS</td>
                                                <td><?php if (!empty($row_c['chapter_type2']) && $row_c['chapter_type2'] == "SCOPUS") {
                                                        echo "<a href='show_chapter.php?student_id=$ids&type=SCOPUS 'class='link-dark'>" . $row_c['sumt'];
                                                        $row_c = mysqli_fetch_array($result_c);
                                                    } ?></td>

                                            </tr>

                                            <tr>
                                                <th></th>
                                                <td>อื่นๆนานาชาติ</td>
                                                <td><?php if (!empty($row_c['chapter_type2']) && $row_c['chapter_type2'] == "อื่นๆนานาชาติ") {
                                                        echo "<a href='show_chapter.php?student_id=$ids&type=อื่นๆนานาชาติ 'class='link-dark'>" . $row_c['sumt'];
                                                        $row_c = mysqli_fetch_array($result_c);
                                                    } ?></td>

                                            </tr>

                                            <script src="js/app.js"></script>
</body>

</html>