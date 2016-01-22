<?php
/**
 * Created by PhpStorm.
 * User: dmunioz
 * Date: 22/01/2016
 * Time: 8:20
 */
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Date;
use \Phalcon\Forms\Element\Numeric;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Numericality;
class AlojamientoForm extends \Phalcon\Forms\Form{
    /**
     * Etapa 1: Alojamiento
     */
    public function initialize($entity = null, $options = array())
    {
        /*------------- Nº UNIDAD ------------*/
        $unidad = new Numeric("alojamiento_nroUnidad",array('class'=>'form-control ','required'=>'true'));
        $unidad->setLabel("Estuve alojado en la Unidad Nº");
        $unidad->setFilters(array('int'));
        $this->add($unidad);
        /*-------------CANTIDAD DE DIAS ------------*/
        $cantidad = new Numeric("alojamiento_cantDias",array('class'=>'form-control ','required'=>'true'));
        $cantidad->setLabel("Cantidad de Días que estuvo alojado");
        $cantidad->setFilters(array('int'));
        $this->add($cantidad);
        /*------------- TIPO PAX ------------*/
        $tipoPax = new Select('alojamiento_tipoPax', Tipopax::find(), array(
            'using'      => array('tipoPax_id', 'tipoPax_nombre'),
            'class'=>'form-control ','required'=>'true'
        ));
        $tipoPax->setLabel("Tipo de Inquilino");
        $this->add($tipoPax);
        /*------------- FECHA ESTADIA ------------*/
        $fechaEstadia = new Date("alojamiento_fechaEstadia",array('class'=>'form-control ','required'=>'true'));
        $fechaEstadia->setLabel("Fecha de estadía");
        $this->add($fechaEstadia);
        /*------------- ES SU PRIMERA VISITA ------------*/
        $elemento = new Select('alojamiento_primeraVisita',  array('SI','NO'), array(
            'useEmpty'   => true,
            'emptyText'  => 'Seleccionar ',
            'emptyValue' => '',
            'class'      => 'form-control ','required'=>'true'
        ));
        $elemento->setLabel('Es su primera visita?');
        $this->add($elemento);

    }

}