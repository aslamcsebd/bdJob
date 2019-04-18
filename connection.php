<?php

   function db() {
      $conn =mysqli_connect('localhost', 'root', '', 'bdjob');
      // $conn =mysqli_connect('localhost', 'aslamcsebd', 'aslam@cpanel' ,'aslamcsebd_bdJob');
      return $conn;
   }
?>
