<?php

class ContactoController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Contactos');
        parent::initialize();
        //cargar los js para la vista de esta función
        $this->assets
            ->collection('footer')
            ->addJs('js/contacto.js');
    }
    public function indexAction()
    {
        $this->view->contacto = new ContactoForm();
    }
    public function enviarAction()
    {
        if($this->request->isPost()){
            $contactoForm = new ContactoForm();

            $datos = $this->request->getPost();
            if( $contactoForm->isValid($this->request->getPost()) != false){
                $this->mail->CharSet        = 'UTF-8' ;
                $this->mail->Host           = 'mail.imps.org.ar';
                $this->mail->SMTPAuth       = true;
                $this->mail->Username       = 'informatica@imps.org.ar';
                $this->mail->Password       = 'tecno$%&--logia';
                $this->mail->SMTPSecure     = '';
                $this->mail->Port           = 26;
                $this->mail->addAddress($datos['contacto_destino']);


                $this->mail->From  = $datos['contacto_email'];
                $this->mail->FromName   =  $datos['contacto_nombre'];
                //$this->mail->addReplyTo("munozda87@hotmail.com", "user");
                $this->mail->Subject        =   $datos['contacto_asunto'];
                $this->mail->Body           =   "<div align='center'><h1><ins>Correo generado automaticamente desde la pagina web</ins> <br><small> www.melewe.com.ar/encuestas </small></h1></div>
                                                <br> <div align='left'> <strong>Asunto: </strong>".$datos['contacto_asunto']."
                                                <br> <strong>Mensaje: </strong>".$datos['contacto_mensaje']." </div><hr>
                                                <div> <strong>Nombre del contacto:</strong> ".$datos['contacto_nombre']."
                                                <br> <strong> Email: </strong> ".$datos['contacto_email']." </div>";
                if($this->mail->send())
                    $this->flash->success("Gracias por contactarse con nosotros, en breve le daremos una respuesta.");
                else
                    $this->flash->error("Ha sucedido un error. No es posible comunicarse con nuestras oficinas momentáneamente.");
            }
            else
            {
                foreach ($contactoForm->getMessages() as $mensaje) {
                    $this->flash->error($mensaje);
                }
            }
            $this->redireccionar('contacto/index');
        }



    }
}

