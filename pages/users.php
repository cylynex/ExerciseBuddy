<?php 
// Add user
if ($_POST['adduser']) { $users->AddUser(); }
?>


<strong>Users</strong><br>

Add User<br>
<form method="post" action="">
	<input type="hidden" name="adduser" value="1">
	Username <input type="text" name="UserName"><br>
	Password <input type="text" name="UserPassword"><br>
	Name <input type="text" name="FirstName"><br>
	<input type="submit" value="Add User">
</form>

<br><br>
<strong>All Users in System</strong>
<table border="1">
<tr>
	<th>Username</th>
</tr>
<?php $users->ShowUsersTable(); ?>
</table>