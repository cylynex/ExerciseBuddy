<p><strong>Workout</strong></p>


<?php
$urls = $rewrite->GetUrlVariables();

// Interpret the URL
if ($url2 == "New") { $workout->NewWorkout(); } // Start a New Workout
else if ($url2 == "Current") { $workout->ActiveWorkout(); } // Active workout - go!

else { 

	ShowMenu(); 
}


function ShowMenu() {
	?>
	<p><a href="/Workout/New">Start a New Workout</a></p>
	<p>Start Workout from Routine</p>
	<?php
}
