<?php
   session_start();
   if(($active = pathinfo(basename($_SERVER['PHP_SELF']), PATHINFO_FILENAME))=='login'){
      $pageName = 'Admin Login';
   }else{
      $pageName = 'Home page';
   }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="ISO-8859-1">
      <title><?= $pageName; ?></title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
   </head>

   <body>

      <nav class="navbar navbar-default"> 
         <div class="navbar-header">          
            <a class="navbar-brand" href="index.php">BD Job</a>
         </div>
         <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
               <li class="<?= ($active=='index') ? 'active' : ''; ?>"><a href="index.php" class="py-0">Home</a></li>
               
               <?php if(isset($_SESSION['loginSuccess'])) { ?>
                  <li><a href="admin.php">Admin</a></li>
                  <li><a href="admin.php?logout=logout">Logout</a></li>
               <?php }else{ ?>
                  <li><a href="login.php">Admin</a></li>
               <?php } ?>
               
               <li><a href="http://www.aslambd.com/" target="_blank">Contact</a></li>
            </ul>             
         </div>
      </nav>