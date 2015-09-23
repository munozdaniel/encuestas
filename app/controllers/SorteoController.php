<?php

class SorteoController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Encuesta');
        parent::initialize();


    }

    /**
     * Muestra un formulario cuyo datos se guardan la tabla Sorteo.
     */
    public function indexAction()
    {
        $this->assets
            ->collection('footer')->addJs('js/tooltip.js');

        $form = new SorteoForm();
        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost()) != false) {
                try{
                    $sorteo = new Sorteo();
                    $sorteo->assign(array(
                        'sorteo_nombreApellido' => $this->request->getPost('sorteo_nombreApellido', 'striptags'),
                        'sorteo_correo' => $this->request->getPost('sorteo_correo'),
                        'sorteo_telefono' =>  $this->request->getPost('sorteo_telefono'),
                        'sorteo_ciudad' =>  $this->request->getPost('sorteo_ciudad')
                    ));
                    if ($sorteo->save()) {
                        return $this->redireccionar('sorteo/registrado');
                    }
                    $this->flash->error($sorteo->getMessages());

                }
                catch(PDOException $e){
                    switch($e->getCode()){
                        case 23000:
                            $this->flash->error("El Correo ya se encuentra registrado. No puede participar mÃ¡s de una vez.");
                            break;
                        default:
                            $this->flash->error("ERROR:".$e->getMessage());
                            break;
                    }
                }
            }
        }
        $this->view->form = $form;

    }
    /**
     *  Muestra la vista felicitando al usuario por su logro por participar en el sorteo.
     */
    public function registradoAction()
    {
        //Vacio
    }


}
