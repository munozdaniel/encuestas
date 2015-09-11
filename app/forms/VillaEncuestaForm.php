<?php
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Numericality;
use \Phalcon\Forms\Element\Radio;
use \Phalcon\Forms\Element\Check;
 use Phalcon\Mvc\Model\Validator\StringLength;
/**
 * Created by PhpStorm.
 * User: dmunioz
 * Date: 01/09/2015
 * Time: 10:00
 */

class VillaEncuestaForm extends \Phalcon\Forms\Form{
    /**
     * Inicializando el formulario.
     * ( Con los datos de la tabla encuesta )
     */
    public function initialize($entity = null, $options = array())
    {
        /*------------- Nº UNIDAD ------------*/

        $unidad = new Text("encuesta_nroUnidad");
        $unidad->setLabel("Estuve alojado en la Unidad Nº");
        $unidad->setFilters(array('int'));
        $unidad->addValidators(array(
            new PresenceOf(array(
                'message' => 'La UNIDAD es Requerida.'
            )),
            new Numericality(array(
                'message' => 'La UNIDAD debe ser un valor numerico.'
            ))
        ));
        $this->add($unidad);
        /*------------- FECHA ESTADIA ------------*/

        $fechaEstadia = new \Phalcon\Forms\Element\Date("encuesta_fechaEstadia");
        $fechaEstadia->setLabel("Fecha de estadía");
        //$fechaEstadia->setFilters(array('int'));
        $fechaEstadia->addValidators(array(
            new PresenceOf(array(
                'message' => 'La FECHA de estadía es Requerida.'
            ))
        ));
        $this->add($fechaEstadia);
        /*------------- ES SU PRIMERA VISITA ------------*/
        $primeraVisita = new RadioGroup("encuesta_primeraVisita", [
            'elements' => array('SI','NO'),
            'class' => 'pure-button button-white segment-item sub-items'
        ]);

        $primeraVisita->setChecked(1);
        $this->add($primeraVisita);

        /*------------- COMPOSICION DEL GRUPO ------------*/

        $grupoCompuesto = new Select('composicion_id', Composicion::find(), array(
            'using'      => array('composicion_id', 'composicion_nombre'),
            'useEmpty'   => false,
            'emptyText'  => '---',
            'emptyValue' => '',
            'onchange'  =>"habilitarOtro(this.id,this.value)"
        ));
        $grupoCompuesto->addValidators(array(
            new PresenceOf(array(
                'message' => 'Seleccione una opcion'
            ))
        ));

        $this->add($grupoCompuesto);

        $composicionGrupoOtro = new Text('composicion_idOtro');
        $composicionGrupoOtro->setFilters(array('string'));
        $this->add($composicionGrupoOtro);


        /*--------------- DONDE RESERVÓ? Radio Button------------*/
        $dondeReservo = new Select('reservacion_id', Reservacion::find(), array(
            'using'      => array('reservacion_id', 'reservacion_nombre'),
            'useEmpty'   => false,
            'emptyText'  => '---',
            'emptyValue' => '',
            'onchange'  =>"habilitarOtro(this.id,this.value)",

        ));
        $this->add($dondeReservo);

        $dondeReservoOtro = new Text('reservacion_idOtro');
        $dondeReservoOtro->setFilters(array('string'));
        $this->add($dondeReservoOtro);
        /*------------- COMO SE INFORMÓ? Checkbox  ------------*/
        $informacion = Informacion::find();
        $this->view->informacion = $informacion;
        for($i=0; $i<count($informacion);$i++){
            $groupInformacion = new Check("informacion_id".$i,array(
                "name" => "informacion_id[]",
                "value" => $informacion[$i]->informacion_id
            ));
            $this->add($groupInformacion);
        }

        /*------------- CONOCE OTRO MELEWE? Checkbox ------------*/
        $complejos = Complejo::find();
        $this->view->complejos = $complejos;
        for($i=0; $i<count($complejos);$i++){
            $group = new Check("complejo_id".$i,array(
                "name" => "complejo_id[]",
                "value" => $complejos[$i]->complejo_id
            ));

            $this->add($group);
        }

        /*------------- MOTIVO DE ELECCION DE MELEWE? Select ------------*/
        $motivoDeEleccion = new Select('motivo_id', Motivo::find(), array(
            'using'      => array('motivo_id', 'motivo_nombre'),
            'useEmpty'   => true,
            'emptyText'  => '---',
            'emptyValue' => ''
        ));
        $this->add($motivoDeEleccion);
        /*------------- OBSERVACIONES ------------*/

        $comentarios = new \Phalcon\Forms\Element\TextArea("encuesta_observacion",
            array(
                'maxlength'   => 150,
                'placeholder' => 'Ingrese su comentario...',
                'rows'=>'4' ,'cols'=>'50'
            ));
        $comentarios->setFilters(array('string'));
        $this->add($comentarios);

        $recaptcha = new Recaptcha('recaptcha');
        $recaptcha->addValidator(new RecaptchaValidator(array(
            'message' => "Are you human? (custom message)"
        )));

        $this->add($recaptcha);
    }
}