<?php

class Personal extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $personal_id;

    /**
     *
     * @var integer
     */
    protected $personal_puntajeAdministrativoId;

    /**
     *
     * @var integer
     */
    protected $personal_puntajeMucamaId;

    /**
     *
     * @var string
     */
    protected $personal_comentario;

    /**
     *
     * @var integer
     */
    protected $personal_habilitado;

    /**
     * Method to set the value of field personal_id
     *
     * @param integer $personal_id
     * @return $this
     */
    public function setPersonalId($personal_id)
    {
        $this->personal_id = $personal_id;

        return $this;
    }

    /**
     * Method to set the value of field personal_puntajeAdministrativoId
     *
     * @param integer $personal_puntajeAdministrativoId
     * @return $this
     */
    public function setPersonalPuntajeadministrativoid($personal_puntajeAdministrativoId)
    {
        $this->personal_puntajeAdministrativoId = $personal_puntajeAdministrativoId;

        return $this;
    }

    /**
     * Method to set the value of field personal_puntajeMucamaId
     *
     * @param integer $personal_puntajeMucamaId
     * @return $this
     */
    public function setPersonalPuntajemucamaid($personal_puntajeMucamaId)
    {
        $this->personal_puntajeMucamaId = $personal_puntajeMucamaId;

        return $this;
    }

    /**
     * Method to set the value of field personal_comentario
     *
     * @param string $personal_comentario
     * @return $this
     */
    public function setPersonalComentario($personal_comentario)
    {
        $this->personal_comentario = $personal_comentario;

        return $this;
    }

    /**
     * Method to set the value of field personal_habilitado
     *
     * @param integer $personal_habilitado
     * @return $this
     */
    public function setPersonalHabilitado($personal_habilitado)
    {
        $this->personal_habilitado = $personal_habilitado;

        return $this;
    }

    /**
     * Returns the value of field personal_id
     *
     * @return integer
     */
    public function getPersonalId()
    {
        return $this->personal_id;
    }

    /**
     * Returns the value of field personal_puntajeAdministrativoId
     *
     * @return integer
     */
    public function getPersonalPuntajeadministrativoid()
    {
        return $this->personal_puntajeAdministrativoId;
    }

    /**
     * Returns the value of field personal_puntajeMucamaId
     *
     * @return integer
     */
    public function getPersonalPuntajemucamaid()
    {
        return $this->personal_puntajeMucamaId;
    }

    /**
     * Returns the value of field personal_comentario
     *
     * @return string
     */
    public function getPersonalComentario()
    {
        return $this->personal_comentario;
    }

    /**
     * Returns the value of field personal_habilitado
     *
     * @return integer
     */
    public function getPersonalHabilitado()
    {
        return $this->personal_habilitado;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('personal_id', 'Encuesta', 'encuesta_personalId', array('alias' => 'Encuesta'));
        $this->belongsTo('personal_puntajeAdministrativoId', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
        $this->belongsTo('personal_puntajeMucamaId', 'Puntaje', 'puntaje_id', array('alias' => 'Puntaje'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'personal';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Personal[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Personal
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
