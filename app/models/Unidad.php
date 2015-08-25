<?php

class Unidad extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $unidad_id;

    /**
     *
     * @var integer
     */
    public $puntaje_higiene;

    /**
     *
     * @var integer
     */
    public $puntaje_equipamiento;

    /**
     *
     * @var integer
     */
    public $puntaje_confort;

    /**
     *
     * @var integer
     */
    public $unidad_inconveniente;

    /**
     *
     * @var string
     */
    public $unidad_comentarios;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('unidad_id', 'Encuesta', 'unidad_id', array('alias' => 'Encuesta'));
        $this->belongsTo('puntaje_confort', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
        $this->belongsTo('puntaje_higiene', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
        $this->belongsTo('puntaje_equipamiento', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'unidad';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Unidad[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Unidad
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
