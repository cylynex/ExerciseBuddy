<p><strong>Routines</strong> (<a href="/Routines">Back</a>)</p>

<?php
$urls = $rewrite->GetUrlVariables();

// Show universal Routines
if ($url2 == "Universal") { 
	$routs = $routines->GetRoutines(0); 
	$routines->ShowRoutineList($routs);
}

// Show Routine Details
if ($url2 == "View") {
	echo "show the routine here.";
}

else { ShowMenu(); }


function ShowMenu() {
	?>
	<p><a href="/Routines/Universal">View Universal Routines</a></p>
	<p>View My Routines</p>
	<p>Create a New Routine</p>
	<?php
}