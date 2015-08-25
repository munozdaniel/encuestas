<?php

class Encuesta extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $encuesta_id;

    /**
     *
     * @var integer
     */
    public $encuesta_nroUnidad;

    /**
     *
     * @var string
     */
    public $encuesta_fechaEstadia;

    /**
     *
     * @var integer
     */
    public $encuesta_primeraVisita;

    /**
     *
     * @var integer
     */
    public $recepcion_id;

    /**
     *
     * @var integer
     */
    public $unidad_id;

    /**
     *
     * @var string
     */
    public $encuesta_composicionGrupo;

    /**
     *
     * @var string
     */
    public $encuesta_otroComposicionGrupo;

    /**
     *
     * @var string
     */
    public $encuesta_dondeReservo;

    /**
     *
     * @var string
     */
    public $encuesta_otroDondeReservo;

    /**
     *
     * @var string
     */
    public $encuesta_comoSeInforma;

    /**
     *
     * @var string
     */
    public $encuesta_otroComoSeInforma;

    /**
     *
     * @var string
     */
    public $encuesta_conoceOtroMelewe;

    /**
     *
     * @var string
     */
    public $encuesta_motivoEleccionDestino;

    /**
     *
     * @var string
     */
    public $encuesta_observacion;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('unidad_id', 'Unidad', 'unidad_id', array('alias' => 'Unidad'));
        $this->belongsTo('recepcion_id', 'Recepcion', 'recepcion_id', array('alias' => 'Recepcion'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'encuesta';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Encuesta[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Encuesta
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
