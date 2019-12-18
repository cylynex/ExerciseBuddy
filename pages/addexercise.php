This is the add exercise page.

<?php // Add Exercise Exec
if ($_POST['addExercise']) { $exercise->AddExercise(); }
?>

<strong>Add Exercise</strong><br>
<form method="post" action="">
<input type="hidden" name="addExercise" value="1">
Exercise Name: <input type="text" name="exerciseName"><br>
Exercise Type: 
	<select name="exerciseType">
		<?php $exerciseTypes = $exercise->ShowExerciseTypes(); ?>
	</select>
<input type="submit" value="Add">
</form>
