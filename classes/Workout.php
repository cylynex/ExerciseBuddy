<script>
function UpdateLineItem() {
	alert("Updating...");
}

</script>

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
		$data['startTime'] = date("Y-m-d G:i:s");
		$this -> AddRecord(workouts,$data);
		
		// Create the new workout (Session)
		$_SESSION['activeWorkout'] = $nextWorkoutID;
		
		// go to "active workout" page and get to work(ing out) haha.  TODO this should be automated
		?><a href="/Workout/Current">Go to active workout</a><?php 
		
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
	
	
	// The Active Workout handler - does all the actual work
	public function ActiveWorkout() {
		// Verify the session is set for an active workout
		if ($_SESSION['activeWorkout']) { 
			
			// Get the workout data so far
			$workoutID = $_SESSION['activeWorkout']; 
			$workoutDataQ = $this->Query ("SELECT * FROM workouts WHERE workoutID = '$workoutID' ");
			$workoutData = $this->Assoc($workoutDataQ);
			
			// Display workout header info
			echo "Workout ID $workoutID started at $workoutData[startTime]. <br><br>";
			
			// Display exercises
			?>
			<table border="1">
			<tr>
				<th>Exercise</th>
				<th>Weight</th>
				<th>Reps</th>
				<th>Actions</th>
			</tr>
			<?php
			$this->ShowExercisesInWorkout($workoutID);
			
			?></table><?php
			
			// Show add new exercise thingy
			$this->AddExercise();

			// Profit.
			
		}
		
		// No actual active workout found.  Send to start page.
		else { echo "No active workout.  <a href='/Workout/New'>Start a New Workout</a>"; }
	}
	
	
	// Show the current exercises in the workout
	private function ShowExercisesInWorkout($workoutID) {
		$weDataQ = $this->Query ("SELECT workoutsExercises.*, exercises.* 
									FROM workoutsExercises 
									INNER JOIN exercises ON workoutsExercises.weExerciseID = exercises.id 
									WHERE weWorkoutID = '$workoutID'
									ORDER BY weID ASC");
		if (mysqli_num_rows($weDataQ) == 0) {
			echo "No exercises found yet";
		} else {
			while ($weData = $this->Assoc($weDataQ)) {				
				$this->ExerciseLineItem($weData);				
			}
		}
	}
	
	
	// Displays the Line items in an exercise complete with form to update / add more
	private function ExerciseLineItem($lineItem) {
		?>
		<form method="post" action="">
		<tr>
			<td><?php echo $lineItem['exerciseName']; ?></td>
			<td><input type="text" name="weWeight"></td>
			<td><input type="text" name="weReps"></td>
			<td>
				<input type="submit" value="Update" onclick="UpdateLineItem();">
				<button onclick="alert('Need Ajax function to remove entry here');">Remove</button>
			</td>
		</tr>
		</form>
		<?php
	}
		
	
}

$workout = new Workout();
?>