<?php
ob_start();

// Config
include("includes/database.php");

// Classes
include("classes/Rewrite.php");
include("classes/Database.php");
include("classes/Exercises.php");
include("classes/Users.php");
include("classes/Routines.php");
include("classes/Workout.php");

// Check for login
if ($_POST['login']) { $users->CheckLoginInfo(); }

if (!$_SESSION['ExerciseBuddyLogin']) { 
	if ($_SERVER['REQUEST_URI'] != "/Login") {
		header("Location: /Login"); 
	} 
} else if ($_SERVER['REQUEST_URI'] == "/Login") { 
	header("Location: /Home");
}

// Content
include("includes/rewrite.php");

?>