<strong>Routines</strong><br>

<?php
$urls = $rewrite->GetUrlVariables();

if ($url2 == "Universal") { $routines->ShowUniversalRoutines(); }
else { ShowMenu(); }


function ShowMenu() {
	?>
	<p><a href="/Routines/Universal">View Universal Routines</a></p>
	View My Routines
	Create a New Routine
	<?php
}