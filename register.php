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
    <title>Organization Registration</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
            <h2>Organization Registration</h2>
            </div>
            <div class="col-6 text-right"><a href="login.php" class="btn btn-primary">LOGIN</a></div>
        </div>
        <?php

if (isset($_POST['register'])) {
    include("config.php");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $mob = $_POST['mob'];
    $address = $_POST['address'];
    $error = 0;

    $query = mysqli_query($con,"SELECT * FROM `user` WHERE `username` = '$username'");
    $co = mysqli_num_rows($query);
    if ($co>0) {
        $error = 1;
        echo "<script> alert('Username already exists!');</script>";
    }
   if ($error == 0) {
    if ($_FILES['pdfFile']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile']['tmp_name'];
		$dest_file = "documents/".$_FILES['pdfFile']['name'];
		if (file_exists($dest_file)) {
			print "The file name already exists!!";
		}
		else {
			move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
			if($_FILES['pdfFile']['error'] == 0) {
                $id = "OR".rand();
                //password encrypted
                $pass = md5($password);
                $sql = "INSERT INTO `user`(`org_id`, `username`, `password`, `email`, `name`, `verified`, `contact`, `address`) VALUES ('$id', '$username', '$pass', '$email','$name','$dest_file','$mob','$address')";
                $query = mysqli_query($con, $sql);
				if ($query) {
                    echo "<script>
                    window.location.href='login.php';
                    alert('Registered Successfully!');</script>";
                }else{
                    echo "<script>alert('Something wents wrong!');</script>";
                }
				// print "<b><u>Details : </u></b><br/>";
				// print "File Name : ".$_FILES['pdfFile']['name']."<br.>"."<br/>";
				// print "File Size : ".$_FILES['pdfFile']['size']." bytes"."<br/>";
				// print "File location : documents/".$_FILES['pdfFile']['name']."<br/>";
			}
		}
	}
   }
	else {
		if ( $_FILES['pdfFile']['type'] != "application/pdf") {
			print "Error occured while uploading file : ".$_FILES['pdfFile']['name']."<br/>";
			print "Invalid  file extension, should be pdf !!"."<br/>";
			print "Error Code : ".$_FILES['pdfFile']['error']."<br/>";
		}
	}

}



?>
        <form action="" method="post"  enctype="multipart/form-data">
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="box">
                        <b class="label">Username</b>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box">
                        <b class="label">Password</b>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="box">
                        <b class="label">Email</b>
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box">
                        <b class="label">Name</b>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="box">
                        <b class="label">Mobile Number</b>
                        <input type="text" name="mob" class="form-control" autocomplete="off" placeholder="Mobile Number">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box">
                        <b class="label">Upload your legal document</b>
                        <input type="hidden" name="MAX_FILE_SIZE" value="200000" /> <input type="file"
                            name="pdfFile" class="form-control" placeholder="Name" /><br />
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="box">
                        <b class="label">Address</b>
                        <textarea id="" cols="30" rows="5" name="address" class="form-control"
                            placeholder="Address"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" name="register" class="btn btn-primary btn-block btn-lg mt-4">REGISTER</button>
            </div>
    </div>
    </form>
    </div>
</body>

</html>