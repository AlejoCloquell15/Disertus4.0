<?php
namespace App\Controllers;
use App\Models\login_modelo;
use App\Models\recuperar_password_modelo;
use App\Libraries\Hash;


class Recuperar_password extends BaseController{
    public function cargar_recuperacion(){
        return view('sp_enviar_correo');
    }

    public function correo(){
        $login_modelo = new Login_modelo();
        $recuperar_password_modelo = new Recuperar_password_modelo();

        $correo = $this->request->getPost('correo');
        $id_usuario = $login_modelo->sacar_id_usuario($correo);

        if($id_usuario == null){
            $mensaje = [
                'mensaje' => 'El correo introducido no esta registrado en disertus',
            ];
            return View('sp_enviar_correo', $mensaje);
        }else{
        $dato = [
            'IdUsuario' => $id_usuario,
        ];

        $recuperar_password_modelo->insertar_id($dato);

        return view('sp_enviar_codigo', $id_usuario);
        }
    }
    
    public function enviar_codigo(){
        $IdUsuario = $this->request->getPost('id_usuario');
        if($this->request->getVar('boton_codigo')){
            $login_modelo = new Login_modelo();
            $correo = $login_modelo->sacar_correo($IdUsuario);
            
            $caracteres='1234567890';
            $longpalabra=6;
            for($codigo='', $n=strlen($caracteres)-1; strlen($codigo) < $longpalabra ; ) {
                $x = rand(0,$n);
                $codigo.= $caracteres[$x];
            }
            
            $recuperar_password_modelo = new Recuperar_password_modelo();
            $recuperar_password_modelo->insertar_codigo($codigo, $IdUsuario);

            //Enviamos el correo con el codigo
            $email = \Config\Services::email();
        
            $email->setFrom('alejocloquell@alumnos.itr3.edu.ar', 'ALEJO');
            $email->setTo($correo);
            
            $email->setSubject('Recuperación de contraseña');
            $email->setMessage('Codigo:'.$codigo);
            
            //Convertimos la variable $IdUsuario a un array para poder recibirlo bien en la vista
            $IdUsuario = [
                'IdUsuario' => $IdUsuario,
            ];

            if($email->send()) {
                return view('sp_enviar_codigo', $IdUsuario);
                } 
                else {
                    $data = $email->printDebugger(['headers']);
                    print_r($data);
                }
                // El correo electrónico se envió exitosamente            
        }   
        if($this->request->getVar('boton_verificar')){
            $codigo = $this->request->getPost('codigo_usuario');
            $recuperar_password_modelo = new Recuperar_password_modelo();

            $res = $recuperar_password_modelo->comparar_codigo($IdUsuario, $codigo);
            if($res == null){
                $mensaje = "El codigo es incorrecto o ya a expirado, si es necesario reenviaremos el codigo";
                $mensaje = [
                    'Mensaje' => $mensaje,
                    'IdUsuario' => $IdUsuario,
                ];

                return view('sp_enviar_codigo', $mensaje);
            }else{
                $IdUsuario = [
                    'IdUsuario' => $IdUsuario,
                ];
                return view('sp_cambiar_password', $IdUsuario);
            }
        } 
    }

    public function cambiar_password(){
        $IdUsuario = $this->request->getPost('IdUsuario');
        $validar = \Config\Services::validation();
        $validation = $this->validate([
            'password' => [
                'rules'  => 'required|min_length[6]|max_length[20]',
                'errors' => [
                    'required' => 'La contraseña es requerida',
                ],
            ],
        ]);
        if($validation == false){
            //Consigo los errores de validacion por medio de la lbreria validation    
            $data = [
                'validar' => $validar->getErrors('password'),
                'IdUsuario' => $IdUsuario,
        ];
        
        return view('sp_cambiar_password', $data);
        }else{
            $password = $this->request->getPost('password');
            $hash = Hash::make($password);

            $login_modelo = new Login_modelo();
            $login_modelo->cambiar_password($hash, $IdUsuario);

            return view('sp_login');
        }
    }
}