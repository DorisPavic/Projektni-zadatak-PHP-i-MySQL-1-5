<?php
include("dbconn.php");

# Update user profile
if (isset($_POST['edit']) && $_POST['_action_'] == 'TRUE') {
    $query  = "UPDATE users SET firstname='" . $_POST['firstname'] . "', lastname='" . $_POST['lastname'] . "', email='" . $_POST['email'] . "', username='" . $_POST['username'] . "', country='" . $_POST['country'] . "', archive='" . $_POST['archive'] . "', role='" . $_POST['role']. "', approval='" . $_POST['approval'].  "'";
    $query .= " WHERE id=" . (int)$_POST['edit'];
    $query .= " LIMIT 1";
    $result = @mysqli_query($MySQL, $query);
    # Close MySQL connection
    @mysqli_close($MySQL);

    $_SESSION['message'] = '<p>You successfully changed user profile!</p>';

    # Redirect
    header("Location: index.php?menu=8&action=1");
}
# End update user profile

# Delete user profile
if (isset($_GET['delete']) && $_GET['delete'] != '') {

    $query  = "DELETE FROM users";
    $query .= " WHERE id=".(int)$_GET['delete'];
    $query .= " LIMIT 1";
    $result = @mysqli_query($MySQL, $query);

    $_SESSION['message'] = '<p>You successfully deleted user profile!</p>';

    # Redirect
    header("Location: index.php?menu=8&action=1");
}
# End delete user profile


#Show user info
if (isset($_GET['id']) && $_GET['id'] != '') {
    $query  = "SELECT * FROM users";
    $query .= " WHERE id=".$_GET['id'];
    $result = @mysqli_query($MySQL, $query);
    $row = @mysqli_fetch_array($result);
    print '
		<h2>User profile</h2>
		<p><b>First name:</b> ' . $row['firstname'] . '</p>
		<p><b>Last name:</b> ' . $row['lastname'] . '</p>
		<p><b>Username:</b> ' . $row['username'] . '</p>';
    $_query  = "SELECT * FROM countries";
    $_query .= " WHERE country_code='" . $row['country'] . "'";
    $_result = @mysqli_query($MySQL, $_query);
    $_row = @mysqli_fetch_array($_result);
    print '
		<p><b>Country:</b> ' .$_row['country_name'] . '</p>
		<p><b>Date:</b> ' . pickerDateToMysql($row['date']) . '</p>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>
		<p><b>Role:</b> ' . $row['role'] . '</p>
		<p><b>Approval:</b> ' . $row['approval'] . '</p>';
}
#Edit user profile
else if (isset($_GET['edit']) && $_GET['edit'] != '') {
    $query  = "SELECT * FROM users";
    $query .= " WHERE id=".$_GET['edit'];
    $result = @mysqli_query($MySQL, $query);
    $row = @mysqli_fetch_array($result);
    $checked_archive = false;

    print '
		<h2>Edit user profile</h2>
		<form action="" id="registration_form" name="registration_form" method="POST">
			<input type="hidden" id="_action_" name="_action_" value="TRUE">
			<input type="hidden" id="edit" name="edit" value="' . $_GET['edit'] . '">
			
			<label for="fname">First Name *</label>
			<input type="text" id="fname" name="firstname" value="' . $row['firstname'] . '" placeholder="Your name.." required>
			<label for="lname">Last Name *</label>
			<input type="text" id="lname" name="lastname" value="' . $row['lastname'] . '" placeholder="Your last name.." required>
				
			<label for="email">Your E-mail *</label>
			<input type="email" id="email" name="email"  value="' . $row['email'] . '" placeholder="Your e-mail.." required>
			
			<label for="username">Username *<small>(Username must have min 5 and max 10 char)</small></label>
			<input type="text" id="username" name="username" value="' . $row['username'] . '" pattern=".{5,10}" placeholder="Username.." required><br>
			
			<label for="country">Country</label>
			<select name="country" id="country">
				<option value="">molimo odaberite</option>';
    #Select all countries from database projekt, table countries
    $_query  = "SELECT * FROM countries";
    $_result = @mysqli_query($MySQL, $_query);
    while($_row = @mysqli_fetch_array($_result)) {
        print '<option value="' . $_row['country_code'] . '"';
        if ($row['country'] == $_row['country_code']) { print ' selected'; }
        print '>' . $_row['country_name'] . '</option>';
    }
    print '
			</select>			
			<label for="archive">Archive:</label><br />
            <input type="radio" name="archive" value="Y"'; if($row['archive'] == 'Y') { echo ' checked="checked"'; $checked_archive = true; } echo ' /> YES &nbsp;&nbsp;
			<input type="radio" name="archive" value="N"'; if($checked_archive == false) { echo ' checked="checked"'; } echo ' /> NO
			<br>		
			<br>
			<label for="approval">Is person approved:</label><br />
            <input type="radio" name="approval" value="Y"'; if($row['approval'] == 'Y') { echo ' checked="checked"'; $checked_approval = true; } echo ' /> YES &nbsp;&nbsp;
			<input type="radio" name="approval" value="N"'; if($row['approval'] == 'N') { echo ' checked="checked"'; } echo ' /> NO
			<br>			
			<br>
			<label for="role">Role:</label><br />
            <input type="radio" name="role" value="User"'; if($row['role'] == 'User') { echo ' checked="checked"'; $checked_role = true; } echo ' /> User &nbsp;&nbsp;
			<input type="radio" name="role" value="Editor"'; if($row['role'] == 'Editor') { echo ' checked="checked"'; $checked_role = true;} echo ' /> Editor &nbsp;&nbsp;
			<input type="radio" name="role" value="Administrator"'; if($row['role'] == 'Administrator') { echo ' checked="checked"'; $checked_role = true;} echo ' /> Administrator
 <br>			
			<br>
			
			<input type="submit" value="Submit">
		</form>
		<p><a href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
}
else {
    print '
		<h2>List of users</h2>
		<div id="users">
			<table>
				<thead>
					<tr>
						<th width="16"></th>
						<th width="16"></th>
						<th width="16"></th>
						<th>First name</th>
						<th>Last name</th>
						<th>E mail</th>
						<th>Country</th>
						<th width="16"></th>
					</tr>
				</thead>
				<tbody>';
    $query  = "SELECT * FROM users";
    $result = @mysqli_query($MySQL, $query);
    while($row = @mysqli_fetch_array($result)) {
        print '
					<tr>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;id=' .$row['id']. '"><img src="gallery/user.png" alt="user"></a></td>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;edit=' .$row['id']. '"><img src="gallery/edit.png" alt="uredi"></a></td>
						<td><a href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;delete=' .$row['id']. '"><img src="gallery/delete.png" alt="obriši"></a></td>
						<td><strong>' . $row['firstname'] . '</strong></td>
						<td><strong>' . $row['lastname'] . '</strong></td>
						<td>' . $row['email'] . '</td>
						<td>';
        $_query  = "SELECT * FROM countries";
        $_query .= " WHERE country_code='" . $row['country'] . "'";
        $_result = @mysqli_query($MySQL, $_query);
        $_row = @mysqli_fetch_array($_result, MYSQLI_ASSOC);
        print $_row['country_name'] . '
						</td>
						<td>';
        if ($row['approval'] == 'N') { print '<img src="gallery/inactive.png" alt="" title="" />'; }
        else if ($row['approval'] == 'Y') { print '<img src="gallery/active.png" alt="" title="" />'; }
        print '
						</td>
					</tr>';
    }
    print '
				</tbody>
			</table>
		</div>';
}

# Close MySQL connection
@mysqli_close($MySQL);
?>