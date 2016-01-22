<?php

class Encuesta extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $encuesta_id;

    /**
     *
     * @var string
     */
    protected $encuesta_fechaCreacion;

    /**
     *
     * @var integer
     */
    protected $encuesta_habilitado;

    /**
     *
     * @var integer
     */
    protected $encuesta_alojamientoId;

    /**
     *
     * @var integer
     */
    protected $encuesta_recepcionId;

    /**
     *
     * @var integer
     */
    protected $encuesta_unidadId;

    /**
     *
     * @var integer
     */
    protected $encuesta_personalId;

    /**
     *
     * @var integer
     */
    protected $encuesta_adicionalId;

    /**
     *
     * @var integer
     */
    protected $encuesta_sorteoId;

    /**
     *
     * @var integer
     */
    protected $encuesta_terminado;

    /**
     * Method to set the value of field encuesta_id
     *
     * @param integer $encuesta_id
     * @return $this
     */
    public function setEncuestaId($encuesta_id)
    {
        $this->encuesta_id = $encuesta_id;

        return $this;
    }

    /**
     * Method to set the value of field encuesta_fechaCreacion
     *
     * @param string $encuesta_fechaCreacion
     * @return $this
     */
    public function setEncuestaFechacreacion($encuesta_fechaCreacion)
    {
        $this->encuesta_fechaCreacion = $encuesta_fechaCreacion;

        return $this;
    }

    /**
     * Method to set the value of field encuesta_habilitado
     *
     * @param integer $encuesta_habilitado
     * @return $this
     */
    public function setEncuestaHabilitado($encuesta_habilitado)
    {
        $this->encuesta_habilitado = $encuesta_habilitado;

        return $this;
    }

    /**
     * Method to set the value of field encuesta_alojamientoId
     *
     * @param integer $encuesta_alojamientoId
     * @return $this
     */
    public function setEncuestaAlojamientoid($encuesta_alojamientoId)
    {
        $this->encuesta_alojamientoId = $encuesta_alojamientoId;

        return $this;
    }

    /**
     * Method to set the value of field encuesta_recepcionId
     *
     * @param integer $encuesta_recepcionId
     * @return $this
     */
    public function setEncuestaRecepcionid($encuesta_recepcionId)
    {
        $this->encuesta_recepcionId = $encuesta_recepcionId;

        return $this;
    }

    /**
     * Method to set the value of field encuesta_unidadId
     *
     * @param integer $encuesta_unidadId
     * @return $this
     */
    public function setEncuestaUnidadid($encuesta_unidadId)
    {
        $this->encuesta_unidadId = $encuesta_unidadId;

        return $this;
    }

    /**
     * Method to set the value of field encuesta_personalId
     *
     * @param integer $encuesta_personalId
     * @return $this
     */
    public function setEncuestaPersonalid($encuesta_personalId)
    {
        $this->encuesta_personalId = $encuesta_personalId;

        return $this;
    }

    /**
     * Method to set the value of field encuesta_adicionalId
     *
     * @param integer $encuesta_adicionalId
     * @return $this
     */
    public function setEncuestaAdicionalid($encuesta_adicionalId)
    {
        $this->encuesta_adicionalId = $encuesta_adicionalId;

        return $this;
    }

    /**
     * Method to set the value of field encuesta_sorteoId
     *
     * @param integer $encuesta_sorteoId
     * @return $this
     */
    public function setEncuestaSorteoid($encuesta_sorteoId)
    {
        $this->encuesta_sorteoId = $encuesta_sorteoId;

        return $this;
    }

    /**
     * Method to set the value of field encuesta_terminado
     *
     * @param integer $encuesta_terminado
     * @return $this
     */
    public function setEncuestaTerminado($encuesta_terminado)
    {
        $this->encuesta_terminado = $encuesta_terminado;

        return $this;
    }

    /**
     * Returns the value of field encuesta_id
     *
     * @return integer
     */
    public function getEncuestaId()
    {
        return $this->encuesta_id;
    }

    /**
     * Returns the value of field encuesta_fechaCreacion
     *
     * @return string
     */
    public function getEncuestaFechacreacion()
    {
        return $this->encuesta_fechaCreacion;
    }

    /**
     * Returns the value of field encuesta_habilitado
     *
     * @return integer
     */
    public function getEncuestaHabilitado()
    {
        return $this->encuesta_habilitado;
    }

    /**
     * Returns the value of field encuesta_alojamientoId
     *
     * @return integer
     */
    public function getEncuestaAlojamientoid()
    {
        return $this->encuesta_alojamientoId;
    }

    /**
     * Returns the value of field encuesta_recepcionId
     *
     * @return integer
     */
    public function getEncuestaRecepcionid()
    {
        return $this->encuesta_recepcionId;
    }

    /**
     * Returns the value of field encuesta_unidadId
     *
     * @return integer
     */
    public function getEncuestaUnidadid()
    {
        return $this->encuesta_unidadId;
    }

    /**
     * Returns the value of field encuesta_personalId
     *
     * @return integer
     */
    public function getEncuestaPersonalid()
    {
        return $this->encuesta_personalId;
    }

    /**
     * Returns the value of field encuesta_adicionalId
     *
     * @return integer
     */
    public function getEncuestaAdicionalid()
    {
        return $this->encuesta_adicionalId;
    }

    /**
     * Returns the value of field encuesta_sorteoId
     *
     * @return integer
     */
    public function getEncuestaSorteoid()
    {
        return $this->encuesta_sorteoId;
    }

    /**
     * Returns the value of field encuesta_terminado
     *
     * @return integer
     */
    public function getEncuestaTerminado()
    {
        return $this->encuesta_terminado;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('encuesta_personalId', 'Personal', 'personal_id', array('alias' => 'Personal'));
        $this->belongsTo('encuesta_alojamientoId', 'Alojamiento', 'alojamiento_id', array('alias' => 'Alojamiento'));
        $this->belongsTo('encuesta_recepcionId', 'Recepcion', 'recepcion_id', array('alias' => 'Recepcion'));
        $this->belongsTo('encuesta_unidadId', 'Unidad', 'unidad_id', array('alias' => 'Unidad'));
        $this->belongsTo('encuesta_adicionalId', 'Adicional', 'adicional_id', array('alias' => 'Adicional'));
        $this->belongsTo('encuesta_sorteoId', 'Sorteo', 'sorteo_id', array('alias' => 'Sorteo'));
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
