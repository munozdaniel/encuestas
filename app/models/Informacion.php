<?php

class Informacion extends \Phalcon\Mvc\Model
{

    /**
     * @var integer
     */
    protected $informacion_id;

    /**
     *
     * @var string
     */
    protected $informacion_respuesta;

    /**
     *
     * @var string
     */
    protected $informacion_otro;

    /**
     *
     * @var integer
     */
    protected $informacion_adicionalId;

    /**
     * Method to set the value of field informacion_id
     *
     * @param integer $informacion_id
     * @return $this
     */
    public function setInformacionId($informacion_id)
    {
        $this->informacion_id = $informacion_id;

        return $this;
    }

    /**
     * Method to set the value of field informacion_respuesta
     *
     * @param string $informacion_respuesta
     * @return $this
     */
    public function setInformacionRespuesta($informacion_respuesta)
    {
        $this->informacion_respuesta = $informacion_respuesta;

        return $this;
    }

    /**
     * Method to set the value of field informacion_otro
     *
     * @param string $informacion_otro
     * @return $this
     */
    public function setInformacionOtro($informacion_otro)
    {
        $this->informacion_otro = $informacion_otro;

        return $this;
    }

    /**
     * Method to set the value of field informacion_adicionalId
     *
     * @param integer $informacion_adicionalId
     * @return $this
     */
    public function setInformacionAdicionalid($informacion_adicionalId)
    {
        $this->informacion_adicionalId = $informacion_adicionalId;

        return $this;
    }

    /**
     * Returns the value of field informacion_id
     *
     * @return integer
     */
    public function getInformacionId()
    {
        return $this->informacion_id;
    }

    /**
     * Returns the value of field informacion_respuesta
     *
     * @return string
     */
    public function getInformacionRespuesta()
    {
        return $this->informacion_respuesta;
    }

    /**
     * Returns the value of field informacion_otro
     *
     * @return string
     */
    public function getInformacionOtro()
    {
        return $this->informacion_otro;
    }

    /**
     * Returns the value of field informacion_adicionalId
     *
     * @return integer
     */
    public function getInformacionAdicionalid()
    {
        return $this->informacion_adicionalId;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('informacion_id', 'Informacionadicional', 'informacion_id', array('alias' => 'Informacionadicional'));
        $this->belongsTo('informacion_adicionalId', 'Adicional', 'adicional_id', array('alias' => 'Adicional'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'informacion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Informacion[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Informacion
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
