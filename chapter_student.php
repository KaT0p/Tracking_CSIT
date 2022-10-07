<!-- หน้าบทความและการตีพิมพ์ ของนิสิต  -->

<?php include'config/db.php' ; 

 session_start();
 if(!isset($_SESSION["sid"])) {
    header('Location: login.php');
}

//$ids = $_GET['student_id'];
$ids = $_SESSION["sid"];
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
                        
                                <?php
                                $sql_c = "SELECT * FROM chapter WHERE chapter_id  = '$ids'";
                                $result_c = mysqli_query($conn, $sql_c);
                                $row_c = mysqli_fetch_array($result_c);
                        
                                ?>
                        
                                <div class="h5">รหัสนิสิต : <?= $row["student_id"] ?></div>
                                <div class="h5">ชื่อ : <?= $row["prefix"] ?>
                                    <?= $row["first_name"] ?>
                                    <?= $row["last_name"] ?></div>
                                <div class="h5">อีเมล : <?= $row["email"] ?></div>
                                <div class="h5">ภาควิชา : <?= $row["section"] ?></div>
                        
                                <!-- <a href="index_student.php" class="btn btn-reds mb-4 mt-2">กลับ</a>
                        
                                <a href="gt01-02_student.php?student_id=<?= $row["student_id"] ?>" class="btn btn-success mb-4 mt-2"> GT01-02 </a>
                        
                                <a href="progress_student.php?student_id=<?= $row["student_id"] ?>" class="btn btn-light mb-4 mt-2"> ความก้าวหน้า </a>
                        
                                <a href="chapter_student.php?student_id=<?= $row["student_id"] ?>" class="btn btn-volet mb-4 mt-2"> บทความและการตีพิมพ์ </a>
                         -->
                                <?php
                                $sql_c = "SELECT *, SUM(CASE WHEN true THEN 1 END) as sumt FROM `chapter` WHERE `chapter_student_id` = '$ids' GROUP BY `chapter_type2` ORDER BY `chapter_type1`,`chapter_type2`;";
                                $result_c = mysqli_query($conn, $sql_c);
                                $row_c = mysqli_fetch_array($result_c);
                                ?>
                        
                                <table class="table table-bordered">
                                    <thead class="table-danger">
                                    <tr>
                                        <th>บทความและการตีพิมพ์</th>
                                        <th></th>
                                        <th>จำนวนบทความ</th>
                                    </tr>
                                    </thead>
                                    <tr>
                                        <th>ประชุมวิชาการ</th>
                                        <td>ระดับชาติ</td>
                                        <td>
                                            <?php if (!empty($row_c['chapter_type2']) && $row_c['chapter_type2'] == "ระดับชาติ") {
                                                echo "<a href='chapter_show_student.php?student_id=$ids&type=ระดับชาติ '>".$row_c['sumt']."</a>";
                                                $row_c = mysqli_fetch_array($result_c);
                                            } ?>
                                        </td>
                                    </tr>
                        
                                    <tr>
                                        <td></td>
                                        <td>นานาชาติ</td>
                                        <td><?php if (!empty($row_c['chapter_type2']) && $row_c['chapter_type2'] == "นานาชาติ") {
                                                echo "<a href='chapter_show_student.php?student_id=$ids&type=นานาชาติ '>".$row_c['sumt'];
                                                $row_c = mysqli_fetch_array($result_c);
                                            } ?></td>
                        
                                    </tr>
                        
                                    <tr>
                                        <th>วารสารระดับชาติ</th>
                                        <td>TCI</td>
                                        <td><?php if (!empty($row_c['chapter_type2']) && $row_c['chapter_type2'] == "TCI") {
                                                echo "<a href='chapter_show_student.php?student_id=$ids&type=TCI '>".$row_c['sumt'];
                                                $row_c = mysqli_fetch_array($result_c);
                                            } ?></td>
                        
                                    </tr>
                        
                                    <tr>
                                        <th></th>
                                        <td>อื่นๆระดับชาติ</td>
                                        <td><?php if (!empty($row_c['chapter_type2']) && $row_c['chapter_type2'] == "อื่นๆระดับชาติ") {
                                                echo "<a href='chapter_show_student.php?student_id=$ids&type=อื่นๆระดับชาติ '>".$row_c['sumt'];
                                                $row_c = mysqli_fetch_array($result_c);
                                            } ?></td>
                        
                                    </tr>
                        
                                    <tr>
                                        <th>วารสารนานาชาติ</th>
                                        <td>ISI</td>
                                        <td><?php if (!empty($row_c['chapter_type2']) && $row_c['chapter_type2'] == "ISI") {
                                                echo "<a href='chapter_show_student.php?student_id=$ids&type=ISI '>".$row_c['sumt'];
                                                $row_c = mysqli_fetch_array($result_c);
                                            } ?></td>
                        
                                    </tr>
                        
                                    <tr>
                                        <th></th>
                                        <td>SCOPUS</td>
                                        <td><?php if (!empty($row_c['chapter_type2']) && $row_c['chapter_type2'] == "SCOPUS") {
                                                echo "<a href='chapter_show_student.php?student_id=$ids&type=SCOPUS '>".$row_c['sumt'];
                                                $row_c = mysqli_fetch_array($result_c);
                                            } ?></td>
                        
                                    </tr>
                        
                                    <tr>
                                        <th></th>
                                        <td>อื่นๆนานาชาติ</td>
                                        <td><?php if (!empty($row_c['chapter_type2']) && $row_c['chapter_type2'] == "อื่นๆนานาชาติ") {
                                                echo "<a href='chapter_show_student.php?student_id=$ids&type=อื่นๆนานาชาติ '>".$row_c['sumt'];
                                                $row_c = mysqli_fetch_array($result_c);
                                            } ?></td>
                        
                                    </tr>
                            
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
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
       