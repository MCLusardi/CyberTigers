$(function(){
    
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        console.log("Entered the xmlHttp onload function");
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            console.log("Server ready");
            $(".container").empty();
        }
        else {
            console.log(xmlHttp.readyState);
            console.log(xmlHttp.status);
        }
    }
/* Add the loader class */
    $(".container").append('<div class="loader"></div>');
    
    xmlHttp.open("GET", "officerInfo/officerInfo.xml", true);
    //console.log("Opened the xmlHttp connection");
    xmlHttp.send;
    //console.log("xmlHttp request sent");
});