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
                    $query = mysqli_query($con,"SELECT * FROM `organization` WHERE `username` = '$un' AND `password` = '$pass'");
                    $count = mysqli_num_rows($query);
                    if ($count>0) {
                        session_start();
                        $_SESSION['username'] = $un;
                        echo "<script>alert('Login Successful');
                        window.location.href='dashboard.php?type=seek';</script>";
                    }else{
                        echo "<script>alert('Incorrect Username or Password');</script>";
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
                    <a href="" class="float-right mb-5"  data-toggle="modal" data-target="#exampleModal">Forget Password?</a>
                    <button type="submit" class="btn btn-primary mt-4 btn-lg btn-block" name="login">LOGIN</button>
                    <a href="register.php" class="btn btn-success mt-4 btn-lg btn-block">REGISTER</a>

                </form>
            </div>
            <div class="col-md-3"></div>
        </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Forget Password?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
      if(isset($_POST['submit']))
{
    include('config.php');
    $email = $_POST['email'];
    $result = mysqli_query($con,"SELECT * FROM `organization` where `email` ='$email'");
    $row = mysqli_fetch_assoc($result);
	$fetch_user_id = $row['org_id'];
	$email_id = $row['email'];
	$password = $row['password'];
				$to = $email_id;
                $subject = "Password";
                $txt = "Your password is : $password.";
                $headers = "From: donatemore100@gmail.com" . "\r\n" .
                "CC: '.$email_id.'";
                mail($to,$subject,$txt,$headers);
                echo "<script>alert('Password sent successfully!');</script>";
			}
				else{
					echo 'invalid userid';
				}

?>
      <form action="" method="post">
      <div class="modal-body">
       
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Enter email id" required>
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Continue</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>