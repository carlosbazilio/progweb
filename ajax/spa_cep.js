
var formulario = document.getElementById('form_cep')

formulario.onsubmit = function(e) {
	e.preventDefault()

	sendToServer(this.getElementsByTagName('input')[0].value)
}

var sendToServer = function(cep) {
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
	
	xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            // http://www.w3schools.com/jsref/dom_obj_document.asp
            endereco = JSON.parse(xmlhttp.responseText);
            document.getElementById('endereco').innerHTML=endereco['logradouro'];
        }
    }

    console.log(cep)

	xmlhttp.open('GET', 'https://viacep.com.br/ws/' + cep + '/json/', true)
	//xmlhttp.setRequestHeader('Content-type', 'application/json')
	//xmlhttp.send(JSON.stringify(note))
	xmlhttp.send()
}