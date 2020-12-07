<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset="utf-8">
        <title>Mizzou CyberTigers</title>
        <script src="https://code.jquery.com/jquery-3.5.1.js"
                integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
                crossorigin="anonymous">
        </script>
        <script src="jsFinal.js"></script>
        <!--Google fonts: Righteous-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
        <script>
            $(function(){	
                $("input[type=submit]").button();
                $("#password, #confirmPass").keyup(function(){
                    var password = $("#password").val();
                    var confirmPassword = $("#confirmPass").val();
                
                    if(password.localeCompare(confirmPassword) != 0){
                        document.getElementById("confirmPass").setCustomValidity("Passwords Don't Match!");
                    }
                    else {
                        document.getElementById("confirmPass").setCustomValidity("");
                    }
                });
            });
        </script>
    </head>
    <body>
        <div id="navigation"></div>
        <div class="form">
            <h1 class="title">Create an Account</h1>
            <?php
                if ($error) {
                    print "<div>$error</div>\n";
                }
            ?>
            <form action="createUserPhpFinal.php" method="post">
                <input type="hidden" name="action" value="do_create">
                
                <div>
                    <label for="firstName">First name:</label>
                    <input type="text" id="firstName" name="firstName" required>
                </div>
            
                <div>
                    <label for="lastName">Last name:</label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
            
                <div>
                    <label for="username">User name:</label>
                    <input type="text" id="username" name="username" required>
                </div>
            
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
            
                <div>
                    <label for="confirmPass">Confirm Password:</label>
                    <input type="password" id="confirmPass" name="confirmPass" required>
                </div>
            
                <div>
                    <label for="major">Major:</label>
                    <select id="major" name="major" required>
                        <option selected disabled>Select One:</option>
                        <option>Computer Science</option>
                        <option>Information Technology</option>
                        <option>Computer Engineering</option>
                        <option>Electrical Engineering</option>
                        <option>Other Engineering</option>
                        <option>Other Major</option>
                    </select>
                </div>
            
                <div>
                    <label for="school">School:</label>
                    <select id="school" name="school" required>
                        <option selected disabled>Select One:</option>
                        <option>University of Missouri - Columbia</option>
                        <option>Columbia College</option>
                        <option>Stephen's College</option>
                        <option>Missouri University of Science and Technology - Rolla</option>
                        <option>High School</option>
                        <option>Other</option>
                        <option>None</option>
                    </select>
                </div>
            
                <div>
                    <label for="year">Year:</label>
                    <select id="year" name="year" required>
                        <option selected disabled>Select One:</option>
                        <option>High School</option>
                        <option>Freshman</option>
                        <option>Sophomore</option>
                        <option>Junior</option>
                        <option>Senior</option>
                        <option>Super-Senior</option>
                        <option>Graduated</option>
                    </select>
                </div>
            
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
            
                <div>
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </body>
</html>