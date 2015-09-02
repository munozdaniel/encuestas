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
     * Inicializando el formulario de Villa La Angostura.
     * ( Con los datos de la tabla encuesta )
     */
    public function initialize($entity = null, $options = array())
    {
        /*------------- Nº UNIDAD ------------*/

        $unidad = new Text("unidad");
        $unidad->setLabel("Estuve alojado en la Unidad Nº");
        $unidad->setFilters(array('int'));
        $unidad->addValidators(array(
            new PresenceOf(array(
                'message' => 'La unidad es Requerida.'
            ))
        ));
        $this->add($unidad);
        /*------------- FECHA ESTADIA ------------*/

        $fechaEstadia = new \Phalcon\Forms\Element\Date("fechaEstadia");
        $fechaEstadia->setLabel("Fecha de estadía");
        //$fechaEstadia->setFilters(array('int'));
        $fechaEstadia->addValidators(array(
            new PresenceOf(array(
                'message' => 'La fecha de estadía es Requerida.'
            ))
        ));
        $this->add($fechaEstadia);
        /*------------- ES SU PRIMERA VISITA ------------*/

        $rbtPrimeraVisitaSi = new Radio('rbtPrimeraVisitaSi', array(
            'name' => 'primeraVisita',
            'value' => 0
        ));
        $this->add($rbtPrimeraVisitaSi);
        $rbtPrimeraVisitaNo= new Radio('rbtPrimeraVisitaNo', array(
            'name' => 'primeraVisita',
            'value' => 1
        ));
        $this->add($rbtPrimeraVisitaNo);
        /*------------- COMPOSICION DEL GRUPO ------------*/

        $grupoCompuesto = new Select('composicionGrupo', Composicion::find(), array(
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
        $grupoCompuesto->setLabel('Como esta compuesto?');
        $this->add($grupoCompuesto);
        $composicionGrupoOtro = new Text('composicionGrupoOtro');
        $composicionGrupoOtro->setFilters(array('string'));
        $this->add($composicionGrupoOtro);
        /*--------------- DONDE RESERVÓ? Radio Button------------*/
        $dondeReservo = new Select('dondeReservo', Reservacion::find(), array(
            'using'      => array('reservacion_id', 'reservacion_nombre'),
            'useEmpty'   => false,
            'emptyText'  => '---',
            'emptyValue' => '',
            'onchange'  =>"habilitarOtro(this.id,this.value)"
        ));
        $dondeReservo->setLabel('Donde hizo la Reserva?');
        $this->add($dondeReservo);

        $dondeReservoOtro = new Text('dondeReservoOtro');
        $dondeReservoOtro->setFilters(array('string'));
        $this->add($dondeReservoOtro);
        /*------------- COMO SE INFORMÓ? Radio Button ------------*/
        $informacion = Informacion::find();
        $this->view->informacion = $informacion;
        for($i=0; $i<count($informacion);$i++){
            $groupInformacion = new Check("informacion".$i,array(
                "name" => "informacion[]",
                "value" => $informacion[$i]->informacion_id
            ));
            $this->add($groupInformacion);
        }
        /*$comoSeInformo = new Select('comoSeInformo', Informacion::find(), array(
            'using'      => array('informacion_id', 'informacion_nombre'),
            'useEmpty'   => false,
            'emptyText'  => '---',
            'emptyValue' => ''
        ));
        $comoSeInformo->setLabel('De que manera recibe informacion?');
        $this->add($comoSeInformo);*/
        /*------------- CONOCE OTRO MELEWE? Checkbox ------------*/
        $complejos = Complejo::find();
        $this->view->complejos = $complejos;
        for($i=0; $i<count($complejos);$i++){
            $group = new Check("complejo".$i,array(
                "name" => "complejo[]",
                "value" => $complejos[$i]->complejo_id
            ));
            $this->add($group);
        }
        /*$complejo = new Select('complejo', Complejo::find(), array(
            'using'      => array('complejo_id', 'complejo_nombre'),
            'useEmpty'   => true,
            'emptyText'  => '---',
            'emptyValue' => ''
        ));
        $complejo->setLabel('Conoce algun otro Melewe? Cual?');
        $this->add($complejo);*/
        /*------------- MOTIVO DE ELECCION DE MELEWE? Select ------------*/
        $motivoDeEleccion = new Select('motivoDeEleccion', Motivo::find(), array(
            'using'      => array('motivo_id', 'motivo_nombre'),
            'useEmpty'   => true,
            'emptyText'  => '---',
            'emptyValue' => ''
        ));
        $motivoDeEleccion->setLabel('Conoce algun otro Melewe? Cual?');
        $this->add($motivoDeEleccion);
        /*------------- OBSERVACIONES ------------*/

        $comentarios = new Text("comentarios");
        $comentarios->setLabel("Comentarios");
        $comentarios->setFilters(array('string'));

        $this->add($unidad);


    }
}