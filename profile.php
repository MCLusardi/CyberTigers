<?php
	// Every time we want to access $_SESSION, we have to call session_start()
	if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	//Prevents URL hijacking
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
		header("Location: loginFormFinal.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset="utf-8">
        <title>Mizzou CyberTigers</title>
        <!-- Imported jQuery-->
        <script src="https://code.jquery.com/jquery-3.5.1.js"
                integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
                crossorigin="anonymous">
        </script>
        
        <!-- jQuery for sortable tabs -->
        <!--<link href="jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.11.4.custom.trontastic/jquery-ui.min.css">
        
        <script src="jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.11.4.custom/jquery-ui.js"></script>
        
        <!-- My CSS -->
        <link rel="stylesheet" href="cssFinal.css">
        
        <!--Google fonts: Righteous-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
        <script>
            $(function() {
                $("#navigation").load("navbarPrivateFinal.html");
                
                var $tabs = $("#taskTabs").tabs();
                $("#NotStarted, #InProgress, #Mastered").sortable();
                
                var $tab_items = $("ul:first li", $tabs).droppable({
				    accept: ".connectedSortable li",
				    hoverClass: "ui-state-hover",
				    drop: function(event, ui) {
					
					   var $item = $(this);
					
					   var $list =                             $($item.find("a").attr("href")).find(".connectedSortable");
					
					
					   ui.draggable.hide("slow", function() {
						
                           $tabs.tabs("option", "active", $tab_items.index($item));
						
                           $(this).appendTo($list).show("slow");
					   });
				    }
                });
            });
        </script>
    </head>
    <body>
        <div id="navigation"></div>
        <div id="taskTabs">
            <ul>
                <li><a href="#tab-1">Not started</a></li>
                <li><a href="#tab-2">In-Progress</a></li>
                <li><a href="#tab-3">Mastered</a></li>
            </ul>
            <div id="tab-1">
                <ul id="NotStarted" class="connectedSortable ui-helper-reset">
                    <li class="ui-state-default">Build a Virtual Machine</li>
                    <li class="ui-state-default">Compete in a CTF</li>
                    <li class="ui-state-default">Compete in TigerHacks</li>
                    <li class="ui-state-default">Perform a brute force attack</li>
                </ul>
            </div>
            <div id="tab-2">
                <ul id="InProgress" class="connectedSortable ui-helper-reset">
                    <li class="ui-state-default">Complete a cryptography challenge</li>
                </ul>
            </div>
            <div id="tab-3">
                <ul id="Mastered" class="connectedSortable ui-helper-reset">
                    <li class="ui-state-default">Attend 5 CyberTigers meetings</li>
                </ul>
            </div>
        </div>
    </body>
</html>