<div id="add_product_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('add_product_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Register</h2>
      <p>Register with your valid information.</p>
      <form action="register_action.php" method="post" >
      <div class="w3-row">

          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" type="text" name="firstname" placeholder="Enter First Name" required >
          </div>
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" name="lastname" placeholder="Enter Last Name" required>
          </div>


          
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" name="matric_no" placeholder="Enter Matric Number"  >
          </div>
          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" type="email"  name="email" placeholder="Enter E-mail" required >
          </div>

         

          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" type="password" name="password" placeholder="Enter Password" required >
          </div>
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="password" placeholder="Confirm Password" required>
          </div>

          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" name="phone" placeholder="Enter Phone No." required>
          </div>
          
          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" name="gender"  required>
              <option value="" disabled selected>Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              </select>
          </div>
          

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" name="level"  required>
              
              <option value="" disabled selected>Select Level</option>
              <option value="ND 1">ND 1</option>
              <option value="ND 2">ND 2</option>
              <option value="HND 1">HND 1</option>
              <option value="HND 2">HND 2</option>
              <option value="ND 3">ND 3</option>
              <option value="HND 3">HND 3</option>
          
          </select>
          </div>
          

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" name="department"  required>
              
              <option value="" disabled selected>Select Department</option>
              <option value="1">MalComputer</option>
              <option value="2">Act</option>
          </select>
          </div>
          
 

          
 


          <div class="w3-half w3-container w3-panel ">
              <span style="font-size:13px"> Please answer question to verify you are human <b>2</b> + <b>3</b> =
          </div>
          <div class="w3-half w3-container  ">
         
              <input class="w3-input w3-border" type="text" placeholder= " Answer ?" required>
          
          </div>
         

      </div> 
      <br />
      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom"
               onclick="document.getElementById('viewcart').style.display='none'">Submit</button>
     

      <br />
      <a href="#" onclick="register_login();" >[ Already Register Login Here ] </a>
    </div>
  </div>
</div>