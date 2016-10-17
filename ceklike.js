function likecount(itemid, activeid) {
    var xmlhttp = new XMLHttpRequest();
	if (!xmlhttp) {
		xmlhttp = getXMLHttpRequest( );
	}
	if (!xmlhttp) {
    	return;
    }
    var itemID = 'item_ID=' + itemid;
    var activeID = 'active_ID=' + activeid; 
    var url = 'like.php?' + itemID + '&' + activeID;
    xmlhttp.open('POST', url, true);
    xmlhttp.onreadystatechange = function() 
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(itemid).innerHTML = "<span style=\"color:red\">LIKED</span>";
        }
    }
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(itemID);
}

function unlikecount(itemid, activeid) {
    var xmlhttp = new XMLHttpRequest();
    if (!xmlhttp) {
        xmlhttp = getXMLHttpRequest( );
    }
    if (!xmlhttp) {
        return;
    }
    var itemID = 'item_ID=' + itemid;
    var activeID = 'active_ID=' + activeid; 
    var url = 'unlike.php?' + itemID + '&' + activeID;
    xmlhttp.open('POST', url, true);
    xmlhttp.onreadystatechange = function() 
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(itemid).innerHTML = "LIKE";
        }
    }
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(itemID);
}




