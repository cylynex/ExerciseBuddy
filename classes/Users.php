<?php

class Users extends Database {

	public function AddUser() {
		foreach ($_POST AS $key => $value) {
			if ($key != "adduser") {
				$data[$key] = $value;
			}
		}
		
		$this->AddRecord(users,$data);
		
		echo "User ".$data['UserName']." added successfully<br>";
		
	}
	
	
	public function ShowUsersTable() {
		$allUsersQuery = $this->Query ("SELECT * FROM users");
		
		while ($user = $this->Assoc($allUsersQuery)) {
			?><tr><td><?php echo $user['UserName'];?></td></tr><?php
		}
	}
	
	
	// The login form
	public function LoginForm() {
		
		?>
		<form method="post" action="">
			<input type="hidden" name="login" value="1">
			<p>Username: <input type="text" name="UserName"></p>
			<p>Password: <input type="text" name="UserPassword"></p>
			<input type="submit" value="Log In">
		</form>
		<?php
	}
	
	
	// Check Login credentials TODO Sanitization and security
	public function CheckLoginInfo() {
		$username = $_POST['UserName'];
		$password = $_POST['UserPassword'];
		$match = $this->Query("SELECT * FROM users WHERE UserName = '$username' AND UserPassword = '$password' ");
		if (mysqli_num_rows($match) == 1) { 
			// Found matching user - setup the session
			$this->InitializeSession($username);
			header("Location: /home");
		} else {
			// Did not find matching user - throw error
			echo "User not found.  Try again.<br>";
		}
	}
	
	
	// Setup the session
	private function InitializeSession($username) {
		$_SESSION['ExerciseBuddyLogin'] = 1;
		$_SESSION['ExerciseBuddyUsername'] = $username; 
	}
	
}

$users = new Users();
?>