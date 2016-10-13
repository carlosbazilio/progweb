<?php

class View {
    
    public function render(string $pagina, Array $dados = array()) {
        /*
         * Transforma cada chave do array em uma variável
         * $dados = array(
         *  'titulo' => 'Título da página',
         *  'conteudo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat felis id vehicula facilisis. Morbi porta nunc quam, quis bibendum turpis pulvinar eget. Morbi vel malesuada elit. ',
         *  );
         * Cria as variáveis $titulo e $conteudo
        */
        extract($dados);
        include $pagina . ".php";
    }

}
