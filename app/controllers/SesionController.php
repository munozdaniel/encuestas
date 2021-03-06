<?php

class SesionController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Login');
        parent::initialize();
    }
    public function indexAction()
    {

    }

    /**
     * Encargado de la validacion de los datos introducidos en el formulario. Ademas
     * de validar los datos con la base de datos.
     */
    public function validarAction()
    {


        if($this->request->isPost())
        {
            try
            {
                //Obtengo los datos ingresado en el form.
                $nombre  = $this->request->getPost('nombre');
                $pass   = $this->request->getPost('password');
                //Busco el usuario en la bd a partir de los datos ingresados.
                $usuarios =  Usuarios::findFirst(array(
                    "(usuario_nick = :usuario_nick:) AND (usuario_contrasenia = :usuario_contrasenia:) AND (usuario_activo = 1)",
                    'bind' => array('usuario_nick' => $nombre, 'usuario_contrasenia' => base64_encode($pass))
                ));
                if($usuarios!=false)
                {
                    $this->_registrarSesion($usuarios);
                    $miSesion = $this->session->get('sesion_encuesta');
                    $this->flash->success('Bienvenido/a '.$miSesion['usuario_nombreCompleto'] );
                    //Redireccionar la ejecución si el usuario es valido
                    return $this->redireccionar('index/index');

                }
                else{
                    $this->flash->error("No se encontro el Usuario, verifique contraseña/nick. Es probable que se encuentre Inactivo, por favor comuniquese con el Equipo de Desarrollo");

                }
            }
            catch(\Phalcon\Annotations\Exception $ex)
            {
                $this->flash->error($ex->getMessage());
            }

        }
        return $this->redireccionar('sesion/index');

    }
    private function _registrarSesion($usuario)
    {
        $idRol = Usuarioporrol::findFirst(array("usuario_id     =       :usuario:",
                                                'bind'          =>      array('usuario'=>$usuario->usuario_id)));
        if(empty($idRol))
        {//No se encontro el rol asignado al usuario
            $this->flash->error("Usuario sin Permisos");
            return $this->redireccionar('index/index');
        }
        else
        {
            $rol = Rol::findFirstByRolId($idRol->rol_id);
            $this->session->set('sesion_encuesta',array('usuario_id'   =>  $usuario->usuario_id,
                'usuario_nombreCompleto'  =>  $usuario->usuario_nombreCompleto,
                'usuario_nick'  =>  $usuario->usuario_nick,
                'rol_nombre'   =>  $rol->rol_nombre));
        }
    }
    /**
     * Finishes the active session redirecting to the index
     *
     * @return unknown
     */
    public function cerrarAction()
    {
        $this->session->remove('sesion_encuesta');
        $this->flash->success('Se ha cerrado la sesión!');
        return $this->redireccionar("index/index");
    }
}

