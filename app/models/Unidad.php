<?php

class Unidad extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $unidad_id;

    /**
     *
     * @var integer
     */
    protected $unidad_puntajeHigieneId;

    /**
     *
     * @var integer
     */
    protected $unidad_puntajeEquipoId;

    /**
     *
     * @var integer
     */
    protected $unidad_puntajeConfortId;

    /**
     *
     * @var integer
     */
    protected $unidad_tieneInconvenientes;

    /**
     *
     * @var string
     */
    protected $unidad_comentario;

    /**
     *
     * @var integer
     */
    protected $unidad_habilitado;

    /**
     * Method to set the value of field unidad_id
     *
     * @param integer $unidad_id
     * @return $this
     */
    public function setUnidadId($unidad_id)
    {
        $this->unidad_id = $unidad_id;

        return $this;
    }

    /**
     * Method to set the value of field unidad_puntajeHigieneId
     *
     * @param integer $unidad_puntajeHigieneId
     * @return $this
     */
    public function setUnidadPuntajehigieneid($unidad_puntajeHigieneId)
    {
        $this->unidad_puntajeHigieneId = $unidad_puntajeHigieneId;

        return $this;
    }

    /**
     * Method to set the value of field unidad_puntajeEquipoId
     *
     * @param integer $unidad_puntajeEquipoId
     * @return $this
     */
    public function setUnidadPuntajeequipoid($unidad_puntajeEquipoId)
    {
        $this->unidad_puntajeEquipoId = $unidad_puntajeEquipoId;

        return $this;
    }

    /**
     * Method to set the value of field unidad_puntajeConfortId
     *
     * @param integer $unidad_puntajeConfortId
     * @return $this
     */
    public function setUnidadPuntajeconfortid($unidad_puntajeConfortId)
    {
        $this->unidad_puntajeConfortId = $unidad_puntajeConfortId;

        return $this;
    }

    /**
     * Method to set the value of field unidad_tieneInconvenientes
     *
     * @param integer $unidad_tieneInconvenientes
     * @return $this
     */
    public function setUnidadTieneinconvenientes($unidad_tieneInconvenientes)
    {
        $this->unidad_tieneInconvenientes = $unidad_tieneInconvenientes;

        return $this;
    }

    /**
     * Method to set the value of field unidad_comentario
     *
     * @param string $unidad_comentario
     * @return $this
     */
    public function setUnidadComentario($unidad_comentario)
    {
        $this->unidad_comentario = $unidad_comentario;

        return $this;
    }

    /**
     * Method to set the value of field unidad_habilitado
     *
     * @param integer $unidad_habilitado
     * @return $this
     */
    public function setUnidadHabilitado($unidad_habilitado)
    {
        $this->unidad_habilitado = $unidad_habilitado;

        return $this;
    }

    /**
     * Returns the value of field unidad_id
     *
     * @return integer
     */
    public function getUnidadId()
    {
        return $this->unidad_id;
    }

    /**
     * Returns the value of field unidad_puntajeHigieneId
     *
     * @return integer
     */
    public function getUnidadPuntajehigieneid()
    {
        return $this->unidad_puntajeHigieneId;
    }

    /**
     * Returns the value of field unidad_puntajeEquipoId
     *
     * @return integer
     */
    public function getUnidadPuntajeequipoid()
    {
        return $this->unidad_puntajeEquipoId;
    }

    /**
     * Returns the value of field unidad_puntajeConfortId
     *
     * @return integer
     */
    public function getUnidadPuntajeconfortid()
    {
        return $this->unidad_puntajeConfortId;
    }

    /**
     * Returns the value of field unidad_tieneInconvenientes
     *
     * @return integer
     */
    public function getUnidadTieneinconvenientes()
    {
        return $this->unidad_tieneInconvenientes;
    }

    /**
     * Returns the value of field unidad_comentario
     *
     * @return string
     */
    public function getUnidadComentario()
    {
        return $this->unidad_comentario;
    }

    /**
     * Returns the value of field unidad_habilitado
     *
     * @return integer
     */
    public function getUnidadHabilitado()
    {
        return $this->unidad_habilitado;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('unidad_id', 'Encuesta', 'encuesta_unidadId', array('alias' => 'Encuesta'));
        $this->belongsTo('unidad_puntajeConfortId', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
        $this->belongsTo('unidad_puntajeHigieneId', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
        $this->belongsTo('unidad_puntajeEquipoId', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'unidad';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Unidad[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Unidad
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
