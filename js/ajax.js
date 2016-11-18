function loadXMLDocAsync(url, campo)
{
    var xmlhttp;
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById(campo).innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET",url,true); // true for asynchronous request
    xmlhttp.send();
}
