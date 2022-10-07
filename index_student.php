<!-- หน้าแรก นิสิต -->

<?php include 'config/db.php';
session_start();
if (!isset($_SESSION["sid"])) {
    header('Location: login.php');
}
$ids = $_SESSION["sid"];
$sql = "SELECT * FROM student WHERE student_id = '$ids'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลนิสิต</title>

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
                        <li class="sidebar-title"></li>

                        <li class="sidebar-item active ">
                            <a href="index_student.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>ข้อมูลนิสิต</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="gt01-02_student.php?student_id=<?= $row["student_id"] ?>" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>GT01-02</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="progress_student.php?student_id=<?= $row["student_id"] ?>" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>ความก้าวหน้า</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="chapter_student.php?student_id=<?= $row["student_id"] ?>" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>บทความและการตีพิมพ์</span>
                            </a>

                        <li class="sidebar-item  ">
                            <a href="logout.php" class='sidebar-link'>
                                <i class="bi bi-x-octagon-fill"></i>
                                <span>ออกจากระบบ</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3>ข้อมูลนิสิต</h3>
                <div class="col-12 ">
                    <div class="card">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="col-md-2 ">
                                        <img class="d-block w-100 " src="<?php echo $row['student_pic']; ?>" alt="..." style="border-radius: 1rem;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <div class="h5">รหัสนิสิต : <?= $row["student_id"] ?></div>
                                            <div class="h5">ชื่อ : <?= $row["prefix"] ?>
                                                <?= $row["first_name"] ?>
                                                <?= $row["last_name"] ?></div>
                                            <div class="h5">อีเมล : <?= $row["email"] ?></div>
                                            <div class="h5">ภาควิชา : <?= $row["section"] ?></div>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>