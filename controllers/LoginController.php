<?php

namespace Controllers;

use Clases\Email;
use Model\Usuario;
use MVC\Router;


class LoginController {
    public static function login(Router $router) {
        $alertas = [];

        // $auth = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();
            
            if(empty($alertas)) {
                // Comprobar existe usuario
                $usuario = Usuario::where('email', $auth->email);

                if($usuario) {
                    // Verificar password
                    if($usuario->passwordVerificado($auth->password)) {

                        // Autenticar el usuario
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        // debuguear($_SESSION);

                        // Redireccionar
                        if($usuario->admin === "1") {
                           $_SESSION['admin'] = $usuario->admin ?? null;
                            header('Location: /public/admin');
                        } else {
                            header('Location: /public/cita');
                        }

                    }
                } else {
                    Usuario::setAlerta('error', 'Usuario no registrado');
                }
            }
        }

        $alertas = Usuario::getAlertas();
       
        $router->render('auth/login', [
            'alertas' => $alertas
        ]);
    }

    public static function logout() {
        session_start();

        $_SESSION = []; 
        header('Location: /public/index.php');
    }

    public static function olvide(Router $router) {
       
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();

            if(empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);

               if($usuario && $usuario->confirmado === "1") {
               
                // Generar un token   
                $usuario->crearToken();
                $usuario->guardar();

                // Enviar el email
                $email = new Email($usuario->email, $usuario->nombre, $usuario->token); // en el correo que nos llegue veremos 1º el nombre
                $email->enviarInstrucciones();

                // Alerta de éxito
                Usuario::setAlerta('exito', 'Revisa tu email');
               
               } else {
                 Usuario::setAlerta('error', 'El usuario no existe o no confirmado');
                
                }
                
            }

        }

        $alertas = Usuario::getAlertas();
       
        $router->render('auth/olvide-password', [
            'alertas' => $alertas
        ]);
    }

    public static function recuperar(Router $router) {
       $alertas = [];
       $error = false; 

       $token = s($_GET['token']);

       // Buscar usuario por su token
       $usuario = Usuario::where('token', $token);

       if(empty($usuario)) {
        Usuario::setAlerta('error', 'Token no válido');
        $error = true;
       }

       if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Leer el nuevo password y guardarlo
            $password = new Usuario($_POST);
            $alertas = $password->validarPassword();
            if(empty($alertas)) {
                $usuario->password = null;
                $usuario->password = $password->password;
                $usuario->hashPassword();
                $usuario->token = null;
                $resultado = $usuario->guardar();
                if($resultado) {
                    header('Location: /public/');
                }
            }
       }
       $alertas = Usuario::getAlertas();
       $router->render('auth/recuperar-password', [
            'alertas' => $alertas,
            'error' => $error

       ]);
    }

    public static function crear(Router $router) {
        $usuario = new Usuario($_POST);

        // Alertas vacias
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
          
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            // Mensaje de alerta "todo correcto"
            if(empty($alertas)) {
             // Verificar usuario registrado
             $resultado = $usuario->existeUsuario();

             if($resultado->num_rows) {
                $alertas = Usuario::getAlertas();

             } else {
                // Ocultar password
                $usuario->hashPassword();

                // Generar un token
                $usuario->crearToken();               

                // Enviar el email
                $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                $email->enviarConfirmacion();

                // Crear el usuario
                $resultado = $usuario->guardar();
                if($resultado) {
                    header('Location: /public/mensaje');
                }
             }

            }                   
        }

        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas'=> $alertas

        ]);
    }

    public static function mensaje(Router $router) {
        $router->render('auth/mensaje');
    }

    public static function confirmar(Router $router) {
        $alertas = [];
        $token = s($_GET['token']);
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {
            // Mostrar mensaje de error
            Usuario::setAlerta('error', 'Token no válido');
        } else { 
            // Mensaje de confirmación
            $usuario->confirmado = "1";
            $usuario->token = null;
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Confirmada correctamente');

        }       
         // Obtener alertas
        $alertas = Usuario::getAlertas();

        // Renderizar la vista
        $router->render('auth/confirmar-cuenta', [
            'alertas' => $alertas
        ]);
    }   
    
}