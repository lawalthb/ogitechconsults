

<?php include '../connection.php';?>


<?php include 'header.php';?>


<body class="w3-content" style="max-width:1200px">




  <div class="w3-container">
  <br ><br ><br >
<center>
   <div class="w3-col-2 s4 w3-center" style="width: 50%;" >
        <h4>Admin Login</h4>
        <p>Enter your Username and Password</p>
        <form action="admin_login_action.php"  method="post">
          <p><input class="w3-input w3-border" type="text" placeholder="Username" name="username" required></p>
          <p><input class="w3-input w3-border" type="password" placeholder="Password" name="password" required></p>

          <button type="submit" class="w3-button w3-block w3-black">submit</button>
        </form>
      </div>
      </center>
</div>
 <br> <br>
  <!-- Footer -->
  <?php include '../footer.php';?>



  <!-- End page content -->
</div>


<script src="../js/js_script.js"></script>
</body>
</html>
