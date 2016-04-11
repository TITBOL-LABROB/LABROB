<?php
 require_once 'view/usuario/usuario.view.php';
require_once 'model/usuario.php';
require_once 'model/tipo.php';

class usuarioController {

    private $model;
    private $vista;
    private $tipos;

    public function __CONSTRUCT() {
        $this->model = new usuario();
        $this->vista = new usuarioView();
        $this->tipos=new Tipo();
    }

    public function Index() {
        $lista = $this->model->Listar();        
        $this->vista->View($lista);
    }

    public function Nuevo() {
         $tipos=$this->tipos->Listar();
        $this->vista->Nuevo($tipos);
    }

    public function Editar() {
        $usuario = $this->model->Obtener($_REQUEST['id']);
        $tipos=$this->tipos->Listar();
        $this->vista->Editar($usuario,$tipos);
    }

    public function Guardar() {
      
        $datos = array(
        	'ci' => $_REQUEST['ci'],
            'nombre' => $_REQUEST['nombre'],
            'direccion' => $_REQUEST['direccion'],
            'telefono' => $_REQUEST['telefono'],
            'correo' => $_REQUEST['correo'],
            'fktipo_usuario' => $_REQUEST['pktipo_usuario'],
            'username' => $_REQUEST['username'],
            'pass' => $this->Encrypt($_REQUEST['pass']),
        );  

         if($this->model->ExisteUsername($datos['username'])!="")
          {
            header("Location: ?c=usuario&a=nuevo&item=usuario&tarea=username&exito=si");
            exit;
          }
         if($this->model->ExisteCorreo($datos['correo'])!="")
            {
             header("Location: ?c=usuario&a=nuevo&item=usuario&tarea=correo&exito=si");
             exit;
            }

        $pkusuario = $this->model->Registrar($datos);
        header("Location: ?c=usuario&item=usuario&tarea=agregar&exito=si");
    }
    public function GuardarCambios() {
      
        $datos = array(
            'pkusuario' => $_REQUEST['pkusuario'],
            'ci' => $_REQUEST['ci'],
            'nombre' => $_REQUEST['nombre'],
            'direccion' => $_REQUEST['direccion'],
            'telefono' => $_REQUEST['telefono'],
            'correo' => $_REQUEST['correo'],
            'fktipo_usuario' => $_REQUEST['pktipo_usuario'],
        );
           

            $pkusuario = $this->model->Editar($datos);
           

        header("Location: ?c=usuario&item=usuario&tarea=modificar&exito=si");
    }

    public function Eliminar() {
        $this->model->Baja($_REQUEST['id']);
        header("Location: ?c=usuario&item=usuario&tarea=eliminar&exito=si");
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header('Location: ?c=home');
        }
    }

    public function Encrypt($cadena){
        $key='Aquino';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
        return $encrypted; //Devuelve el string encriptado
 
    }

    public function Decrypt($cadena){
         $key='Aquino';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
         $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        return $decrypted;  //Devuelve el string desencriptado
    }

}
?>