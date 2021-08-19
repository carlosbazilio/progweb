<?php

require 'model/Model.php';
require 'view/View.php';

class Controller {

    private $metodo;

    public function __construct(string $metodo) {
        $this->metodo = $metodo;
    }
    
    /*
     * Verifica qual página que vai ser carregada
     */
    public function index() {
        switch ($this->metodo) {
            case $this->metodo === "home":
                $this->home();
                break;
            case $this->metodo === "contato":
                $this->contato();
                break;
            case $this->metodo === "sobre":
                $this->sobre();
                break;
            default:
                $this->error404();
        }
    }

    public function home() {
        $model = new Model;
        // recebe os dados do model
        $dados = $model->getHome();
        $conteudoHeader = array(
            'titulo' => 'Home',
        );
        $view = new View();
        // monta a página
        $view->render('paginas/header', $conteudoHeader);
        $view->render('paginas/inicial', $dados);
        $view->render('paginas/footer');
    }
    
    public function error404(){
        $view = new View();
        $dados = array(
            'titulo' => 'Error 404'
        );
        $conteudoHeader = array(
            'titulo' => 'Home',
        );
        // monta a página
        $view->render('paginas/header', $conteudoHeader);
        $view->render('paginas/404', $dados);
        $view->render('paginas/footer');
    }
    
    public function sobre(){
        $model = new Model;
        // recebe os dados do model
        $dados = $model->getSobre();
        $conteudoHeader = array(
            'titulo' => 'Sobre',
        );
        $view = new View();
        // monta a página
        $view->render('paginas/header', $conteudoHeader);
        $view->render('paginas/sobre', $dados);
        $view->render('paginas/footer');
    }

    public function contato(){
        $model = new Model;
        // recebe os dados do model
        $dados = $model->getContato();
        $conteudoHeader = array(
            'titulo' => 'Contato',
        );
        $view = new View();
        // monta a página
        $view->render('paginas/header', $conteudoHeader);
        $view->render('paginas/sobre', $dados);
        $view->render('paginas/footer');
    }

}
