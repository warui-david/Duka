<!-- multistep form -->
<form id="msform">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Social Profiles</li>
    <li>Personal Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Create your account</h2>
    <h3 class="fs-subtitle">This is step 1</h3>
    <input type="text" name="email" placeholder="Email" />
    <input type="password" name="pass" placeholder="Password" />
    <input type="password" name="cpass" placeholder="Confirm Password" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Social Profiles</h2>
    <h3 class="fs-subtitle">Your presence on the social network</h3>
    <input type="text" name="twitter" placeholder="Twitter" />
    <input type="text" name="facebook" placeholder="Facebook" />
    <input type="text" name="gplus" placeholder="Google Plus" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
    <input type="text" name="fname" placeholder="First Name" />
    <input type="text" name="lname" placeholder="Last Name" />
    <input type="text" name="phone" placeholder="Phone" />
    <textarea name="address" placeholder="Address"></textarea>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
  </fieldset>
</form>


<h3 class="text-success" align="center">Multistep Form In Jquery</h3><br>
<div class="container">
    <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  <div class="panel-group">
    <div class="panel panel-primary">
     <div class="panel-heading">Multistep Form In Jquery</div>
        <form class="form-horizontal" action="/action_page.php" id="multistep_form">
            <fieldset id="account">
            <div class="panel-body"><h4>Step 1: Create your account</h4><br>
                 
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-5">
                          <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-5"> 
                          <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                    </div>
                      
                     <input type="button" name="password" class="next btn btn-info" value="Next" id="next1" style='margin-left:30%'/>
            </div>
            </fieldset>
            
            <fieldset id="personal">
             <div class="panel-body"><h4>Step 2: Personnel Details</h4><br>
                <div class="form-group">
                        <label class="control-label col-sm-2" for="fname">First Name:</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="fname" name="fname">
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2" for="lname">Last Name:</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="lname" name="lname">
                        </div>
                </div>
                
                <input type="button" name="previous" class="previous btn btn-warning" value="Previous" id="previous1" style='margin-left:30%'/>
                <input type="button" name="next" class="next btn btn-info" value="Next" id="next2" style='margin-left:30%'/>
            </div>
            </fieldset>
            
            <fieldset id="contact">
             <div class="panel-body"><h4>Step 3: Contact Details</h4><br>
                <div class="form-group">
                        <label class="control-label col-sm-2" for="mobno">Mobile Number:</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="mobno" name="mobno">
                        </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2" for="address">Address:</label>
                        <div class="col-sm-5">
                           <textarea  class="form-control" name="address" id="address"></textarea>
                        </div>
                </div>
                 <input type="button" name="previous" class="previous btn btn-warning" value="Previous" id="previous2" style='margin-left:30%'/>
                <input type="submit" name="submit" class="submit btn btn-success" value="Submit" id="next3" style='margin-left:30%'/>
                
            </div>
            </fieldset>
            
        </form>
      </div>
    </div>
</div>




