<?php

/**
 * CakePHP UsersController
 * @author Roberto
 */

class UsersController extends AppController {
    public $components = array("Paginator");
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow("index", "initDB", "add", "login", "datos_pagos");
    }

    public function initDB() {
        $group = $this->User->Group;

        // Administrador
        $group->id = 1;
        $this->Acl->allow($group, 'controllers');

        // Alumno
        $group->id = 2;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Pages/alumno');
        $this->Acl->allow($group, 'controllers/Cursos/cursosByAlumno');
        $this->Acl->allow($group, 'controllers/Cursos/view_alumno');
        $this->Acl->allow($group, 'controllers/Notas/index_alumno');
        $this->Acl->allow($group, 'controllers/Notas/view_alumno');
        $this->Acl->allow($group, 'controllers/Pagos/index_alumno');
        $this->Acl->allow($group, 'controllers/Reportes/notas_alumno');
        $this->Acl->allow($group, 'controllers/Reportes/notas_alumno_post');
        $this->Acl->allow($group, 'controllers/Users/datos');
        $this->Acl->allow($group, 'controllers/Users/change_pass');
        $this->Acl->allow($group, 'controllers/Users/logout');
        $this->Acl->allow($group, 'controllers/Alumnos/datos_alumno');
        
        // Apoderado
        $group->id = 3;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Pages/apoderado');
        $this->Acl->allow($group, 'controllers/Cursos/cursosByApoderado');
        $this->Acl->allow($group, 'controllers/Cursos/view_apoderado');
        $this->Acl->allow($group, 'controllers/Notas/index_apoderado');
        $this->Acl->allow($group, 'controllers/Notas/view_apoderado');
        $this->Acl->allow($group, 'controllers/Pagos/index_apoderado');
        $this->Acl->allow($group, 'controllers/Reportes/notas_apoderado');
        $this->Acl->allow($group, 'controllers/Reportes/notas_apoderado_post');
        $this->Acl->allow($group, 'controllers/Users/datos');
        $this->Acl->allow($group, 'controllers/Users/change_pass');
        $this->Acl->allow($group, 'controllers/Users/logout');
        $this->Acl->allow($group, 'controllers/Alumnos/datos_apoderado');
        
        // Docente
        $group->id = 4;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Pages/docente');
        $this->Acl->allow($group, 'controllers/Cursos/cursosByDocente');
        $this->Acl->allow($group, 'controllers/Cursos/view_docente');
        $this->Acl->allow($group, 'controllers/Notas/index');
        $this->Acl->allow($group, 'controllers/Notas/administrar');
        $this->Acl->allow($group, 'controllers/Notas/registrar');
        $this->Acl->allow($group, 'controllers/Notas/getFormNotas');
        $this->Acl->allow($group, 'controllers/Notas/getFormRegistro');
        $this->Acl->allow($group, 'controllers/Users/datos');
        $this->Acl->allow($group, 'controllers/Users/change_pass');
        $this->Acl->allow($group, 'controllers/Users/logout');
        $this->Acl->allow($group, 'controllers/Docentes/datos_docente');
        
        // Pagos
        $group->id = 5;
        $this->Acl->allow($group, 'controllers');
        $this->Acl->allow($group, 'controllers/Pages/pagos');
        $this->Acl->allow($group, 'controllers/Users/datos_pagos');
        $this->Acl->allow($group, 'controllers/Users/datos');
        $this->Acl->allow($group, 'controllers/Pagos/index_pagos');
        $this->Acl->allow($group, 'controllers/Pagos/view_pagos');
        $this->Acl->allow($group, 'controllers/Pagos/registrar_pagos');
        
        // we add an exit to avoid an ugly "missing views" error message
        echo "all done";
        exit;
    }

    public $paginate = array(
        "limit" => 10,
        "order" => array(
            "User.username" => "asc"
        ),
        "conditions" => array(
            "User.estado" => 1,
            "User.idgroup" => array(1, 5)
        )
    );
    
    public function index() {
        $this->layout = "admin";
        
        $this->Paginator->settings = $this->paginate;
        $users = $this->Paginator->paginate();
        $this->set(compact("users"));
    }

    public function view($id = null) {
        $this->layout = "admin";
                
        if (!$id) {
            throw new NotFoundException(__("Usuario inválido"));
        }
        $user = $this->User->findByIduser($id);
        if (!$user) {
            throw new NotFoundException(__("Usuario inválido"));
        } 
        $this->set(compact("user"));
    }

    public function add() {
        $this->layout = "admin";
        
        $this->set("groups", $this->User->Group->find("list", array(
            "fields" => array("Group.idgroup", "Group.descripcion"),
            "conditions" => array("Group.idgroup" => array(1, 5))
        )));

        if ($this->request->is(array("post", "put"))) {
            $this->User->create();
            if ($this->User->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('El usuario ha sido registrado correctamente'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__("No fue posible registrar el usuario."), "flash_bootstrap");
        }
    }

    public function edit($id = null) {
        $this->layout = "admin";

        $this->set("groups", $this->User->Group->find("list", array(
            "fields" => array("id", "descripcion")
        )));
        
        if (!$id) {
            throw new NotFoundException(__("Usuario inválida"));
        }
        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__("Usuario inválida"));
        }
        if ($this->request->is(array("post", "put"))) {
            $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__("El usuario ha sido actualizado."), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
            $this->Session->setFlash(__("No es posible actualizar el usuaario."), "flash_bootstrap");
        }
        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }

    public function delete($id) {
        if ($this->request->is("get")) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if ($this->User->saveField("estado", 2)) {
            $this->Session->setFlash(__("El Usuario de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
            return $this->redirect(array("action" => "index"));
        }
    }

    public function login() {
        $this->layout = false;
        
        if ($this->request->is(array("post", "put"))) {
            if ($this->Auth->login()) {
                $group = $this->Auth->user()["Group"]["descripcion"];
                switch($group) {
                    case "Administrador":
                        return $this->redirect("/Pages/admin");
                        break;
                    case "Alumno":
                        return $this->redirect("/Pages/alumno/");
                        break;
                    case "Apoderado":
                        return $this->redirect("/Pages/apoderado");
                        break;
                    case "Docente":
                        return $this->redirect("/Pages/docente");
                        break;
                    case "Pagos":
                        return $this->redirect("/Pages/pagos");
                        break;
                }
            }
            $this->Session->setFlash(__('Nombre de Usuario o password incorrecto, inténtelo nuevamente'), "flash_bootstrap");
        }
    }

    public function logout() {
        if($this->Auth->user()) {
            $this->redirect($this->Auth->logout());
        }
        else {
            $this->redirect(array("controller" => "users", "action" => "login"));
            $this->Session->setFlash(__('Not logged in'), 'default', array(), 'auth');
        }
    }
          
    public function datos_admin() {
        if(empty($this->request->params["requested"])) {
            throw new ForbiddenException();
        }

        $user = $this->Auth->user();

        return $user;
    }
    
    public function datos_pagos() {
        if(empty($this->request->params["requested"])) {
            throw new ForbiddenException();
        }

        $user = $this->Auth->user();

        return $user;
    }
      
    public function change_pass() {
        $user = $this->Auth->user();
        if($user["idgroup"] == 1) {
            $this->layout = "admin";
        } elseif($user["idgroup"] == 2) {
            $this->layout = "alumno";
        } elseif($user["idgroup"] == 3) {
            $this->layout = "apoderado";
        } elseif($user["idgroup"] == 4) {
            $this->layout = "docente";
        } elseif($user["idgroup"] == 5) {
            $this->layout = "pagos";
        }
        if ($this->request->is(array("post", "put"))) {
            
            $user = $this->User->find("first", array(
                "conditions" => array(
                    "User.iduser" => $this->Auth->user()["iduser"]
                ),
                "fields" => array("password")
            ));
            $storedHash = $user['User']['password'];
            $newHash = Security::hash($this->request->data['User']['old_password'], 'blowfish', $storedHash);
            if($storedHash == $newHash) {
                if($this->request->data["User"]["new_password"] != $this->request->data["User"]["new_password_confirm"]) {
                    $this->Session->setFlash(__("Los password ingresados no coinciden"), "flash_bootstrap");
                    return;
                }
                $this->User->id = $this->Auth->user()["iduser"];
                if ($this->User->saveField("password", $this->request->data["User"]["new_password"]) ) {
                    $this->Session->setFlash(__("El password ha sido actualizado correctamente."), "flash_bootstrap");
                    return $this->redirect(array("controller" => "Users", "action" => "change_pass"));
                }
            }
            $this->Session->setFlash(__("El password anterior no coincide"), "flash_bootstrap");
        }
    }
    
    public function datos() {
        $user = $this->Auth->user();
        if($user["Group"]["descripcion"] == "Administrador") {
            $this->set("admin", $user);
            $this->layout = "admin";
        } elseif($user["Group"]["descripcion"] == "Alumno") {
            $alumno = $this->User->Alumno->findByIduser($user["iduser"]);
            $this->set("alumno", $alumno);
            $this->layout = "alumno";
        } elseif($user["Group"]["descripcion"] == "Apoderado") {
            $apoderado = $this->User->Padre->findByIduser($user["iduser"]);
            $this->set("apoderado", $apoderado);
            $this->layout = "apoderado";
        } elseif($user["Group"]["descripcion"] == "Docente") {
            $docente = $this->User->Docente->findByIduser($user["iduser"]);
            $this->set("docente", $docente);
            $this->layout = "docente";
        } elseif($user["Group"]["descripcion"] == "Pagos") {
            $this->set("pagos", $user);
            $this->layout = "pagos";
        }
    }
}