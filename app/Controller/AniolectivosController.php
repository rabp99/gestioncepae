<?php

/**
 * CakePHP AnioslectivosController
 * @author Roberto
 */
class AniolectivosController extends AppController {
    public $components = array('Paginator');
    
    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "Aniolectivo.descripcion" => "asc"
        )
    );
    
    public function index() {
        $this->layout = "main";
        
        $this->Paginator->settings = $this->paginate;
        $aniolectivos = $this->Paginator->paginate();
        $this->set(compact("aniolectivos"));
    }
    
    public function add() {
        $this->layout = "main";
        
    }

}
