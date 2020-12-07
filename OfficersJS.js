$(function(){
    
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            console.log("Server ready");
            $(".container").empty();
            var xmlDoc = xmlHttp.responseXML;
            console.dir(xmlDoc);
            var officers = xmlDoc.getElementsByTagName("officer");
            console.dir(officers);
            var output;
            for(var i = 0; i < officers.length; i++){
                output += 
                    "<div class='card clearfix'><img src="+
                        officers[i].children[0].innerHTML+" alt="+
                        officers[i].children[1].innerHTML+"><span class='PTitle words'>"+
                        officers[i].children[2].innerHTML+"</span><p class='Description words'>"+
                        officers[i].children[3].innerHTML+"</p></div>"
            }
            var container = document.getElementById('container');
            container.innerHTML = output;
        }
    }
    /* Add the loader class */
    $(".container").append('<div class="loader"></div>');
    
    xmlHttp.open("GET", "http://ec2-18-212-175-179.compute-1.amazonaws.com/CyberTigers/officerInfo/officerInfo.xml", true);
    xmlHttp.send();
});