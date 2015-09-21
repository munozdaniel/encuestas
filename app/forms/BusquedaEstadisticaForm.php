<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 20/09/2015
 * Time: 12:52 PM
 */
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
class BusquedaEstadisticaForm  extends \Phalcon\Forms\Form{
    public function initialize($entity = null, $options = array())
    {
        $grupoCompuesto = new Select('complejo_id', Complejo::find(), array(
            'using'      => array('complejo_id', 'complejo_nombre'),
            'useEmpty'   => false,
            'emptyText'  => 'Seleccione una opción',
            'emptyValue' => ''
        ));
        $grupoCompuesto->setLabel('Como estuvo compuesto su grupo?');
        $this->add($grupoCompuesto);
    }
}