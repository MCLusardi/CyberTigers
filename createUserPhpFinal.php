<?php
    if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}
    // Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
    // If already logged in, redirect to profile page
	if ($loggedIn) {
		header("Location: profile.html");
		exit;
	}
    $action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_create') {
		create_user();
	} else {
		login_form();
	}

    function create_user() {
        /* Get info from form to create the user (plus handling if those areas of the form are empty) */
		$firstName = empty($_POST['firstName']) ? '' : $_POST['firstName'];
        $lastName = empty($_POST['lastName']) ? '' : $_POST['lastName'];
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
        $confirmPass = empty($_POST['confirmPass']) ? '' : $_POST['confirmPass'];
        $major = empty($_POST['major']) ? '' : $_POST['major'];
        $school = empty($_POST['school']) ? '' : $_POST['school'];
        $year = empty($_POST['year']) ? '' : $_POST['year'];
        $email = empty($_POST['email']) ? '' : $_POST['email'];
/*

      //Check that the values were found
        
        echo $firstName;
		echo $lastName;
		echo $username;
		echo $password;
		echo $confirmPass;
		echo $major;
        echo $school;
        echo $year;
		echo $email;
        exit;
*/

        /* Only procede if the password and confirmPass match*/
        if(strcmp($password, $confirmPass) == 0){
            //echo "password confirmed";
            
            // Require the credentials
            require_once 'CyberTigersDB.conf';

            // Connect to the database CS 2830
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            // Check for errors
            if ($mysqli->connect_error) {
                //echo "connection error";
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                require "loginFormFinal.html";
                exit;                           
            }

            // http://php.net/manual/en/mysqli.real-escape-string.php
            $firstName = $mysqli->real_escape_string($firstName);
            $lastName = $mysqli->real_escape_string($lastName);
            $username = $mysqli->real_escape_string($username);
            $password = $mysqli->real_escape_string($password);
            $major = $mysqli->real_escape_string($major);
            $school = $mysqli->real_escape_string($school);
            $year = $mysqli->real_escape_string($year);
            $email = $mysqli->real_escape_string($email);

            // Build query
            $query = "INSERT INTO CyberTigerMembers (firstName, lastName, username, userPassword, major, school, year_in_school, email) VALUES ('$firstName', '$lastName', '$username', sha1('$password'), '$major', '$school', '$year', '$email')";

            // Sometimes it's nice to print the query. That way you know what SQL you're working with.
            //print $query;
            //exit;

            // Run the query
            $mysqliResult = $mysqli->query($query);

            // If there was a result...
            if ($mysqliResult === TRUE) {
                echo "user created successfully";
                $error = 'New User Created Successfully';
                require "loginFormFinal.html";
                //exit;
            }
            // Else, there was no result
            else {
                //echo $query;
                $error = 'Insert Error: ' . $query . '<br>' . $mysqli_error;
                require "createUserFormFinal.php";
                //exit;
            }
           
            $mysqli->close();
            exit;
        }
        else {
            echo "Error: Passwords do not match!";
            require "createUserFormFinal.php";
            exit;
        }
    }

    //function to take user to login form if user is already created
    function login_form() {
		$username = "";
		$error = "";
		require "loginFormFinal.html";
        exit;
	}
?>