<?php

class Reserva extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $reserva_id;

    /**
     *
     * @var string
     */
    protected $reserva_respuesta;

    /**
     *
     * @var string
     */
    protected $reserva_otro;

    /**
     * Method to set the value of field reserva_id
     *
     * @param integer $reserva_id
     * @return $this
     */
    public function setReservaId($reserva_id)
    {
        $this->reserva_id = $reserva_id;

        return $this;
    }

    /**
     * Method to set the value of field reserva_respuesta
     *
     * @param string $reserva_respuesta
     * @return $this
     */
    public function setReservaRespuesta($reserva_respuesta)
    {
        $this->reserva_respuesta = $reserva_respuesta;

        return $this;
    }

    /**
     * Method to set the value of field reserva_otro
     *
     * @param string $reserva_otro
     * @return $this
     */
    public function setReservaOtro($reserva_otro)
    {
        $this->reserva_otro = $reserva_otro;

        return $this;
    }

    /**
     * Returns the value of field reserva_id
     *
     * @return integer
     */
    public function getReservaId()
    {
        return $this->reserva_id;
    }

    /**
     * Returns the value of field reserva_respuesta
     *
     * @return string
     */
    public function getReservaRespuesta()
    {
        return $this->reserva_respuesta;
    }

    /**
     * Returns the value of field reserva_otro
     *
     * @return string
     */
    public function getReservaOtro()
    {
        return $this->reserva_otro;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('reserva_id', 'Adicional', 'adicional_reservaId', array('alias' => 'Adicional'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'reserva';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Reserva[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Reserva
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
