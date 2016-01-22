<?php

class Recepcion extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $recepcion_id;

    /**
     *
     * @var integer
     */
    protected $recepcion_puntajeNivelId;

    /**
     *
     * @var integer
     */
    protected $recepcion_puntajeTiempoId;

    /**
     *
     * @var integer
     */
    protected $recepcion_puntajeTratoId;

    /**
     *
     * @var integer
     */
    protected $recepcion_tieneInconvenientes;

    /**
     *
     * @var string
     */
    protected $recepcion_comentario;

    /**
     *
     * @var integer
     */
    protected $recepcion_habilitado;

    /**
     * Method to set the value of field recepcion_id
     *
     * @param integer $recepcion_id
     * @return $this
     */
    public function setRecepcionId($recepcion_id)
    {
        $this->recepcion_id = $recepcion_id;

        return $this;
    }

    /**
     * Method to set the value of field recepcion_puntajeNivelId
     *
     * @param integer $recepcion_puntajeNivelId
     * @return $this
     */
    public function setRecepcionPuntajenivelid($recepcion_puntajeNivelId)
    {
        $this->recepcion_puntajeNivelId = $recepcion_puntajeNivelId;

        return $this;
    }

    /**
     * Method to set the value of field recepcion_puntajeTiempoId
     *
     * @param integer $recepcion_puntajeTiempoId
     * @return $this
     */
    public function setRecepcionPuntajetiempoid($recepcion_puntajeTiempoId)
    {
        $this->recepcion_puntajeTiempoId = $recepcion_puntajeTiempoId;

        return $this;
    }

    /**
     * Method to set the value of field recepcion_puntajeTratoId
     *
     * @param integer $recepcion_puntajeTratoId
     * @return $this
     */
    public function setRecepcionPuntajetratoid($recepcion_puntajeTratoId)
    {
        $this->recepcion_puntajeTratoId = $recepcion_puntajeTratoId;

        return $this;
    }

    /**
     * Method to set the value of field recepcion_tieneInconvenientes
     *
     * @param integer $recepcion_tieneInconvenientes
     * @return $this
     */
    public function setRecepcionTieneinconvenientes($recepcion_tieneInconvenientes)
    {
        $this->recepcion_tieneInconvenientes = $recepcion_tieneInconvenientes;

        return $this;
    }

    /**
     * Method to set the value of field recepcion_comentario
     *
     * @param string $recepcion_comentario
     * @return $this
     */
    public function setRecepcionComentario($recepcion_comentario)
    {
        $this->recepcion_comentario = $recepcion_comentario;

        return $this;
    }

    /**
     * Method to set the value of field recepcion_habilitado
     *
     * @param integer $recepcion_habilitado
     * @return $this
     */
    public function setRecepcionHabilitado($recepcion_habilitado)
    {
        $this->recepcion_habilitado = $recepcion_habilitado;

        return $this;
    }

    /**
     * Returns the value of field recepcion_id
     *
     * @return integer
     */
    public function getRecepcionId()
    {
        return $this->recepcion_id;
    }

    /**
     * Returns the value of field recepcion_puntajeNivelId
     *
     * @return integer
     */
    public function getRecepcionPuntajenivelid()
    {
        return $this->recepcion_puntajeNivelId;
    }

    /**
     * Returns the value of field recepcion_puntajeTiempoId
     *
     * @return integer
     */
    public function getRecepcionPuntajetiempoid()
    {
        return $this->recepcion_puntajeTiempoId;
    }

    /**
     * Returns the value of field recepcion_puntajeTratoId
     *
     * @return integer
     */
    public function getRecepcionPuntajetratoid()
    {
        return $this->recepcion_puntajeTratoId;
    }

    /**
     * Returns the value of field recepcion_tieneInconvenientes
     *
     * @return integer
     */
    public function getRecepcionTieneinconvenientes()
    {
        return $this->recepcion_tieneInconvenientes;
    }

    /**
     * Returns the value of field recepcion_comentario
     *
     * @return string
     */
    public function getRecepcionComentario()
    {
        return $this->recepcion_comentario;
    }

    /**
     * Returns the value of field recepcion_habilitado
     *
     * @return integer
     */
    public function getRecepcionHabilitado()
    {
        return $this->recepcion_habilitado;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('recepcion_id', 'Encuesta', 'encuesta_recepcionId', array('alias' => 'Encuesta'));
        $this->belongsTo('recepcion_puntajeTratoId', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
        $this->belongsTo('recepcion_puntajeNivelId', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
        $this->belongsTo('recepcion_puntajeTiempoId', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'recepcion';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Recepcion[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Recepcion
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
