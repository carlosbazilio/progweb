document.addEventListener('DOMContentLoaded', function() {

	// function alerta() {
	// 	//alert('Executando do JS');
	// 	document.querySelector('#conteudo').innerHTML = 'Executando do JS';
	// };

	// document.querySelector('button').onclick = alerta;

	document.querySelector('form').onsubmit = function() {

		const cep = document.querySelector('#cep').value;

		//fetch('http://localhost:8080/cep.php?valor=' + cep)
		//const url = `https://viacep.com.br/ws/${cep}/json/`;
		fetch(`https://viacep.com.br/ws/28898532/json/`)
		.then(function (resposta) {
			document.querySelector('#conteudo').innerHTML = resposta.json();
		});
	};
});

