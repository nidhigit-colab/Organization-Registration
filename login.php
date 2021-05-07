<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
        rel="stylesheet" />
    <script src="/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Organization Login</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Organization Registration Login</h2>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <?php
                if (isset($_POST['login'])) {
                    $un  = $_POST['username'];
                    $pass = $_POST['password'];
                    //password decrypted
                    $pass = md5($pass);
                    include('config.php');
                    $query = mysqli_query($con,"SELECT * FROM `user` WHERE `username` = '$un' AND `password` = '$pass'");
                    $count = mysqli_num_rows($query);
                    if ($count>0) {
                        session_start();
                        $_SESSION['username'] = $un;
                        echo "<script>alert('Login Successful');
                        window.location.href='dashboard.php?type=seek';</script>";
                    }else{
                        echo "<script>alert('Something wents wrong');</script>";
                    }
                }
            ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <div class="box">
                                <b class="label">Username</b>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="box">
                                <b class="label">Password</b>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 btn-lg btn-block" name="login">LOGIN</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>

    </div>
</body>

</html>