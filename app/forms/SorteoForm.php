<?php
/**
 * Created by PhpStorm.
 * User: dmunioz
 * Date: 16/09/2015
 * Time: 8:32
 */
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Email;
use Phalcon\Forms\Element\Submit;

class SorteoForm extends \Phalcon\Forms\Form{

    public function initialize($entity = null, $options = array())
    {
        /*------------- Nombre y Apellido ------------*/
        $nombreYApellido = new Text('sorteo_nombreApellido');
        $nombreYApellido->setLabel("Nombre y Apellido");
        $nombreYApellido->addValidators(array(
            new PresenceOf(array(
                'message' => 'El <strong>nombre y el apellido</strong> son requeridos.'
            )),
            new StringLength(array(
                'min' => 4,
                'messageMinimum' => 'El <strong>nombre y el apellido</strong> es muy corto.'
            ))
        ));
        $this->add($nombreYApellido);
        /*------------- Correo electronico ------------*/
        $email = new Text('sorteo_correo');
        $email->setLabel('E-Mail');
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'El <strong>email</strong> es requerido.'
            )),
            new Email(array(
                'message' => 'El <strong>email</strong> no es valido.'
            ))
        ));
        $this->add($email);
        /*------------- Teléfono ------------*/
        $telefono = new Text('sorteo_telefono');
        $telefono->setLabel('Telefono');
        $telefono->addValidators(array(
            new PresenceOf(array(
                'message' => 'El <strong>telefono</strong> es requerido.'
            )),
            new StringLength(array(
                'min' => 4,
                'messageMinimum' => '<small>El <strong>telefono</strong> es muy corto.</small>'
            ))
        ));
        $this->add($telefono);
        /*------------- Ciudad ------------*/
        $ciudad = new Text('sorteo_ciudad');
        $ciudad->setLabel('Ciudad');
        $ciudad->addValidators(array(
            new PresenceOf(array(
                'message' => 'La <strong>ciudad</strong> es requerida.'
            )),
            new StringLength(array(
                'min' => 4,
                'messageMinimum' => '<small>La <strong>ciudad</strong> es muy corta.</small>'
            ))
        ));
        $this->add($ciudad);
        /*--------------- Boton ---------*/
        $participar = new Submit('Participar', array(
            'class' => 'btn btn-success btn-block'
        ));
        $participar->setLabel('Participar');

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