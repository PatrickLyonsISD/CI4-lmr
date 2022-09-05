<?php
$site_url = base_url();
$local_style = $site_url . "/assets/";
$image_url = $site_url . "/assets/images/";
$script_url = $site_url . "/assets/scripts/";
?>

<div class="loginForm">
    
		<?php echo form_open('Home/Login',['knumber' => 'LoginForm'])?>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="emailAddress" id="emailAddress" class="form-control" placeholder="Enter your email">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
		</div>
		<div class="form-group">
			<input type="submit" name="button" value="Login" class="btn">
		</div>
	</form>
    <?php echo anchor('memberController/register', 'Not a member? Register Now');?>
</div>