<?php include('include/header.php'); ?>

<?php
   include('connection.php');
   $conn=db();

   if (isset($_GET['id'])){
      
      $id = $_GET['id'];
      
      $sql="select * from joblist where id='$id'";
      $job = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($job);
   }

   if (isset($_POST['jobRequest'])){
      
      $jobId   = $_POST['id'];
      $name    = $_POST['name'];
      $mobile  = $_POST['mobile'];
      $email   = $_POST['email'];
      $address = $_POST['address'];

      
      $sql="insert into jobrequest values (null, '$jobId', '$name', '$mobile', '$email', '$address')";
      $addRequest = mysqli_query($conn,$sql);
      if ($addRequest) {
         $_SESSION['applySuccess'] = 'Job request process successfully';
         header("location: index.php");
      }else{
         $_SESSION['addRequest'] = 'Job request process fail';
      }
   }
?>

   <div class="container-fluid">
      <form action="" method="POST" class="col-sm-offset-4 col-sm-4">

         <?php if (isset($_SESSION['addRequest'])) { ?>
            <div class="alert alert-danger">                           
               <?php echo $_SESSION['addRequest']?>
            </div>
         <?php } ?>
         <fieldset>
            <legend>Enter Your Information</legend>
            <table class="table table-bordered">
               <input name="id" value="<?= $row['id'] ?>" hidden>
               <tr>
                  <th class="text-right"><label>Job info</label></th>
                  <td>                       
                     <label><?=  $row['area']. ' [' .$row['jobType']. ']'; ?></label>
                  </td>                 
               </tr>
               <tr>
                  <th class="text-right"><label>Your Name</label></th>
                  <td>
                     <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                  </td>                 
               </tr>
               <tr>
                  <th  class="text-right"><label>Mobile</label></th>
                  <td>
                     <input type="text" class="form-control" name="mobile" placeholder="Mobile" required>
                  </td>                 
               </tr>  
               <tr>
                  <th  class="text-right"><label>Email</label></th>
                  <td>
                     <input type="email" class="form-control" name="email" placeholder="Email" required>
                  </td>                 
               </tr>                  
               <tr>
                  <th  class="text-right"><label>Address</label></th>
                  <td>
                     <textarea type="text" class="form-control" name="address" placeholder="Address" required></textarea>
                  </td>                 
               </tr>
            </table>
            <a href="index.php" class="btn btn-success col-sm-3">Back Now</a>
            <button type="submit" class="btn btn-warning col-sm-offset-1 col-sm-4" name="jobRequest">Apply now</button>
         </fieldset>
      </form>
   </div>

<?php include('include/footer.php'); ?>
