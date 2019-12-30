<?php

class Workout extends Database {
	
	// New workout
	public function NewWorkout() {
				
		echo "start new workout setup ID and whatnot";
		// Make sure there isnt an active workout 
		if (!$_SESSION['activeWorkout']) {
			echo "no workout found, ok to create";
			$workoutLastIDQ = $this->Query ("SELECT workoutID from workouts ORDER BY workoutID DESC LIMIT 1");
			$lastWorkoutID = $this->Assoc($workoutLastIDQ);
			$nextWorkoutID = $lastWorkoutID['workoutID'] + 1;
		} else {
			echo "Workout already found, do not create just forward";
		}
		
		
		// Create the new workout (DB)
		echo "creating workout ID $nextWorkoutID";
		$data['workoutID'] = $nextWorkoutID;
		$this -> AddRecord(workouts,$data);
		
		// Create the new workout (Session)
		
		// go to "active workout" page and get to work(ing out) haha
	}
	
	
	// Add Exercise into Workout
	private function AddExercise() {
		echo "Add An Exercise";
		$exercises = new Exercises();
		
		?>
		<form method="post" action="">
		<input type="hidden" name="addExercise" value="1">
		
		<select name="thisExercise" id="thisExercise">
			<?php $exercises->ShowExercisesSelector();?>
		</select>
			
		<?php /* More stuff here */ ?>
			
		<input type="submit" value="Add Exercise">
		</form>	
		<?php
	}
		
	
}

$workout = new Workout();
?>