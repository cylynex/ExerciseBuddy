<?php

class Routines extends Database {

	public function ViewUniversalRoutines() {
		echo "universal routines";
	}
	
	// Get Routines Matching user ID
	// 0 for universal
	public function GetRoutines($id) {
		$routs = $this->Query("SELECT * FROM routines WHERE routineUserID = '$id' ");
		echo "Routines Found: ".mysqli_num_rows($routs);
		return $routs;
	}
	
	// Show list of Routines
	public function ShowRoutineList($routineList) {
		foreach($routineList as $thisRoutine) {
		?><p><a href="/Routines/View/<?php echo $thisRoutine['routineID']?>"><?php echo $thisRoutine['routineName']?></a></p><?php
		}
	}
	
	// Show Routine Rundown
	public function ViewRoutine() {
		
		// Get the basics about this routine
		$rewrite = new Rewrite();
		$id = $rewrite->GetUrlVariables();
		$routineOverview = $this->Query ("SELECT * FROM routines WHERE routineID = '$id[3]' ");
		$routineOverviewData = $this->Assoc($routineOverview);
		
		$routineData = $this->Query("SELECT routines.*, routinesExercises.*, exercises.* 
					FROM routines 
					INNER JOIN routinesExercises on routines.routineID = routinesExercises.reRoutineID
					INNER JOIN exercises ON routinesExercises.reExerciseID = exercises.id 
					");
		
		// Some flavor text
		echo "<p>This routine has ".mysqli_num_rows($routineData)." exercises.</p>";
		echo "<p>".$routineOverviewData['routineDescription']."</p>";
		
		foreach ($routineData as $thisExercise) {
			echo $thisExercise['exerciseName'] ." [x".$thisExercise['reReps']."]<br>";
		}
	}
	
}

$routines = new Routines();
?>