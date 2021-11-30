<?php
include("dbconn.php");
	print '
	<h1>Sign in form</h1>
	<div id="SignIn">';
	
	if ($_POST['_action_'] == FALSE) {
		print '
		<form action="" name="myForm" id="myForm" method="POST">
			<input type="hidden" id="_action_" name="_action_" value="TRUE">
			<label for="username">Username:*</label>
			<input type="text" id="username" name="username" value="" pattern=".{5,10}" required>
									
			<label for="password">Password:*</label>
			<br>
			<input type="password" id="password" name="password" value="" pattern=".{8,}" required>
			<br>	
			<br>				
			<input type="submit" value="Submit">
			<br>
		</form>';
	}
	else if ($_POST['_action_'] == TRUE) {

        $query = "SELECT * FROM users";
        $query .= " WHERE username='" . $_POST['username'] . "'";
        $result = @mysqli_query($MySQL, $query);
        $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($row['approval'] == 'N') {
            unset($_SESSION['user']);
            echo '<h2>User must be approved by the administrator! <a href="index.php?menu=7">Back!</a> </div>';
        } else {
            if (password_verify($_POST['password'], $row['password'])) {
                #password_verify https://secure.php.net/manual/en/function.password-verify.php
                $_SESSION['user']['valid'] = 'true';
                $_SESSION['user']['id'] = $row['id'];
                $_SESSION['user']['role'] = $row['role'];
                $_SESSION['user']['firstname'] = $row['firstname'];
                $_SESSION['user']['lastname'] = $row['lastname'];
                $_SESSION['message'] = '<h2>Welcome, ' . $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'] . '</div>';

                # Redirect to admin website
                if ($_SESSION['user']['role'] == 'Administrator'){ header("Location: index.php?menu=8");}
                else if ($_SESSION['user']['role'] == 'Editor'){ header("Location: index.php?menu=9");}
                else if ($_SESSION['user']['role'] == 'User'){ header("Location: index.php?menu=10");}

            } # Bad username or password
            else {
                unset($_SESSION['user']);
                $_SESSION['message'] = '<h2>You entered wrong email or password!</div>';
                header("Location: index.php?menu=7");
            }
        }
    }
    print '
	</div>
	    <footer>
		<hr>
		Copyright &copy; 2021 Doris Pavić. <a href="https://github.com/DorisPavic?tab=repositories"><img
				src="slike/github.png" title="Github" alt="Github" style="width:30px;width:15px"></a></p>
		</br>
	</footer>';
?>