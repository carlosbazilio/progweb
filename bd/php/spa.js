
var formulario = document.getElementById('form_login')

formulario.onsubmit = function(e) {
	e.preventDefault()

	sendToServerFetch(this, 'tela_principal')
}

var sendToServeHTTPRequest = function(formulario, campo) {
	var xmlhttp;
    // http://www.w3schools.com/xml/ajax_xmlhttprequest_create.asp

    // Bind the FormData object and the form element
    const formdata = new FormData( formulario );
    
    if (window.XMLHttpRequest)
    {   // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {   // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
	
	xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            // http://www.w3schools.com/jsref/dom_obj_document.asp
            document.getElementById(campo).innerHTML=xmlhttp.responseText;
        }
    }

	xmlhttp.open('POST', 'login_page_dbo.php', true)
	//xmlhttp.setRequestHeader('Content-type', 'application/json')
	//xmlhttp.send(JSON.stringify(note))
	xmlhttp.send(formdata)
}

var sendToServerFetch = function(formulario, campo) {

    fetch('login_page_dbo.php', {method:'post', body: new FormData(formulario)})
        .then(response => {
             return response.text();
        })
        .then(result => {
            document.getElementById(campo).innerHTML=result;
        })
        .catch(function(error) {
            console.log(error);
        });
        
}

