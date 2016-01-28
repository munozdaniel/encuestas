<?php

class Motivo extends \Phalcon\Mvc\Model
{

    /**
     * @var integer
     */
    protected $motivo_id;

    /**
     *
     * @var string
     */
    protected $motivo_respuesta;

    /**
     *
     * @var string
     */
    protected $motivo_otro;

    /**
     *
     * @var integer
     */
    protected $motivo_adicionalId;

    /**
     * Method to set the value of field motivo_id
     *
     * @param integer $motivo_id
     * @return $this
     */
    public function setMotivoId($motivo_id)
    {
        $this->motivo_id = $motivo_id;

        return $this;
    }

    /**
     * Method to set the value of field motivo_respuesta
     *
     * @param string $motivo_respuesta
     * @return $this
     */
    public function setMotivoRespuesta($motivo_respuesta)
    {
        $this->motivo_respuesta = $motivo_respuesta;

        return $this;
    }

    /**
     * Method to set the value of field motivo_otro
     *
     * @param string $motivo_otro
     * @return $this
     */
    public function setMotivoOtro($motivo_otro)
    {
        $this->motivo_otro = $motivo_otro;

        return $this;
    }

    /**
     * Method to set the value of field motivo_adicionalId
     *
     * @param integer $motivo_adicionalId
     * @return $this
     */
    public function setMotivoAdicionalid($motivo_adicionalId)
    {
        $this->motivo_adicionalId = $motivo_adicionalId;

        return $this;
    }

    /**
     * Returns the value of field motivo_id
     *
     * @return integer
     */
    public function getMotivoId()
    {
        return $this->motivo_id;
    }

    /**
     * Returns the value of field motivo_respuesta
     *
     * @return string
     */
    public function getMotivoRespuesta()
    {
        return $this->motivo_respuesta;
    }

    /**
     * Returns the value of field motivo_otro
     *
     * @return string
     */
    public function getMotivoOtro()
    {
        return $this->motivo_otro;
    }

    /**
     * Returns the value of field motivo_adicionalId
     *
     * @return integer
     */
    public function getMotivoAdicionalid()
    {
        return $this->motivo_adicionalId;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('motivo_id', 'Motivoadicional', 'motivo_id', array('alias' => 'Motivoadicional'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'motivo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Motivo[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Motivo
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
