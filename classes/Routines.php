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
	
}

$routines = new Routines();
?>