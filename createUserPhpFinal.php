<?php

    create_user();

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

/*      //Check that the values were found
        
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
                require "login_form.php";
                exit;                           
            }

            // http://php.net/manual/en/mysqli.real-escape-string.php
            $firstName = $mysqli->real_escape_string($firstName);
            $lastName = $mysqli->real_escape_string($lastName);
            $username = $mysqli->real_escape_string($username);
            $password = $mysqli->real_escape_string($password);
            $birthday = $mysqli->real_escape_string($birthday);
            $email = $mysqli->real_escape_string($email);

            // Build query
            $query = "INSERT INTO users (firstName, lastName, username, userPassword, email, birthday) VALUES ('$firstName', '$lastName', '$username', sha1('$password'), '$email', STR_TO_DATE('$birthday', '%Y-%m-%d'))";

            // Sometimes it's nice to print the query. That way you know what SQL you're working with.
            //print $query;
            //exit;

            // Run the query
            $mysqliResult = $mysqli->query($query);

            // If there was a result...
            if ($mysqliResult === TRUE) {
                echo "user created successfully";
                $error = 'New User Created Successfully';
                require "login_form.php";
                //exit;
            }
            // Else, there was no result
            else {
                //echo $query;
                $error = 'Insert Error: ' . $query . '<br>' . $mysqli_error;
                require "createUser_form.php";
                //exit;
            }
           
            $mysqli->close();
            exit;*/
        }
        else {
            echo "Error: Passwords do not match!";
            /*require "createUser_form.php";*/
            exit;
        }
    }
?>