<h2> Add Points </h2>
	<h3>Procedure</h3>
		<ul class="procedure">
			<li class="procedure">Choose the number of points you want to give or take away from a House.</li>
			<li class="procedure">The maximum numbers of points that can be given or taken is 99.</li>
			<li class="procedure">Choose the House you want to give or take points from.</li>
		</ul>
		<br>
	<form action="./form_actions/addPoint.php" method="post">
						
		<input type="text" name="points" placeholder="Points" pattern="[0-9]{1,2}" id="input_points" required>
		<label>Gryffyndor</label><input type="radio" name="house" value="Gryffindor" required> 
		<label>Hufflepuff</label><input type="radio" name="house" value="Hufflepuff" required> 
		<label>Ravenclaw</label><input type="radio" name="house" value="Ravenclaw" required> 
		<label>Slytherin</label><input type="radio" name="house" value="Slytherin" required> 
		<input type="submit" name="add" value="+" id="add_button"> 
		<input type="submit" name="subtract" value="–" id="subtract_button">
						
	</form>	