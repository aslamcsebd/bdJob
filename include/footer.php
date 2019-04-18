      
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

      <script type="text/javascript">
         $(document).ready( function () {
             $('.table').DataTable();
         } );
      </script>

      <?php 
         unset($_SESSION['loginFail']);
         unset($_SESSION['jobType']);
         unset($_SESSION['addJob']);
         unset($_SESSION['allJob']);
         unset($_SESSION['jobRequest']);
         unset($_SESSION['addRequest']);
         unset($_SESSION['applySuccess']);
      ?>
   </body>
</html>