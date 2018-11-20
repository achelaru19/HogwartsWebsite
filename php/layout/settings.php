	
	<h2> Change password: </h2>

	<div>

		<h3>Procedure</h3>
		<p>To change your password you have to:</p> 
		<ul class="settingsInfo">
			<li class="settingsInfo">Insert your old password and the new one, twice;</li>
			<li class="settingsInfo">Your new password has to be made of at least 4 characters;</li>
			<li class="settingsInfo">Your new password cannot be longer than 20 characters.</li>
		</ul>
		<br>
	</div>

	<div id="pass_div">
	<form name="changePassword" action="../changePassword.php" method="post">
		<div id="old_pass">
		<label class="label_pass"> Old Password  </label>
			<input type="password" placeholder="Old Password" name="oldPassword" class="password" onchange="checkOldPassword()" id="pass0_value" required><br>
		</div>
		<div id="new_pass0">
		<label class="label_pass"> New Password </label>
			<input type="password" placeholder="NewPassword" name="newPassword1" class="password" id="pass1_value" onchange="checkLength()" maxlength="20" required><br>
		</div>
		<div id="new_pass">
		<label class="label_pass"> Confirm New Password    </label>
			<input type="password" placeholder="NewPassword" name="newPassword2" class="password" id="pass2_value" onchange="checkMatchPasswords()" maxlength="20" required><br>
		</div>
		<input type="submit" name="submit" value="Change" onclick="changeControl()" id="submit_pass" class="btn">
	</form>
	</div>

	<h2> Change profile picture: </h2>
		<h3>Procedure</h3>
			<p>To change your profile picture you have to:</p> 
			<ul class="settingsInfo">
				<li class="settingsInfo">Choose a picture whose extention is jpg;</li>
				<li class="settingsInfo">Upload it.</li>
			</ul>
		<br>
	<form name="changeProfilePicutre" action="../changeProfilePicture.php" method="post" enctype="multipart/form-data">
		<div id="input_div">
			<input type="file" name="newPicture" id="newPicture" onchange="checkFormatFile()" required>
		</div><br>
		<input type="submit" value="Upload" name="submit" id="submit_file" class="btn">
	</form>
	<br><br>
	
	