<?php

class Reservacion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $reservacion_id;

    /**
     *
     * @var string
     */
    public $reservacion_nombre;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('reservacion_id', 'Encuesta', 'reservacion_id', array('alias' => 'Encuesta'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'reservacion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Reservacion[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Reservacion
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
