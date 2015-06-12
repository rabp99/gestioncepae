<?php

/**
 * CakePHP ReportesController
 * @author admin
 */
class ReportesController extends AppController {
    public $uses = array("User", "Alumno");
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow("notas");
    }
    
    public function index() {
    }
    
    public function notas() {
        App::import("Vendor", "Fpdf", array("file" => "fpdf/fpdf.php"));
        $this->layout = 'pdf'; //this will use the pdf.ctp layout

        $this->set("fpdf", new FPDF("P","mm","A4"));

        $user = $this->User->findByIduser(2);
        
        $this->Alumno->recursive = 4;
        $alumno = $this->Alumno->findByIduser($user["User"]["iduser"]);
        
        $this->set(compact("alumno"));
        
        $this->response->type("application/pdf");
    }
}
