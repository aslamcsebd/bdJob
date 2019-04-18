<?php

   $color = array('bg-primary', 'bg-success', 'bg-info', 'bg-warning', 'bg-danger');
   include('connection.php');
   $conn=db();

   // Default query
   $sql = "select * from joblist group by area";
   $district = mysqli_query($conn,$sql);

   $sql = "select * from joblist group by jobType";
   $jobtype = mysqli_query($conn,$sql);

   $sql="select * from joblist";

   $jobList = mysqli_query($conn,$sql);
   $totalJob = mysqli_num_rows($jobList);

	if(isset($_POST['searchJob'])){

	  	$area = $_POST['area'];  
   	$jobType = $_POST['jobType'];

	   $sql="select * from joblist where area='$area' and jobType='$jobType'";
	   $jobList = mysqli_query($conn,$sql);
      $totalJob = mysqli_num_rows($jobList);
	}

   // Job id delete
   if (isset($_GET['jobId'])) {
      $id=$_GET['jobId'];
      $sql = "delete from joblist where id='$id'";
      $joblist = mysqli_query($conn,$sql);
      if ($joblist){
         $sql = "delete from jobrequest where jobId='$id'";
         $joblist2 = mysqli_query($conn,$sql);

         $_SESSION['allJob'] = 'Job post delete successfully';
         header('Location: ' . $_SERVER['HTTP_REFERER']);
      }

   }

   // Job request id
   if (isset($_GET['jobRequestId'])) {
      $id=$_GET['jobRequestId'];
      $sql = "delete from jobrequest where id='$id'";
      $joblist2 = mysqli_query($conn,$sql);
      if ($joblist2) {
         $_SESSION['jobRequest'] = 'Job request delete successfully';
         header('Location: ' . $_SERVER['HTTP_REFERER']);
      }
   }
   
?>

<?php include('include/header.php'); ?>

	<div class="container-fluid">	
		<div class="row">	
			<div class="col-sm-offset-4 col-sm-4" >					
				<fieldset>
               <legend>Search particular job</legend>
               <form action="" method="POST" class="form-horizontal">
                  <div class="form-group">
                     <label class="control-label col-sm-4 text-right" for="area">Area :</label>
                     <div class="col-sm-8">
                        <select name='area' class="form-control" required>
                           <option value="">Select area</option>
                           <?php while($row = mysqli_fetch_assoc($district)) { ?>
                              <option value="<?= $row['area']; ?>"><?= $row['area']; ?></option>
                           <?php } ?>                  
                        </select>
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label col-sm-4 text-right" for="jobType2">Job type :</label>
                     <div class="col-sm-8">
                        <select name='jobType' class="form-control" required>
                           <option value="">Select job type</option>
                           <?php while($row = mysqli_fetch_assoc($jobtype)) { ?>
                              <option value="<?= $row['jobType']; ?>"><?= $row['jobType']; ?></option>
                           <?php } ?>                  
                        </select>
                     </div>
                  </div> 

                  <button type="submit" class="btn btn-warning col-sm-offset-4 col-sm-4" name="searchJob">Search Now</button>  
               </form>
            </fieldset>	
		   </div>
      </div>
     
      <?php if (isset($_SESSION['applySuccess'])) { ?>
         <div class="alert alert-danger text-center">                           
            <?php echo $_SESSION['applySuccess']?>
         </div>
      <?php } ?>
 
		<?php if(isset($_POST['searchJob'])){ ?>
         <fieldset>
            <legend>Total Job [<?=$totalJob?>]</legend>
				<div class="row">
			      <?php while($row = mysqli_fetch_assoc($jobList)) { ?>
   					<div class="col-sm-4 col-md-4 col-lg-4">
   						<table class="table table-bordered">
   	     					<tr class="<?= $color[rand(0, 4)]; ?>">
                           <th class="text-right"><label style="color: #000 !important;">Job Area</label></th>
                           <td><label style="color: #000 !important;"><?= $row['area']; ?></label></td>     
                        </tr>
   	                  <tr>
   	                      <th  class="text-right"><label>Job Type</label></th>
   	                     <td><label> <?= $row['jobType']; ?></label> </td>     
   	                  </tr>
   	                  <tr>		                 
   	                      <th  class="text-right"><label>Education</label></th>
   	                     <td><label> <?= $row['education']; ?> </label></td>     
   	                  </tr>
   	                  <tr>		   
   	                      <th  class="text-right"><label>Experience</label></th>  
   	                     <td><label> <?= $row['experience']. " year"; ?></label> </td>     
   	                  </tr>
                        <tr>       
                            <th  class="text-right"><label>Salary</label></th>  
                           <td><label> <?= $row['salary']; ?></label> </td>     
                        </tr>
   	                  <tr>
   	                     <th  class="text-right"><label>Apply last date</label></th>
   	                     <td><label>  <?= $row['applyDate']; ?> </label></td>     
   	                  </tr>
   	                  <tr>
   	                     <th  class="text-right"><label>For User</label></th>
   	                     <td>
   	                     	<a href="request.php?id=<?= $row['id'];?>" class="btn btn-sm btn-success">Apply now</a>
                           </td>     
   	                  </tr>
     						</table>
     					</div>
               <?php } ?> 
  				</div>
         </fieldset>
  		
      <?php }else{ ?>
         <fieldset>
            <legend>Total Job [<?=$totalJob?>]</legend>
            <div class="row">
               <?php while($row = mysqli_fetch_assoc($jobList)) { ?>
                  <div class="col-sm-4 col-md-4 col-lg-4">
                     <table class="table table-bordered">
                        <tr class="<?= $color[rand(0, 4)]; ?>">
                           <th class="text-right"><label style="color: #000 !important;">Job Area</label></th>
                           <td><label style="color: #000 !important;"><?= $row['area']; ?></label></td>     
                        </tr>
                        <tr>
                            <th  class="text-right"><label>Job Type</label></th>
                           <td><label> <?= $row['jobType']; ?></label> </td>     
                        </tr>
                        <tr>                      
                            <th  class="text-right"><label>Education</label></th>
                           <td><label> <?= $row['education']; ?> </label></td>     
                        </tr>
                        <tr>        
                            <th  class="text-right"><label>Experience</label></th>  
                           <td><label> <?= $row['experience']. " year"; ?></label> </td>     
                        </tr>
                        <tr>       
                            <th  class="text-right"><label>Salary</label></th>  
                           <td><label> <?= $row['salary']; ?></label> </td>     
                        </tr>
                        <tr>
                           <th  class="text-right"><label>Apply last date</label></th>
                           <td><label>  <?= $row['applyDate']; ?> </label></td>     
                        </tr>
                        <tr>
                           <th  class="text-right"><label>For User</label></th>
                           <td>
                              <a href="request.php?id=<?= $row['id'];?>" class="btn btn-sm btn-success">Apply now</a>
                           </td>     
                        </tr>
                     </table>
                  </div>
               <?php } ?> 
            </div>
         </fieldset>
      
      <?php } ?>
  	</div>

<?php include('include/footer.php'); ?>
     