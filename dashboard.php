<?php
    session_start();
    if (isset($_SESSION['username'])) {

       ?>

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
    <title>Donation Management</title>
</head>

<body>
    <div class="col-12 text-right mt-3 mr-4">
        <a href="logout.php" class="btn btn-secondary">LOGOUT</a>
    </div>
    <?php
    $un = $_SESSION['username'];
    include('config.php');
    $query = mysqli_query($con,"SELECT * FROM `user` WHERE `username` = '$un'");
    $row = mysqli_fetch_array($query);
    $id = $row['org_id'];


$type = $_GET['type']; 
    if ($type=="seek") {

        ?>
    <div class="container">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box p-5">
                    <h2>Welcome <?php echo $un; ?>,</h2>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <a href="dashboard.php?type=donate"><button type="button" class="btn btn-info p-5">Want to
                                    Donate</button></a>
                        </div>
                        <div class="col-md-6">
                            <a href="dashboard.php?type=request"><button type="button" class="btn btn-success p-5">Want
                                    to Request</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <?php
    }
    if ($type=="donate") {
if (isset($_POST['submit'])) {
    $donate = $_POST['donate'];
    $items = $_POST['items'];
    $description = $_POST['description'];
    $query = mysqli_query($con,"INSERT INTO `donate`(`org_id`, `username`, `type`, `items`, `description`, `action`) VALUES ('$id', '$un', '$donate', '$items', '$description', 'donation')");
    if ($query) {
        echo "<script>alert('Done ');</script>";
    }else{
        echo "<script>alert('Something wents wrong!');</script>";
    }
}
$q = mysqli_query($con, "SELECT * FROM `donate` WHERE `org_id` = '$id' AND `action` = 'donation'");
$sql = mysqli_num_rows($q);
if ($sql>0) {
    ?>
      <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box p-5">
                    <h2 class="text-center">Request for Donation submitted sucessfully</h2>
                    
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <?php
}else{
        ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box p-5">
                    <h2 class="text-center">Request Donate to us</h2>
                    <form action="" method="post">
                        <div class="form-group mt-4">
                            <select class="form-control" name="donate" id="exampleFormControlSelect1">
                                <option selected>Choose Type</option>
                                <option value="Charity">Charity</option>
                                <option value="Recycle">Recycle</option>
                            </select>
                            <textarea name="items" id="" cols="30" rows="5" class="form-control mt-4"
                                placeholder="Items"></textarea>
                            <textarea name="description" id="" cols="30" rows="5" class="form-control mt-4"
                                placeholder="Description"></textarea>
                            <button type="submit" name="submit" class="btn btn-primary mt-4 btn-block">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <?php
    }
}
    if($type=="request"){
        if (isset($_POST['submit'])) {
            $donate = $_POST['request'];
            $items = $_POST['items'];
            $description = $_POST['description'];
            $query = mysqli_query($con,"INSERT INTO `donate`(`org_id`, `username`, `type`, `items`, `description`, `action`) VALUES ('$id', '$un', '$donate', '$items', '$description', 'request')");
            if ($query) {
                echo "<script>alert('Done');</script>";
            }else{
                echo "<script>alert('Something wents wrong!');</script>";
            }
        }
        $q = mysqli_query($con, "SELECT * FROM `donate` WHERE `org_id` = '$id' AND `action` = 'request'");
$sql = mysqli_num_rows($q);
if ($sql>0) {
        ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box p-5">
                <h2 class="text-center">Request for Donation submitted sucessfully</h2>
                 
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <?php
    }else{
        ?>
            <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box p-5">
                    <h2 class="text-center">Request accept items from us</h2>
                    <form action="" method="post">
                        <div class="form-group mt-4">
                            <select class="form-control" name="request" id="exampleFormControlSelect1">
                                <option selected>Choose Type</option>
                                <option value="Charity">Charity</option>
                                <option value="Recycle">Recycle</option>
                            </select>
                            <textarea name="items" id="" cols="30" rows="5" class="form-control mt-4"
                                placeholder="Items"></textarea>
                            <textarea name="description" id="" cols="30" rows="5" class="form-control mt-4"
                                placeholder="Description"></textarea>
                            <button type="submit" name="submit" class="btn btn-primary mt-4 btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
        <?php 
    }
}
?>
</body>

</html>
<?php
    }else{
        header('Location:login.php');
    }
?>