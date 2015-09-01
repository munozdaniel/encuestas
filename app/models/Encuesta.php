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
     * @var integer
     */
    public $informacion_id;

    /**
     *
     * @var string
     */
    public $encuesta_otroComoSeInforma;

    /**
     *
     * @var integer
     */
    public $complejo_id;

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
        $this->belongsTo('complejo_id', 'Complejo', 'complejo_id', array('alias' => 'Complejo'));
        $this->belongsTo('recepcion_id', 'Recepcion', 'recepcion_id', array('alias' => 'Recepcion'));
        $this->belongsTo('unidad_id', 'Unidad', 'unidad_id', array('alias' => 'Unidad'));
        $this->belongsTo('personal_id', 'Personal', 'personal_id', array('alias' => 'Personal'));
        $this->belongsTo('composicion_id', 'Composicion', 'composicion_id', array('alias' => 'Composicion'));
        $this->belongsTo('reservacion_id', 'Reservacion', 'reservacion_id', array('alias' => 'Reservacion'));
        $this->belongsTo('informacion_id', 'Informacion', 'informacion_id', array('alias' => 'Informacion'));
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
