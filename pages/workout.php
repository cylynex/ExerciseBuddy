<p><strong>Workout</strong></p>


<?php
$urls = $rewrite->GetUrlVariables();

// Start a new workout
if ($url2 == "New") { 
	
	$workout->NewWorkout();
	
}

else { 

	ShowMenu(); 
}


function ShowMenu() {
	?>
	<p><a href="/Workout/New">Start a New Workout</a></p>
	<p>Start Workout from Routine</p>
	<?php
}
