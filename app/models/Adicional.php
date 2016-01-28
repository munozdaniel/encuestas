<?php

class Adicional extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $adicional_id;

    /**
     *
     * @var integer
     */
    protected $adicional_reservaId;

    /**
     *
     * @var string
     */
    protected $adicional_observacion;

    /**
     * Method to set the value of field adicional_id
     *
     * @param integer $adicional_id
     * @return $this
     */
    public function setAdicionalId($adicional_id)
    {
        $this->adicional_id = $adicional_id;

        return $this;
    }

    /**
     * Method to set the value of field adicional_reservaId
     *
     * @param integer $adicional_reservaId
     * @return $this
     */
    public function setAdicionalReservaid($adicional_reservaId)
    {
        $this->adicional_reservaId = $adicional_reservaId;

        return $this;
    }

    /**
     * Method to set the value of field adicional_observacion
     *
     * @param string $adicional_observacion
     * @return $this
     */
    public function setAdicionalObservacion($adicional_observacion)
    {
        $this->adicional_observacion = $adicional_observacion;

        return $this;
    }

    /**
     * Returns the value of field adicional_id
     *
     * @return integer
     */
    public function getAdicionalId()
    {
        return $this->adicional_id;
    }

    /**
     * Returns the value of field adicional_reservaId
     *
     * @return integer
     */
    public function getAdicionalReservaid()
    {
        return $this->adicional_reservaId;
    }

    /**
     * Returns the value of field adicional_observacion
     *
     * @return string
     */
    public function getAdicionalObservacion()
    {
        return $this->adicional_observacion;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('adicional_id', 'Conocimiento', 'conocimiento_adicionalId', array('alias' => 'Conocimiento'));
        $this->hasMany('adicional_id', 'Conocimientoadicional', 'adicional_id', array('alias' => 'Conocimientoadicional'));
        $this->hasMany('adicional_id', 'Encuesta', 'encuesta_adicionalId', array('alias' => 'Encuesta'));
        $this->hasMany('adicional_id', 'Grupo', 'grupo_adicionalId', array('alias' => 'Grupo'));
        $this->hasMany('adicional_id', 'Grupoadicional', 'adicional_id', array('alias' => 'Grupoadicional'));
        $this->hasMany('adicional_id', 'Informacion', 'informacion_adicionalId', array('alias' => 'Informacion'));
        $this->hasMany('adicional_id', 'Informacionadicional', 'adicional_id', array('alias' => 'Informacionadicional'));
        $this->hasMany('adicional_id', 'Motivoadicional', 'adicional_id', array('alias' => 'Motivoadicional'));
        $this->belongsTo('adicional_reservaId', 'Reserva', 'reserva_id', array('alias' => 'Reserva'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'adicional';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Adicional[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Adicional
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
