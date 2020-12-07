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
    </head>
    <body>
        <div id="navigation"></div>
        <div class="form">
            <h1 class="title">Log In</h1>
            <?php
                if ($error) {
                    print "<div>$error</div>\n";
                }
            ?>
            
            <form action="loginPhpFinal.php" method="post">
                <input type="hidden" name="action" value="do_login">
                <label for="username">User Name:</label>
                <input type="text" id="username" name="username" autofocus>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>