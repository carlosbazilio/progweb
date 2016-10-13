<?php

class Model {
    
    public function getHome() {
        // recebendo dados do banco
        $dados = array(
            'conteudo' => 'Home <br /> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat felis id vehicula facilisis. Morbi porta nunc quam, quis bibendum turpis pulvinar eget. Morbi vel malesuada elit. ',
        );
        return $dados;
    }
    
    public function getSobre() {
        // recebendo dados do banco
        $dados = array(
            'conteudo' => 'Sobre <br /> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat felis id vehicula facilisis. Morbi porta nunc quam, quis bibendum turpis pulvinar eget. Morbi vel malesuada elit. ',
        );
        return $dados;
    }

}
