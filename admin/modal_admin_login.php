<div id="admin_login_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('admin_login_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Admin Login</h2>
      <form action="admin_login_action.php" method="post" >
      <p>Login to access your account</p>
      <p><input class="w3-input w3-border" type="text" name="username" placeholder="Enter Username" required></p>
      <p><input class="w3-input w3-border" type="password" name="password" placeholder="Enter Password" required></p>
      <div class="row">
          <div class="w3-half w3-container w3-panel ">
              <span style="font-size:13px"> Please answer question to verify you are human <b>2</b> + <b>3</b> =
          </div>
          <div class="w3-half w3-container  ">
         
              <input class="w3-input w3-border" type="text" placeholder= " Answer ?" required>
          
          </div>
          <br>
      

      <br />
      </div>
      
      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom " onclick="document.getElementById('viewcart').style.display='none'">Submit</button>
      </form>

      
    </div>
  </div>
</div>