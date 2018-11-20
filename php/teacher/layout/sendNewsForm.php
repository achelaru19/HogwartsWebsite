
<p>Type your message in this box.</p>

<form name="news" action="./form_actions/sendNews.php" method="post">

	<textarea name="news" cols="60" rows="4" maxlength="300" autofocus required> </textarea>
	<p>Choose the House or the Houses that will see your message.</p>
	<fieldset id="house_checkbox_fieldset">
		<div class="house_checkbox">
			<input type="checkbox" name="gryffindor" value="true"> Gryffindor <br>
			<input type="checkbox" name="hufflepuff" value="true"> Hufflepuff
		</div>
		<div class="house_checkbox">
			<input type="checkbox" name="ravenclaw" value="true"> Ravenclaw <br>
			<input type="checkbox" name="slytherin" value="true"> Slytherin
		</div>
	</fieldset>

	<p>How long do you want your news to be visible?</p>
		<select name='time_period'>
			<option value="weekly">1 week</option>
			<option value="monthly">1 month</option>
			<option value="trimestral">3 months</option>
			<option value="semestral">6 months</option>
			<option value="annual">The whole year</option>
		</select>

	<input type="submit" name="submit" value="Send News" class="submit_button">

</form>