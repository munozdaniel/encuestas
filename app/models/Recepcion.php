<?php

class Recepcion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $recepcion_id;

    /**
     *
     * @var integer
     */
    public $recepcion_nivelDesempeno;

    /**
     *
     * @var integer
     */
    public $recepcion_tiempoRespuesta;

    /**
     *
     * @var integer
     */
    public $recepcion_tratoYCordialidad;

    /**
     *
     * @var integer
     */
    public $recepcion_incovenientes;

    /**
     *
     * @var string
     */
    public $recepcion_comentarios;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('recepcion_id', 'Encuesta', 'recepcion_id', array('alias' => 'Encuesta'));
        $this->belongsTo('recepcion_tratoYCordialidad', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
        $this->belongsTo('recepcion_nivelDesempeno', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
        $this->belongsTo('recepcion_tiempoRespuesta', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'recepcion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Recepcion[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Recepcion
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
