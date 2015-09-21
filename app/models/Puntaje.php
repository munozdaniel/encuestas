<?php

class Puntaje extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $puntaje_id;

    /**
     *
     * @var string
     */
    public $puntaje_descripcion;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('puntaje_id', 'Personal', 'personal_tratoMucamas', array('alias' => 'Personal'));
        $this->hasMany('puntaje_id', 'Personal', 'personal_tratoAdministrativo', array('alias' => 'Personal'));
        $this->hasMany('puntaje_id', 'Recepcion', 'recepcion_tratoYCordialidad', array('alias' => 'Recepcion'));
        $this->hasMany('puntaje_id', 'Recepcion', 'recepcion_nivelDesempeno', array('alias' => 'Recepcion'));
        $this->hasMany('puntaje_id', 'Recepcion', 'recepcion_tiempoRespuesta', array('alias' => 'Recepcion'));
        $this->hasMany('puntaje_id', 'Unidad', 'puntaje_confort', array('alias' => 'Unidad'));
        $this->hasMany('puntaje_id', 'Unidad', 'puntaje_higiene', array('alias' => 'Unidad'));
        $this->hasMany('puntaje_id', 'Unidad', 'puntaje_equipamiento', array('alias' => 'Unidad'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'puntaje';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Puntaje[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Puntaje
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
