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
    protected $adicional_reservaOtro;

    /**
     *
     * @var integer
     */
    protected $adicional_grupoId;

    /**
     *
     * @var string
     */
    protected $adicional_grupoOtro;

    /**
     *
     * @var integer
     */
    protected $adicional_informacionId;

    /**
     *
     * @var string
     */
    protected $adicional_informacionOtro;

    /**
     *
     * @var integer
     */
    protected $adicional_conocimientoId;

    /**
     *
     * @var integer
     */
    protected $adicional_motivoId;

    /**
     *
     * @var string
     */
    protected $adicional_motivoOtro;

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
     * Method to set the value of field adicional_reservaOtro
     *
     * @param string $adicional_reservaOtro
     * @return $this
     */
    public function setAdicionalReservaotro($adicional_reservaOtro)
    {
        $this->adicional_reservaOtro = $adicional_reservaOtro;

        return $this;
    }

    /**
     * Method to set the value of field adicional_grupoId
     *
     * @param integer $adicional_grupoId
     * @return $this
     */
    public function setAdicionalGrupoid($adicional_grupoId)
    {
        $this->adicional_grupoId = $adicional_grupoId;

        return $this;
    }

    /**
     * Method to set the value of field adicional_grupoOtro
     *
     * @param string $adicional_grupoOtro
     * @return $this
     */
    public function setAdicionalGrupootro($adicional_grupoOtro)
    {
        $this->adicional_grupoOtro = $adicional_grupoOtro;

        return $this;
    }

    /**
     * Method to set the value of field adicional_informacionId
     *
     * @param integer $adicional_informacionId
     * @return $this
     */
    public function setAdicionalInformacionid($adicional_informacionId)
    {
        $this->adicional_informacionId = $adicional_informacionId;

        return $this;
    }

    /**
     * Method to set the value of field adicional_informacionOtro
     *
     * @param string $adicional_informacionOtro
     * @return $this
     */
    public function setAdicionalInformacionotro($adicional_informacionOtro)
    {
        $this->adicional_informacionOtro = $adicional_informacionOtro;

        return $this;
    }

    /**
     * Method to set the value of field adicional_conocimientoId
     *
     * @param integer $adicional_conocimientoId
     * @return $this
     */
    public function setAdicionalConocimientoid($adicional_conocimientoId)
    {
        $this->adicional_conocimientoId = $adicional_conocimientoId;

        return $this;
    }

    /**
     * Method to set the value of field adicional_motivoId
     *
     * @param integer $adicional_motivoId
     * @return $this
     */
    public function setAdicionalMotivoid($adicional_motivoId)
    {
        $this->adicional_motivoId = $adicional_motivoId;

        return $this;
    }

    /**
     * Method to set the value of field adicional_motivoOtro
     *
     * @param string $adicional_motivoOtro
     * @return $this
     */
    public function setAdicionalMotivootro($adicional_motivoOtro)
    {
        $this->adicional_motivoOtro = $adicional_motivoOtro;

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
     * Returns the value of field adicional_reservaOtro
     *
     * @return string
     */
    public function getAdicionalReservaotro()
    {
        return $this->adicional_reservaOtro;
    }

    /**
     * Returns the value of field adicional_grupoId
     *
     * @return integer
     */
    public function getAdicionalGrupoid()
    {
        return $this->adicional_grupoId;
    }

    /**
     * Returns the value of field adicional_grupoOtro
     *
     * @return string
     */
    public function getAdicionalGrupootro()
    {
        return $this->adicional_grupoOtro;
    }

    /**
     * Returns the value of field adicional_informacionId
     *
     * @return integer
     */
    public function getAdicionalInformacionid()
    {
        return $this->adicional_informacionId;
    }

    /**
     * Returns the value of field adicional_informacionOtro
     *
     * @return string
     */
    public function getAdicionalInformacionotro()
    {
        return $this->adicional_informacionOtro;
    }

    /**
     * Returns the value of field adicional_conocimientoId
     *
     * @return integer
     */
    public function getAdicionalConocimientoid()
    {
        return $this->adicional_conocimientoId;
    }

    /**
     * Returns the value of field adicional_motivoId
     *
     * @return integer
     */
    public function getAdicionalMotivoid()
    {
        return $this->adicional_motivoId;
    }

    /**
     * Returns the value of field adicional_motivoOtro
     *
     * @return string
     */
    public function getAdicionalMotivootro()
    {
        return $this->adicional_motivoOtro;
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
        $this->hasMany('adicional_id', 'Encuesta', 'encuesta_adicionalId', array('alias' => 'Encuesta'));
        $this->belongsTo('adicional_informacionId', 'Informacion', 'informacion_id', array('alias' => 'Informacion'));
        $this->belongsTo('adicional_reservaId', 'Reserva', 'reserva_id', array('alias' => 'Reserva'));
        $this->belongsTo('adicional_grupoId', 'Grupo', 'grupo_id', array('alias' => 'Grupo'));
        $this->belongsTo('adicional_conocimientoId', 'Conocimiento', 'conocimiento_id', array('alias' => 'Conocimiento'));
        $this->belongsTo('adicional_motivoId', 'Motivo', 'motivo_id', array('alias' => 'Motivo'));
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
