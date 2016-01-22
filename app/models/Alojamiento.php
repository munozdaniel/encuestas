<?php

class Alojamiento extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $alojamiento_id;

    /**
     *
     * @var integer
     */
    protected $alojamiento_nroUnidad;

    /**
     *
     * @var integer
     */
    protected $alojamiento_cantDias;

    /**
     *
     * @var integer
     */
    protected $alojamiento_tipoPaxId;

    /**
     *
     * @var string
     */
    protected $alojamiento_fechaEstadia;

    /**
     *
     * @var integer
     */
    protected $alojamiento_primeraVisita;

    /**
     *
     * @var integer
     */
    protected $alojamiento_habilitado;

    /**
     * Method to set the value of field alojamiento_id
     *
     * @param integer $alojamiento_id
     * @return $this
     */
    public function setAlojamientoId($alojamiento_id)
    {
        $this->alojamiento_id = $alojamiento_id;

        return $this;
    }

    /**
     * Method to set the value of field alojamiento_nroUnidad
     *
     * @param integer $alojamiento_nroUnidad
     * @return $this
     */
    public function setAlojamientoNrounidad($alojamiento_nroUnidad)
    {
        $this->alojamiento_nroUnidad = $alojamiento_nroUnidad;

        return $this;
    }

    /**
     * Method to set the value of field alojamiento_cantDias
     *
     * @param integer $alojamiento_cantDias
     * @return $this
     */
    public function setAlojamientoCantdias($alojamiento_cantDias)
    {
        $this->alojamiento_cantDias = $alojamiento_cantDias;

        return $this;
    }

    /**
     * Method to set the value of field alojamiento_tipoPaxId
     *
     * @param integer $alojamiento_tipoPaxId
     * @return $this
     */
    public function setAlojamientoTipopaxid($alojamiento_tipoPaxId)
    {
        $this->alojamiento_tipoPaxId = $alojamiento_tipoPaxId;

        return $this;
    }

    /**
     * Method to set the value of field alojamiento_fechaEstadia
     *
     * @param string $alojamiento_fechaEstadia
     * @return $this
     */
    public function setAlojamientoFechaestadia($alojamiento_fechaEstadia)
    {
        $this->alojamiento_fechaEstadia = $alojamiento_fechaEstadia;

        return $this;
    }

    /**
     * Method to set the value of field alojamiento_primeraVisita
     *
     * @param integer $alojamiento_primeraVisita
     * @return $this
     */
    public function setAlojamientoPrimeravisita($alojamiento_primeraVisita)
    {
        $this->alojamiento_primeraVisita = $alojamiento_primeraVisita;

        return $this;
    }

    /**
     * Method to set the value of field alojamiento_habilitado
     *
     * @param integer $alojamiento_habilitado
     * @return $this
     */
    public function setAlojamientoHabilitado($alojamiento_habilitado)
    {
        $this->alojamiento_habilitado = $alojamiento_habilitado;

        return $this;
    }

    /**
     * Returns the value of field alojamiento_id
     *
     * @return integer
     */
    public function getAlojamientoId()
    {
        return $this->alojamiento_id;
    }

    /**
     * Returns the value of field alojamiento_nroUnidad
     *
     * @return integer
     */
    public function getAlojamientoNrounidad()
    {
        return $this->alojamiento_nroUnidad;
    }

    /**
     * Returns the value of field alojamiento_cantDias
     *
     * @return integer
     */
    public function getAlojamientoCantdias()
    {
        return $this->alojamiento_cantDias;
    }

    /**
     * Returns the value of field alojamiento_tipoPaxId
     *
     * @return integer
     */
    public function getAlojamientoTipopaxid()
    {
        return $this->alojamiento_tipoPaxId;
    }

    /**
     * Returns the value of field alojamiento_fechaEstadia
     *
     * @return string
     */
    public function getAlojamientoFechaestadia()
    {
        return $this->alojamiento_fechaEstadia;
    }

    /**
     * Returns the value of field alojamiento_primeraVisita
     *
     * @return integer
     */
    public function getAlojamientoPrimeravisita()
    {
        return $this->alojamiento_primeraVisita;
    }

    /**
     * Returns the value of field alojamiento_habilitado
     *
     * @return integer
     */
    public function getAlojamientoHabilitado()
    {
        return $this->alojamiento_habilitado;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('alojamiento_id', 'Encuesta', 'encuesta_alojamientoId', array('alias' => 'Encuesta'));
        $this->belongsTo('alojamiento_tipoPaxId', 'Tipopax', 'tipoPax_id', array('alias' => 'Tipopax'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'alojamiento';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Alojamiento[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Alojamiento
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
