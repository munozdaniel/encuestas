<?php
use Phalcon\Mvc\Dispatcher;
use Phalcon\Events\Event;
use Phalcon\Acl\Resource;
class Seguridad extends \Phalcon\Mvc\User\Plugin
{
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        $auth = $this->session->get('sesion_encuesta');
        if(!$auth || $auth==null)
        {
            $role = 'INVITADO';
            $this->session->set('sesion_encuesta',array('usuario_id'   =>  3,
                'usuario_nombreCompleto'  =>  "USUARIO INVITADO",
                'usuario_nick'  =>  "INVITADO",
                'rol_nombre'   =>  "INVITADO"));
        }
        else
            $role = $auth["rol_nombre"];
        //nombre del controlador al que intentamos acceder
        $controller = $dispatcher->getControllerName();

        //nombre de la acción a la que intentamos acceder
        $action = $dispatcher->getActionName();

        //obtenemos la Lista de Control de Acceso(acl) que hemos creado
        $acl = $this->getAcl();

        //boolean(true | false) si tenemos permisos devuelve true en otro caso false
        $allowed = $acl->isAllowed($role, $controller, $action);

        //si el usuario no tiene acceso a la zona que intenta acceder
        //le mostramos el contenido de la función index del controlador index
        //con un mensaje flash
        if ($allowed != \Phalcon\Acl::ALLOW)
        {
            $this->flash->error("Zona restringida, no puedes entrar aquí!");
            $dispatcher->forward(
                array(
                    'controller' => 'index',
                    'action' => 'index'
                )
            );
            return false;
        }
    }

    /**
     * lógica para crear una aplicación con roles de usuarios
     */
    public function getAcl()
    {
        //var_dump($this->persistent->acl);
       // if (!isset($this->persistent->acl))//Almacena el acl de otro sistema.
       // {

            //creamos la instancia de acl para crear los roles
            $acl = new Phalcon\Acl\Adapter\Memory();

            //por defecto la acción será denegar el acceso a cualquier zona
            $acl->setDefaultAction(Phalcon\Acl::DENY);
            //----------------------------ROLES-----------------------------------

            //registramos los roles que deseamos tener en nuestra aplicación****
            $listaRoles = Rol::find();
            foreach($listaRoles as $rol)
            {
                $acl->addRole(new \Phalcon\Acl\Role($rol->rol_nombre));

                //Recupero todas las paginas de cada rol
                $query = $this->modelsManager->createQuery("SELECT pagina.* FROM Acceso AS acceso,Pagina AS pagina,Rol AS rol WHERE rol.rol_id=".$rol->rol_id." and rol.rol_id=acceso.rol_id and acceso.pagina_id=pagina.pagina_id");
                $listaPaginasPorRol = $query->execute();

                foreach($listaPaginasPorRol as $pagina)
                {
                    $acl->addResource(new Resource($pagina->pagina_nombreControlador),$pagina->pagina_nombreAccion);
                    $acl->allow($rol->rol_nombre,$pagina->pagina_nombreControlador,$pagina->pagina_nombreAccion);
                }
            }
            //El acl queda almacenado en sesión
            $this->persistent->acl = $acl;

       // }

        return $this->persistent->acl;
    }

}