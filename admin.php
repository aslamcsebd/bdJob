<?php include('include/header.php'); ?>

<?php
  include('connection.php');
  $conn=db();

   if (!isset($_SESSION['loginSuccess'])) {
      header("Location: login.php");
   }

  // Default query
   $sql = "select * from district";
   $district = mysqli_query($conn,$sql);

   $sql = "select * from jobtype";
   $jobtype = mysqli_query($conn,$sql);

   $sql = "select * from joblist";
   $joblist = mysqli_query($conn,$sql);

   $sql = "select * from jobrequest";
   $jobRequest = mysqli_query($conn,$sql);

   // Add job type
   if (isset($_POST['addJobType'])){
      $name=$_POST['name']; 
      $sql="insert into jobType values (null, '$name')";
      $result=mysqli_query($conn,$sql);
      if ($result) {
         $_SESSION['jobType'] = 'Job type add successfully';
      }
   }

   // Add job
   if (isset($_POST['addJob2'])){
      $area=$_POST['area'];   
      $jobType=$_POST['jobType2'];
      $education=$_POST['education'];
      $experience=$_POST['experience'];
      $salary=$_POST['salary'];
      $applyDate=$_POST['applyDate'];

      $sql= "insert into joblist values (null, '$area', '$jobType', '$education', '$experience', '$salary', '$applyDate')";
      $result=mysqli_query($conn,$sql);
      if ($result) {
         $_SESSION['addJob'] = 'Job add successfully';
      }
   }

   if (isset($_POST['logout']) || isset($_GET['logout'])){
      session_start();
      session_destroy();
      header("location: index.php");
   }
