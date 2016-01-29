<?php

class Persona extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $persona_id;

    /**
     *
     * @var string
     */
    protected $persona_nombre;

    /**
     *
     * @var string
     */
    protected $persona_apellido;

    /**
     *
     * @var string
     */
    protected $persona_correo;

    /**
     *
     * @var integer
     */
    protected $persona_telefono;

    /**
     *
     * @var string
     */
    protected $persona_ciudad;

    /**
     *
     * @var integer
     */
    protected $persona_encuestaId;

    /**
     *
     * @var integer
     */
    protected $persona_habilitado;

    /**
     * Method to set the value of field persona_id
     *
     * @param integer $persona_id
     * @return $this
     */
    public function setPersonaId($persona_id)
    {
        $this->persona_id = $persona_id;

        return $this;
    }

    /**
     * Method to set the value of field persona_nombre
     *
     * @param string $persona_nombre
     * @return $this
     */
    public function setPersonaNombre($persona_nombre)
    {
        $this->persona_nombre = $persona_nombre;

        return $this;
    }

    /**
     * Method to set the value of field persona_apellido
     *
     * @param string $persona_apellido
     * @return $this
     */
    public function setPersonaApellido($persona_apellido)
    {
        $this->persona_apellido = $persona_apellido;

        return $this;
    }

    /**
     * Method to set the value of field persona_correo
     *
     * @param string $persona_correo
     * @return $this
     */
    public function setPersonaCorreo($persona_correo)
    {
        $this->persona_correo = $persona_correo;

        return $this;
    }

    /**
     * Method to set the value of field persona_telefono
     *
     * @param integer $persona_telefono
     * @return $this
     */
    public function setPersonaTelefono($persona_telefono)
    {
        $this->persona_telefono = $persona_telefono;

        return $this;
    }

    /**
     * Method to set the value of field persona_ciudad
     *
     * @param string $persona_ciudad
     * @return $this
     */
    public function setPersonaCiudad($persona_ciudad)
    {
        $this->persona_ciudad = $persona_ciudad;

        return $this;
    }

    /**
     * Method to set the value of field persona_encuestaId
     *
     * @param integer $persona_encuestaId
     * @return $this
     */
    public function setPersonaEncuestaid($persona_encuestaId)
    {
        $this->persona_encuestaId = $persona_encuestaId;

        return $this;
    }

    /**
     * Method to set the value of field persona_habilitado
     *
     * @param integer $persona_habilitado
     * @return $this
     */
    public function setPersonaHabilitado($persona_habilitado)
    {
        $this->persona_habilitado = $persona_habilitado;

        return $this;
    }

    /**
     * Returns the value of field persona_id
     *
     * @return integer
     */
    public function getPersonaId()
    {
        return $this->persona_id;
    }

    /**
     * Returns the value of field persona_nombre
     *
     * @return string
     */
    public function getPersonaNombre()
    {
        return $this->persona_nombre;
    }

    /**
     * Returns the value of field persona_apellido
     *
     * @return string
     */
    public function getPersonaApellido()
    {
        return $this->persona_apellido;
    }

    /**
     * Returns the value of field persona_correo
     *
     * @return string
     */
    public function getPersonaCorreo()
    {
        return $this->persona_correo;
    }

    /**
     * Returns the value of field persona_telefono
     *
     * @return integer
     */
    public function getPersonaTelefono()
    {
        return $this->persona_telefono;
    }

    /**
     * Returns the value of field persona_ciudad
     *
     * @return string
     */
    public function getPersonaCiudad()
    {
        return $this->persona_ciudad;
    }

    /**
     * Returns the value of field persona_encuestaId
     *
     * @return integer
     */
    public function getPersonaEncuestaid()
    {
        return $this->persona_encuestaId;
    }

    /**
     * Returns the value of field persona_habilitado
     *
     * @return integer
     */
    public function getPersonaHabilitado()
    {
        return $this->persona_habilitado;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('persona_encuestaId', 'Encuesta', 'encuesta_id', array('alias' => 'Encuesta'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'persona';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Persona[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Persona
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
