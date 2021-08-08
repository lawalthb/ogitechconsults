<?php include '../connection.php';?>
<div id="add_user_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('add_user_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Register New Admin</h2>
      <p>Register with valid information.</p>
      <form action="add_subadmin_action.php" method="post" >
      <div class="w3-row">

          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" type="text" name="firstname" placeholder="Enter First Name" required >
          </div>
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" name="lastname" placeholder="Enter Last Name" required>
          </div>


          
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" name="username" placeholder="Enter Username"  >
          </div>
          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" type="email"  name="email" placeholder="Enter E-mail" required >
          </div>

         

         
          Password we be "store12345"

      </div> 
      <br />
      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom"
               onclick="document.getElementById('viewcart').style.display='none'">Submit</button>
     

     
    </div>
  </div>
</div>