?>

	<div class="container-fluid">
      <fieldset>
         <legend>Admin home page</legend>			
		   <div class="row">
            <div class="col-md-4">
               <fieldset>
                  <legend>Job Matter</legend>
      				<div class="col-sm-offset-2 col-sm-2">
                     <form action="" method="post">
                        <ul>

                           <li>
                              <button type="submit" class="btn btn-success" name="jobType">Add Job Type</button>
                           </li>
                           <li>
                              <button type="submit" class="btn btn-info" name="addJob">Add Job</button>
                           </li>
                           <li>
                              <button type="submit" class="btn btn-warning" name="allJob">See all job</button>
                           </li>
                           <li>
                              <button type="submit" class="btn btn-secondary" name="jobRequest">Job Request</button>
                           </li>
                           <li>
                              <button type="submit" class="btn btn-danger" name="logout">Logout</button>
                           </li>
                        </ul>
                     </form>
      				</div>
               </fieldset>               
            </div>
            <div class="col-md-8 text-center">
               
               <!-- Job type -->
               <?php if (isset($_POST['jobType']) || isset($_SESSION['jobType'])) { ?>
                  <fieldset>
                     <legend> Add job type</legend>
                        <?php if (isset($_SESSION['jobType'])) { ?>
                           <div class="alert alert-danger">                           
                              <?php echo $_SESSION['jobType']?>
                           </div>
                        <?php } ?>                          
                        <form action="" class="form-inline" method="post">
                           <div class="form-group">
                              <label for="jobType">Last Name : </label>
                              <input type="text" class="form-control" id="jobType" name="name" placeholder="Designer" required>
                           </div>
                           <button type="submit" name="addJobType" class="btn btn-sm btn-success">Submit</button>
                        </form>
                  </fieldset>
               <?php } ?>

               <!-- Add Job -->
               <?php if (isset($_POST['addJob']) || isset($_SESSION['addJob'])) { ?>
                  <fieldset>
                     <legend> Add job</legend>
                     <form action="" method="POST" class="form-horizontal">

                        <?php if (isset($_SESSION['addJob'])) { ?>
                           <div class="alert alert-danger">                           
                              <?php echo $_SESSION['addJob']?>
                           </div>
                        <?php } ?>

                        <div class="form-group">
                           <label class="control-label col-sm-4 text-right" for="area">Area :</label>
                           <div class="col-sm-8">
                              <select name='area' class="form-control" required>
                                 <option value="">Select area</option>
                                 <?php while($row = mysqli_fetch_assoc($district)) { ?>
                                    <option value="<?= $row['name']; ?>"><?= $row['name']; ?></option>
                                 <?php } ?>                  
                              </select>
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="control-label col-sm-4 text-right" for="jobType2">Job type :</label>
                           <div class="col-sm-8">
                              <select name='jobType2' class="form-control" required>
                                 <option value="">Select job type</option>
                                 <?php while($row = mysqli_fetch_assoc($jobtype)) { ?>
                                    <option value="<?= $row['name']; ?>"><?= $row['name']; ?></option>
                                 <?php } ?>                  
                              </select>
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="control-label col-sm-4 text-right" for="education">Education :</label>
                           <div class="col-sm-8">
                              <select name='education' class="form-control" required>
                                 <option value="">Select education</option>
                                 <option value="psc">PSC</option>  
                                 <option value="jsc">JSC</option>  
                                 <option value="ssc">SSC</option>  
                                 <option value="hsc">HSC</option>  
                                 <option value="BSC">BSC</option>  
                                 <option value="Diploma">Diploma</option>  
                                 <option value="other">Other</option>                        
                              </select>   
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="control-label col-sm-4" for="experience">Experience :</label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control" id="experience" name="experience" placeholder="Enter experience">
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="control-label col-sm-4" for="salary">Salary :</label>
                           <div class="col-sm-8">
                             <input type="number" class="form-control" id="salary" name="salary" placeholder="Enter salary">
                           </div>
                        </div>

                        <div class="form-group">
                           <label class="control-label col-sm-4" for="applyDate">Apply Last Date :</label>
                           <div class="col-sm-8">
                             <input type="date" class="form-control" id="applyDate" name="applyDate">
                           </div>
                        </div>

                        <button type="submit" class="btn btn-warning col-sm-offset-4 col-sm-4" name="addJob2">Add Now</button>  
                     </form>
                  </fieldset>
               <?php } ?>

               <!-- All job -->
               <?php if (isset($_POST['allJob']) || isset($_SESSION['allJob'])){ ?>
                  <fieldset>
                     <legend> All job</legend>
                        <?php if (isset($_SESSION['allJob'])) { ?>
                           <div class="alert alert-danger">                           
                              <?php echo $_SESSION['allJob']?>
                           </div>
                        <?php } ?>
                     <table class="table bg-info table-bordered">
                        <thead>
                           <th>Area</th>
                           <th>Job Type</th>
                           <th>education</th>
                           <th>salary</th>
                           <th>Action</th>
                        </thead>
                        <tbody>
                           <?php while($row = mysqli_fetch_assoc($joblist)) { ?>
                              <tr>
                                 <td><?= $row['area'];?></td>
                                 <td><?= $row['jobType'];?></td>
                                 <td><?= $row['education'];?></td>
                                 <td><?= $row['salary'];?></td>
                                 <td>
                                    <a class="btn btn-sm btn-danger" href="index.php?jobId=<?php echo $row['id']; ?>">Delete</a>
                                 </td>
                              </tr>
                           <?php } ?>
                       </tbody>
                     </table>
                  </fieldset>
               <?php } ?>

                <!-- Job request -->
               <?php if (isset($_POST['jobRequest']) || isset($_SESSION['jobRequest'])){ ?>
                  <fieldset>
                     <legend> All job</legend>
                        <?php if (isset($_SESSION['jobRequest'])) { ?>
                           <div class="alert alert-danger">                           
                              <?php echo $_SESSION['jobRequest']?>
                           </div>
                        <?php } ?>
                     <table class="table bg-info table-bordered">
                        <thead>
                           <th>Area</th>
                           <th>Job Type</th>
                           <th>Employee</th>
                           <th>Mobile</th>
                           <th>Email</th>
                           <th>Address</th>
                           <th>Action</th>
                        </thead>
                        <tbody>
                           <?php while($row = mysqli_fetch_assoc($jobRequest)) { ?>
                              <?php
                                 $jobId = $row['jobId'];
                                 $sql = "select * from joblist where id='$jobId'";
                                 $jobInfo = mysqli_query($conn,$sql);
                                 $jobInfo2 = mysqli_fetch_assoc($jobInfo);
                              ?>
                              <tr>
                                 <td><?= $jobInfo2['area'];?></td>
                                 <td><?= $jobInfo2['jobType'];?></td>
                                 <td><?= $row['name'];?></td>
                                 <td><?= $row['mobile'];?></td>
                                 <td><?= $row['email'];?></td>
                                 <td><?= $row['address'];?></td>
                                 <td>
                                    <a class="btn btn-sm btn-danger" href="index.php?jobRequestId=<?php echo $row['id']; ?>">Delete</a>
                                 </td>
                              </tr>
                           <?php } ?>
                       </tbody>
                     </table>
                  </fieldset>
               <?php } ?>

            </div>
			</div>
      </fieldset>
	</div>

<?php include('include/footer.php'); ?>
