<?php
/**
 * Created by PhpStorm.
 * User: dmunioz
 * Date: 17/09/2015
 * Time: 13:34
 */
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Email;


class ContactoForm  extends \Phalcon\Forms\Form{

    public function initialize($entity = null, $options = array())
    {
        /*--------------- Complejo
        //Seleccionar un complejo y solicitar correo.
        $complejo = new Select('complejo_id', Complejo::find(), array(
            'using'      => array('complejo_id', 'complejo_nombre')
        ));
        $complejo->setLabel("Tipo de Inquilino");
        $this->add($complejo);---------*/
        /*--------------- Nombre ---------*/
        $nombre = new Text('contacto_nombre',array(
            'maxlength'   => 50,
            'placeholder' => 'Nombre',
        ));
        $nombre->setLabel("Nombre");
        $nombre->addValidators(array(
            new PresenceOf(array(
                'message' => 'El <strong>nombre y el apellido</strong> son requeridos.'
            )),
            new StringLength(array(
                'min' => 4,
                'messageMinimum' => 'El <strong>nombre y el apellido</strong> es muy corto.'
            ))
        ));
        $this->add($nombre);
        /*--------------- Email ---------*/

        // Email
        $email = new Text('contacto_email',array(
            'maxlength'   => 50,
            'placeholder' => 'Email',
        ));
        $email->setLabel('E-Mail');
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'El <strong>email</strong> es requerido.'
            )),
            new Email(array(
                'message' => 'El <strong>email</strong> no tiene un formato valido.'
            ))
        ));
        $this->add($email);

        /*--------------- Asunto ---------*/
        $asunto = new Text('contacto_asunto',array(
            'maxlength'   => 50,
            'placeholder' => 'Asunto'));
        $asunto->setLabel("Asunto");
        $asunto->addValidators(array(
            new PresenceOf(array(
                'message' => 'El <strong>asunto</strong> es requerido.'
            )),
            new StringLength(array(
                'min' => 4,
                'messageMinimum' => 'La longitud debe superar los 4 caracteres.'
            ))
        ));
        $this->add($asunto);
        /*--------------- Mensaje ---------*/
        $mensaje = new \Phalcon\Forms\Element\TextArea("contacto_mensaje",
            array(
                'maxlength'   => 150,
                'placeholder' => 'Ingrese su mensaje...',
                'rows'=>'4' ,'cols'=>'40'
            ));
        $mensaje->setLabel('Observaciones');
        $mensaje->setFilters(array('string'));
        $this->add($mensaje);
        /*--------------- Boton ---------*/
        $participar = new Submit('enviar', array(
            'class' => 'btn btn-success btn-block'
        ));
        $participar->setLabel('Enviar');
        //$participar->setAttribute('disabled','');
        $this->add($participar);

    }
    /**
     * Prints messages for a specific element
     */
    public function messages($name)
    {
        $cadena= "";
        if ($this->hasMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                //$this->flash->error($message);
                $cadena.= $message ."<br>";//para mostrar con tooltip
            }
        }
        return $cadena;
    }
}