<!-- หน้า Login  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="sass/custom.css">
    <!-- CSS only -->
</head>

<body>
    <?php
    require_once('config/db.php');
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $role = $_POST['role'];
        if ($role == 'admin') {
            // ตรวจ login ของ Admin 
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM `admin` WHERE `admin_user` = '$email' AND `admin_password` = '$password'"; 
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $_SESSION["aid"] = $row['admin_id'];
                header('Location: index.php');
            } else {
                $status = false;
            }
        } else if ($role == 'student') {
            // ตรวจ login ของ นิสิต
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM `student` WHERE `student_user` = '$email' AND `student_password` = '$password'"; 
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $_SESSION["sid"] = $row['student_id'];
                header('Location: index_student.php');
            } else {
                $status = false;
            }
        } else if ($role == 'teachers') {
            // ตรวจ login ของ อาจารย์
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM `teachers` WHERE `teachers_user` = '$email' AND `teachers_password` = '$password'"; 
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $_SESSION["tid"] = $row['teachers_id'];
                header('Location: index_teacher.php');
            } else {
                $status = false;
            }
        }
    }
    ?>

    <section class="vh-100" style="background-color: #4bad31;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem; ">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img>
                            <img src="assets/images/1.png"  class="mx-auto d-block " alt="logo" style=" height: 250px; margin: 200px; display: block;  width: 250px; border-radius: 1.5rem;"/>
                            </img>
                            </div>
                            
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST" action="login.php">
                                        
                                        <h1 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign in</h1>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">User :</label>
                                            <input type="text" name="email" id="form2Example17" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">Password :</label>
                                            <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example27">Status :</label>
                                            <select class="form-select" name="role" aria-label="Default select example" required>
                                                <option value="student">Student</option>
                                                <option value="teachers">Teachers</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
    </style>
    <!-- <form method="POST" action="login.php">

        <label>User</label>
        <input type="text" name="email">

        <br><br>

        <label>Password</label>
        <input type="password" name="password">

        <br><br>

        <select class="form-select" name="role" aria-label="Default select example" required>
            <option value="student">Student</option>
            <option value="teachers">Teachers</option>
            <option value="admin">Admin</option>
        </select>

        <br><br>

        <div>
            <button type="submit">LOGIN</button>
        </div>
    </form> -->
</body>

</html>