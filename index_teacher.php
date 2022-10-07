<!-- หน้าแรก อาจารย์ -->

<?php include'config/db.php' ; 

session_start();
if (!isset($_SESSION["tid"])) {
    header('Location: login.php');
}

$idt = $_SESSION["tid"] ;
$sql = "SELECT * FROM teachers WHERE teachers_id = '$idt'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแรก</title>
    <!-- CSS only -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css"  rel="stylesheet" >
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
                        <li class="sidebar-title"></li>

                        <li class="sidebar-item active ">
                            <a href="index_teacher.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>ข้อมูลอาจารย์</span>
                            </a>

                            <li class="sidebar-item  ">
                            <a href="logout.php" class='sidebar-link'>
                                <i class="bi bi-x-octagon-fill"></i>
                                <span>ออกจากระบบ</span>
                            </a>
                        </li>

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
                <h3>ข้อมูลอาจารย์</h3>
                 <div class="col-12 ">
                                <div class="card">
                                    <div class="card">
                                        <div class="card-body py-4 px-5">
                                            <div class="d-flex align-items-center">
                                                <div class="col-md-2 ">
                                                    <img class="d-block w-100 " src="<?php echo $row['teachers_pic']; ?>"  alt="..."  style="border-radius: 1rem;">
                                                </div>
                                            </div>
                                        </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                        <div class = "container">
                                      
                                            <div class="h5">คำนำหน้า : <?=$row['teachers_prefix']?></div>
                                            <div class="h5">ชื่อ : <?=$row["teachers_first_name"]?>
                                                                <?=$row["teachers_last_name"]?></div>
                                            <div class="h5">อีเมล :  <?=$row["teachers_email"]?></div>

                                            <!-- <a href="logout.php"  class="btn btn-danger mb-4 mt-2" >Logout</a>    -->
                                                
                                            <br>
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
    