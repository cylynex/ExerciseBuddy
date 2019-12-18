<?php

class Exercises extends Database {

	// Add new Exercise to DB
	public function AddExercise() {
		$data['exerciseName'] = $_POST['exerciseName'];
		$data['exerciseType'] = $_POST['exerciseType'];
		$this->AddRecord(exercises,$data);
	}	
	
	
	// Types for selections
	public function ShowExerciseTypes() {
		$output = $this->Query("SELECT * FROM exerciseTypes");
		echo mysqli_num_rows($output);
		
		while ($listItem = $this->Assoc($output)) {
			?><option value="<?php echo $listItem['id']?>"><?php echo $listItem['typeName']?></option><?php
		}
	}
	
	
	// Display all Exercises in no particular order (for now)
	public function ShowAllExercises() {
		$allExercises = $this->Query("SELECT exercises.*, exerciseTypes.* 
						FROM exercises
						INNER JOIN exerciseTypes ON exercises.exerciseType = exerciseTypes.id
						ORDER BY exerciseName ASC ");
		echo mysqli_num_rows($allExercises) . " total exercises in the system.<br><br>";
		while ($exercises = $this->Assoc($allExercises)) {
			echo $exercises['exerciseName']." - ".$exercises['typeName']."<br>";
		}
		
	}
	
}

$exercise = new Exercises();
?>