<?php include('include/header.php'); ?>

<?php
   include('connection.php');
   $conn=db();

   if (isset($_SESSION['loginSuccess'])) {
      header("Location: admin.php");
   }
   if (isset($_POST['login'])) {

      $email = $_POST['email'];
      $password = $_POST['password'];

      $sql = "select * from user where email='$email' and password='$password'";
      $result = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($result);

      if($count > 0){
         $_SESSION['loginSuccess'] = true;
         header("Location: admin.php");
      }else{
         $_SESSION['loginFail'] = 'Email or password wrong';
      }
   }
?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-offset-4 col-md-4">
				<fieldset>
               <legend>User/Admin login page</legend>
                  <?php if (isset($_SESSION['loginFail'])) { ?>
                     <div class="alert alert-danger">                           
                        <?php echo $_SESSION['loginFail']?>
                     </div>
                  <?php } ?>                          
                  <form action="" method="post" class="form-horizontal">
                     <div class="form-group">
                        <label class="control-label col-sm-4" for="email">Email</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-4" for="password">Password</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-success col-sm-offset-4 col-sm-4" name="login">Login now</button>
                  </form>
            </fieldset>
	      </div>
	   </div>
	</div>

<?php include('include/footer.php'); ?>
  