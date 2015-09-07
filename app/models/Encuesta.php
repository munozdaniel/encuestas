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
    public $personal_id;

    /**
     *
     * @var integer
     */
    public $unidad_id;

    /**
     *
     * @var integer
     */
    public $composicion_id;

    /**
     *
     * @var string
     */
    public $encuesta_otroComposicionGrupo;

    /**
     *
     * @var integer
     */
    public $reservacion_id;

    /**
     *
     * @var string
     */
    public $encuesta_otroDondeReservo;

    /**
     *
     * @var string
     */
    public $encuesta_otroComoSeInforma;

    /**
     *
     * @var integer
     */
    public $motivo_id;

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
        $this->hasMany('encuesta_id', 'Encuestacomplejo', 'encuesta_id', array('alias' => 'Encuestacomplejo'));
        $this->hasMany('encuesta_id', 'Encuestainformacion', 'encuesta_id', array('alias' => 'Encuestainformacion'));
        $this->belongsTo('recepcion_id', 'Recepcion', 'recepcion_id', array('alias' => 'Recepcion'));
        $this->belongsTo('unidad_id', 'Unidad', 'unidad_id', array('alias' => 'Unidad'));
        $this->belongsTo('personal_id', 'Personal', 'personal_id', array('alias' => 'Personal'));
        $this->belongsTo('composicion_id', 'Composicion', 'composicion_id', array('alias' => 'Composicion'));
        $this->belongsTo('reservacion_id', 'Reservacion', 'reservacion_id', array('alias' => 'Reservacion'));
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
