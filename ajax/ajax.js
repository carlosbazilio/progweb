function loadXMLDocAsync(url, campo)
{
    var xmlhttp;
    // http://www.w3schools.com/xml/ajax_xmlhttprequest_create.asp
    if (window.XMLHttpRequest)
    {   // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {   // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    // http://www.w3schools.com/xml/ajax_xmlhttprequest_response.asp
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            // http://www.w3schools.com/jsref/dom_obj_document.asp
            document.getElementById(campo).innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET",url,true); // true for asynchronous request
    xmlhttp.send();
}
