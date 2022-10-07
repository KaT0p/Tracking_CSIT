<!-- ดูข้อมูลบทความหน้า นิสิต -->

<?php include'config/db.php' ; 

 session_start();
 if(!isset($_SESSION["sid"])) {
    header('Location: login.php');
}

$ids = $_GET['student_id'];
$type = $_GET['type'];
$sql = "SELECT * FROM student WHERE student_id = '$ids'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บทความและการตีพิมพ์</title>
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
                            <a href="gt01-02_student.php?student_id=<?=$row["student_id"]?>" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>GT01-02</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="progress_student.php?student_id=<?=$row["student_id"]?>"  class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>ความก้าวหน้า</span>
                            </a>
                        </li>

                        <li class="sidebar-item active ">
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
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="container">
                                <div class=" h4 text-center alert alert-primary mb-4 mt-4 " role="alert"> บทความและการตีพิมพ์ </div>
                        
                                <br>


        <div class="h5">รหัสนิสิต : <?= $row["student_id"] ?></div>
        <div class="h5">ชื่อ : <?= $row["prefix"] ?>
            <?= $row["first_name"] ?>
            <?= $row["last_name"] ?></div>
        <div class="h5">อีเมล : <?= $row["email"] ?></div>
        <div class="h5">ภาควิชา : <?= $row["section"] ?></div>

        <a href="chapter_student.php?student_id=<?= $row["student_id"] ?>" class="btn btn-danger mb-4 mt-2">กลับ</a>

        <br>

       
        <?php
        $sql_c = "SELECT * FROM chapter WHERE chapter_id  = '$ids'";
        $result_c = mysqli_query($conn, $sql_c);
        $row_c = mysqli_fetch_array($result_c);

        ?>

                <!-- chapter -->
            <table class="table table-bordered"> <br>
            
                <tr>
                    <th><?php echo "บทความ : ". $type ?></th>
                    
                </tr>
     
                <?php 
    $sql_c = "SELECT * FROM `chapter` WHERE `chapter_type2` = '$type' AND `chapter_student_id` = '$ids';";

    $result = mysqli_query($conn,$sql_c);
    while($row = mysqli_fetch_array($result)){
    ?>

                <tr>
                    <th><a href="<?= $row["chapter_filename"] ?>" target="_bank"> <?=$row["chapter_name"]?> </a></th>
                </tr>

        <?php
     }
     ?>
 <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets/js/main.js"></script>
</body>

</html>